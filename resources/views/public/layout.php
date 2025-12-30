<?php

/**
 * Public Layout
 * 
 * Complete public layout with navigation, background, and footer.
 * Child views use View::extend() and View::section() to inject content.
 */

use app\core\View;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#000000">
  <link href="<?= base_url('resources/css/public-compiled.css') ?>" rel="stylesheet">
  <title><?= View::renderSection('title') ?: 'Portfolio - Agassi Bustarga' ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('images/favicon.png') ?>">
</head>

<body class="text-white bg-black">
  <!-- navigation bar -->
  <?= View::include('shared/nav') ?>

  <!-- Content Container with relative positioning -->
  <div class="relative z-10 min-h-screen overflow-x-hidden">

    <!-- animated background -->
    <?= View::include('shared/background') ?>

    <!-- Main content -->
    <?= View::renderSection('content') ?>

    <!-- footer -->
    <?= View::include('shared/footer') ?>

  </div>

  <!-- JavaScript Files -->
  <script src="<?= base_url('resources/js/animations.js') ?>" defer></script>
  <script src="<?= base_url('resources/js/portfolio.js') ?>" defer></script>
  <script src="<?= base_url('resources/js/services.js') ?>" defer></script>
  <script src="<?= base_url('resources/js/contacts.js') ?>" defer></script>
  <script src="<?= base_url('resources/js/script.js') ?>" defer></script>

  <?= View::renderSection('scripts') ?>
</body>

</html>