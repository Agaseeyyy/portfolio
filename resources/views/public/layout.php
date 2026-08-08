<?php
/**
 * Main Layout Template - 8-Bit NES RPG Style
 * Enhanced with SEO Meta Tags, Open Graph, Twitter Cards, Canonical Links, and JSON-LD Schema.org Data
 */
use app\core\View;

$data = View::getData();
$home = $data['home'] ?? [];
$project = $data['project'] ?? null;

$pageTitle = !empty($project['project_name']) ? (htmlspecialchars($project['project_name']) . ' - Agassi Bustarga Portfolio') : ($data['title'] ?? 'Agassi Bustarga | Full-Stack Developer Portfolio');
$rawBio = !empty($project['description']) ? $project['description'] : ($home['bio'] ?? ($home['short_bio'] ?? 'Agassi Bustarga - Full-stack Web Developer specializing in PHP, React, Node.js, and modern retro web applications.'));
$metaDesc = htmlspecialchars(substr(strip_tags($rawBio), 0, 160));

$currentUrl = base_url(ltrim($_SERVER['REQUEST_URI'] ?? '', '/'));
$ogImage = !empty($project['image']) ? base_url($project['image']) : base_url('images/me.png');
$version = time();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Agassi Bustarga">
  <meta name="description" content="<?= $metaDesc ?>">
  <meta name="keywords" content="Agassi Bustarga, Full-stack Developer, PHP MVC, React, Web Developer Portfolio, NES RPG Portfolio, Tailwind CSS, Software Engineer">
  
  <title><?= $pageTitle ?></title>

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $currentUrl ?>" />
  
  <!-- Open Graph / Facebook / LinkedIn Social Cards -->
  <meta property="og:type" content="<?= !empty($project) ? 'article' : 'website' ?>">
  <meta property="og:url" content="<?= $currentUrl ?>">
  <meta property="og:title" content="<?= $pageTitle ?>">
  <meta property="og:description" content="<?= $metaDesc ?>">
  <meta property="og:image" content="<?= $ogImage ?>">
  <meta property="og:site_name" content="Agassi Bustarga Developer Portfolio">

  <!-- Twitter Card Data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $pageTitle ?>">
  <meta name="twitter:description" content="<?= $metaDesc ?>">
  <meta name="twitter:image" content="<?= $ogImage ?>">

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

  <!-- Google Search JSON-LD Structured Data Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Agassi Bustarga",
    "jobTitle": "Full-stack Developer",
    "url": "<?= base_url() ?>",
    "image": "<?= base_url('images/me.png') ?>",
    "sameAs": [
      "https://github.com/agaseeyyy",
      "https://linkedin.com"
    ],
    "knowsAbout": [
      "JavaScript", "React", "TypeScript", "Node.js", "PHP", "Laravel", "Python", "MySQL", "Tailwind CSS", "Linux"
    ]
  }
  </script>

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