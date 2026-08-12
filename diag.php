<?php
// Diagnostic probe v2 — dumps live DB schema + reproduces admin writes.
header('Content-Type: text/plain; charset=utf-8');
$root = dirname(__FILE__);
$env = [];
foreach (file($root . '/.env') as $l) {
    $l = trim($l);
    if ($l === '' || $l[0] === '#') continue;
    if (strpos($l, '=') !== false) { [$k, $v] = explode('=', $l, 2); $env[trim($k)] = trim($v); }
}
$out = [];
try {
    $pdo = new PDO(
        "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4",
        $env['DB_USER'], $env['DB_PASS'] ?? '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $out[] = "DB_CONNECT=OK (user {$env['DB_USER']} @ {$env['DB_HOST']})";
    foreach (['projects_tbl', 'project_technologies_tbl', 'techstack_tbl', 'home_tbl', 'certifications_tbl', 'contact_info_tbl'] as $t) {
        try {
            $cols = $pdo->query("SHOW COLUMNS FROM `$t`")->fetchAll(PDO::FETCH_ASSOC);
            $out[] = "\n== $t ==";
            foreach ($cols as $c) $out[] = "  {$c['Field']} {$c['Type']} null=" . ($c['Null']==='YES'?'Y':'N') . " default=" . ($c['Default'] ?? 'NULL');
        } catch (Throwable $e) {
            $out[] = "\n== $t == MISSING: " . $e->getMessage();
        }
    }
    // Try a controlled INSERT to reproduce admin-store write errors.
    $out[] = "\n== INSERT TEST (projects_tbl) ==";
    try {
        $pdo->beginTransaction();
        $cols = $pdo->query("SHOW COLUMNS FROM projects_tbl")->fetchAll(PDO::FETCH_COLUMN);
        // Build an insert using only nullable/defaultable columns w/ dummy values
        $insertCols = [];
        $insertVals = [];
        foreach ($cols as $c) {
            if ($c === 'id') continue;
            $insertCols[] = $c;
            $insertVals[] = '?';
        }
        $sql = "INSERT INTO projects_tbl (" . implode(',', $insertCols) . ") VALUES (" . implode(',', $insertVals) . ")";
        $stmt = $pdo->prepare($sql);
        $i = 1;
        foreach ($cols as $c) {
            if ($c === 'id') continue;
            $stmt->bindValue($i++, '');
        }
        $stmt->execute();
        $newId = $pdo->lastInsertId();
        $pdo->rollBack();
        $out[] = "INSERT OK (test row id=$newId rolled back)";
    } catch (Throwable $e) {
        if ($pdo->inTransaction()) $pdo->rollBack();
        $out[] = "INSERT FAIL: " . $e->getMessage();
    }
} catch (Throwable $e) {
    $out[] = "DB_CONNECT=FAIL " . $e->getMessage();
}
echo implode("\n", $out) . "\n";
