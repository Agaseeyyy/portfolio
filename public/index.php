<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#000000">
  <?php include "../resources/css/tailwind.php" ?>
  <title>Portfolio - Agassi Bustarga</title>
  <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body class="text-white bg-black">
  <!-- navigation bar -->
  <?php include (__DIR__ . '/../resources/views/shared/nav.php'); ?>
  <!-- Content Container with relative positioning -->
  <div class="relative z-10 min-h-screen overflow-x-hidden">

  <?php 
    require_once (__DIR__ . '/../app/core/autoload.php');
    use app\core\Router;

    $router = new Router();
    require_once (__DIR__ . '/../routes/web.php');

    // animated background
    include (__DIR__ . '/../resources/views/shared/background.php'); 
   
    // render view pages 
    $router->dispatch();
  
    // footer
    include (__DIR__ . '/../resources/views/shared/footer.php'); 
  ?>
  </div>

  <!-- JavaScript Files -->
  <script src="../resources/js/animations.js" defer></script>
  <script src="../resources/js/portfolio.js" defer></script>
  <script src="../resources/js/services.js" defer></script>
  <script src="../resources/js/contacts.js" defer></script>
  <script src="../resources/js/script.js" defer></script>
</body>
</html>
