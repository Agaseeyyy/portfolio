<?php
/**
 * Public Layout
 * 8-bit Retro RPG themed portfolio layout
 */
use app\core\View;
$version = time();
?>
<!DOCTYPE html>
<html lang="en" style="background-color: #0a0f24 !important;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#0a0f24">
  <title><?= View::renderSection('title') ?: 'Portfolio - Agassi Bustarga' ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon.ico?v=' . $version) ?>">
  <link rel="shortcut icon" href="<?= base_url('images/favicon.ico?v=' . $version) ?>">
  
  <!-- Press Start 2P Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  
  <!-- NES.css -->
  <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
  
  <!-- Compiled Tailwind + Custom 8-bit CSS with cache buster -->
  <link href="<?= base_url('resources/css/public-compiled.css?v=' . $version) ?>" rel="stylesheet">
</head>
<body style="background-color: #0a0f24 !important; color: #ffffff !important;" class="bg-[#0a0f24] text-white">
  <!-- Navigation -->
  <?= View::include('shared/nav') ?>

  <!-- Content Container -->
  <div class="relative z-10 min-h-screen bg-[#0a0f24]">
    <!-- Starry Background -->
    <?= View::include('shared/background') ?>
    
    <!-- Main content -->
    <?= View::renderSection('content') ?>
    
    <!-- Save Point Footer -->
    <?= View::include('shared/footer') ?>
  </div>

  <!-- JavaScript with cache busters -->
  <script src="<?= base_url('resources/js/animations.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/portfolio.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/services.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/contacts.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/script.js?v=' . $version) ?>" defer></script>
  <?= View::renderSection('scripts') ?>
</body>
</html>