<?php
/**
 * 404 Not Found
 *
 * Rendered by the router when no route matches the requested path.
 * Self-contained so it always works even when the app styles are unavailable.
 */
$homeUrl = base_url('');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>404 - Quest Not Found | Agassi Bustarga</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon.ico') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0a0f24;
            background-image: radial-gradient(circle at center, rgba(10, 15, 36, 0.35) 0%, rgba(6, 9, 24, 0.85) 100%);
            color: #ffffff;
            font-family: 'Press Start 2P', monospace;
            text-align: center;
            padding: 24px;
            image-rendering: pixelated;
        }
        .panel { max-width: 640px; }
        .code {
            font-size: clamp(64px, 18vw, 128px);
            color: #f0c040;
            text-shadow: 0 0 12px rgba(240, 192, 64, 0.7);
            line-height: 1.1;
        }
        .title { font-size: 14px; letter-spacing: 2px; margin-top: 24px; color: #f0c040; }
        .divider { margin: 24px auto; height: 2px; width: 120px; background: #8b7355; }
        .desc { font-size: 11px; line-height: 1.8; color: #d0d0e0; margin-bottom: 32px; }
        .cursor-blink { animation: blink 1s step-end infinite; color: #f0c040; }
        @keyframes blink { 50% { opacity: 0; } }
        .btn {
            display: inline-block;
            color: #0a0f24;
            background: #f0c040;
            text-decoration: none;
            font-size: 12px;
            padding: 16px 28px;
            border: 4px solid #c8a020;
            box-shadow: 0 4px 0 #8b7355;
            cursor: pointer;
            transition: transform 0.1s ease;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn:active { transform: translateY(2px); box-shadow: 0 2px 0 #8b7355; }
    </style>
</head>
<body>
    <div class="panel">
        <div class="code">404</div>
        <div class="title">QUEST NOT FOUND</div>
        <div class="divider"></div>
        <p class="desc">
            THE PATH YOU SEEK DOES NOT EXIST IN THIS DUNGEON.<br>
            THE TREASURE MAY HAVE MOVED, OR THE MAP IS WRONG.<br>
            RETURN TO THE ENTRANCE AND TRY AGAIN.
        </p>
        <a class="btn" href="<?= htmlspecialchars($homeUrl) ?>">&#9654; RETURN HOME</a>
        <div style="margin-top: 24px;"><span class="cursor-blink">&#9632;</span></div>
    </div>
</body>
</html>
