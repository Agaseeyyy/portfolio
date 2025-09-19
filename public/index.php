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
  <?php   
    require_once (__DIR__ . "/../app/core/autoload.php");
    use app\core\Router;

    $router = new Router();

    require_once (__DIR__ . "/../routes/web.php");

    $router->dispatch();
  ?>
  
  <!-- JavaScript Files -->
  <script src="../resources/js/animations.js"></script>
  <script src="../resources/js/portfolio.js"></script>
  <script src="../resources/js/services.js"></script>
  <script src="../resources/js/contacts.js"></script>
  <script src="../resources/js/script.js"></script>
</body>
</html>
