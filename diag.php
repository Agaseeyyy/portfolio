<?php
// Diagnostic probe — reports server-side environment. Remove after diagnosis.
header('Content-Type: text/plain; charset=utf-8');

$lines = [];
$lines[] = 'PHP_VERSION=' . phpversion();
$lines[] = 'SCRIPT_FILENAME=' . ($_SERVER['SCRIPT_FILENAME'] ?? 'n/a');
$lines[] = 'DOCUMENT_ROOT=' . ($_SERVER['DOCUMENT_ROOT'] ?? 'n/a');
$lines[] = 'REQUEST_URI=' . ($_SERVER['REQUEST_URI'] ?? 'n/a');

$root = dirname(__FILE__);
$checks = [
    'vendor/autoload.php' => $root . '/vendor/autoload.php',
    '.env'                => $root . '/.env',
    'public/index.php'    => $root . '/public/index.php',
];
foreach ($checks as $label => $path) {
    $lines[] = "EXISTS $label=" . (file_exists($path) ? 'YES' : 'NO');
}
$lines[] = 'composer classmap mentions Dotenv=' . (file_exists($root.'/vendor/composer/autoload_classmap.php') ? 'classmap-exists' : 'no-classmap');

// Try loading .env manually
$envPath = $root . '/.env';
$env = [];
if (file_exists($envPath)) {
    foreach (file($envPath) as $l) {
        $l = trim($l);
        if ($l === '' || $l[0] === '#') continue;
        if (strpos($l, '=') !== false) {
            [$k, $v] = explode('=', $l, 2);
            $env[trim($k)] = trim($v);
        }
    }
}
$lines[] = 'ENV APP_ENV=' . ($env['APP_ENV'] ?? 'UNSET');
$lines[] = 'ENV APP_DEBUG=' . ($env['APP_DEBUG'] ?? 'UNSET');
$lines[] = 'ENV APP_PATH=' . ($env['APP_PATH'] ?? 'UNSET');
$lines[] = 'ENV DB_HOST=' . ($env['DB_HOST'] ?? 'UNSET');
$lines[] = 'ENV DB_NAME=' . ($env['DB_NAME'] ?? 'UNSET');
$lines[] = 'ENV DB_USER=' . ($env['DB_USER'] ?? 'UNSET');

// Try a DB connect if config present
if (!empty($env['DB_HOST']) && !empty($env['DB_NAME'])) {
    try {
        $pdo = new PDO(
            "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4",
            $env['DB_USER'], $env['DB_PASS'] ?? '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $n = $pdo->query("SELECT COUNT(*) FROM home_tbl")->fetchColumn();
        $lines[] = 'DB_CONNECT=OK home_tbl_rows=' . $n;
    } catch (Throwable $e) {
        $lines[] = 'DB_CONNECT=FAIL ' . $e->getMessage();
    }
} else {
    $lines[] = 'DB_CONNECT=SKIPPED (no config)';
}

echo implode("\n", $lines) . "\n";
