<?php
/**
 * Main Layout Template - 8-Bit NES RPG Style
 * Single page portfolio layout with HTMX 2.0 SPA navigation and 8-bit transitions
 */
use app\core\View;

$data = View::getData();
$title = $data['title'] ?? 'Agassi Bustarga - Developer Portfolio';
$version = time();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  
  <!-- Dynamic Favicon Link -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon.ico?v=' . $version) ?>" />
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('images/favicon.ico?v=' . $version) ?>" />
  <link rel="apple-touch-icon" href="<?= base_url('images/favicon.ico?v=' . $version) ?>" />
  
  <!-- Google Fonts: Press Start 2P -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  
  <!-- NES.css Retro Gaming Framework -->
  <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
  
  <!-- Compiled Tailwind CSS with custom RPG styles -->
  <link href="<?= base_url('resources/css/public-compiled.css?v=' . $version) ?>" rel="stylesheet">
  
  <!-- HTMX 2.0.4 for SPA AJAX Page Navigation -->
  <script src="https://unpkg.com/htmx.org@2.0.4"></script>
  
  <?= View::renderSection('styles') ?>
</head>
<body class="bg-[#0a0f24] text-white font-['Press_Start_2P'] antialiased selection:bg-[#f0c040] selection:text-black" hx-boost="true" hx-select="#main-content" hx-target="#main-content" hx-swap="innerHTML transition:true">
  <!-- Retro CRT Monitor Arcade Scanline Overlay -->
  <div id="crt-overlay"></div>

  <!-- Header Navigation -->
  <?= View::include('shared/nav') ?>

  <!-- Main Content Container with HTMX target id -->
  <div id="main-content" class="relative z-10 min-h-screen bg-[#0a0f24]">
    <!-- Starry Background -->
    <?= View::include('shared/background') ?>
    
    <!-- Main content -->
    <?= View::renderSection('content') ?>
    
    <!-- Save Point Footer -->
    <?= View::include('shared/footer') ?>
  </div>

  <!-- JavaScript with cache busters -->
  <script src="<?= base_url('resources/js/rpg-audio.js?v=' . $version) ?>"></script>
  <script src="<?= base_url('resources/js/animations.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/portfolio.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/services.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/contacts.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/script.js?v=' . $version) ?>" defer></script>
  <?= View::renderSection('scripts') ?>
</body>
</html>