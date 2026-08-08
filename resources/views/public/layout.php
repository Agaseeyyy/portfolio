<?php
/**
 * Main Layout Template - 8-Bit NES RPG Style
 * Enhanced with Head Session Class Checkers, Pixel Home Sky Background, Instant 8-Bit Loading Progress, Dungeon Gate Screen, SEO Meta Tags, and JSON-LD Schema
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
$homeSkyBg = base_url('images/home-sky.png');
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

  <!-- Instant Head Session Checker to prevent refresh loading hangs -->
  <script>
    (function() {
      try {
        if (sessionStorage.getItem('dungeon_entered') === 'true') {
          document.documentElement.classList.add('dungeon-already-entered');
        } else if (sessionStorage.getItem('dungeon_loaded') === 'true') {
          document.documentElement.classList.add('dungeon-already-loaded');
        }
      } catch (e) {}
    })();
  </script>

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
  
  <!-- 8-Bit Retro Dungeon Loading Progress Overlay with home-sky.png Background -->
  <div id="dungeon-loading-overlay" style="background: radial-gradient(circle at center, rgba(10, 15, 36, 0.45) 0%, rgba(6, 9, 24, 0.88) 100%), url('<?= $homeSkyBg ?>') center top / cover no-repeat !important;">
    <div class="dungeon-card flex flex-col items-center justify-center gap-4">
      <div class="w-16 h-16 flex-shrink-0 mb-1 animate-bounce">
        <img src="<?= base_url('images/favicon.ico') ?>" alt="Favicon" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 0 12px rgba(240,192,64,0.7))">
      </div>

      <h2 class="text-[#f0c040] text-xs lg:text-sm font-bold tracking-widest uppercase rpg-title-glow m-0">
        LOADING DUNGEON ASSETS...
      </h2>

      <!-- 8-Bit Filling Progress Bar -->
      <div class="dungeon-loading-bar-wrapper">
        <div id="dungeon-loading-bar-fill" class="dungeon-loading-bar-fill" style="width: 0%;"></div>
      </div>

      <!-- Animated Progress Subtext -->
      <p id="dungeon-loading-subtext" class="text-[#8a8aa8] text-[10px] uppercase tracking-wider font-normal m-0 min-h-[18px]">
        INITIALIZING 8-BIT SYNTHESIZERS...
      </p>
    </div>
  </div>

  <!-- 8-Bit Dungeon Entrance Screen Modal Overlay with home-sky.png Background -->
  <div id="dungeon-entrance-modal" style="display:none; background: radial-gradient(circle at center, rgba(10, 15, 36, 0.45) 0%, rgba(6, 9, 24, 0.88) 100%), url('<?= $homeSkyBg ?>') center top / cover no-repeat !important;">
    <div class="dungeon-card flex flex-col items-center justify-center gap-6">
      <div class="w-16 h-16 flex-shrink-0 mb-1">
        <img src="<?= base_url('images/favicon.ico') ?>" alt="Favicon" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 0 12px rgba(240,192,64,0.6))">
      </div>

      <h2 class="text-[#f0c040] text-xs lg:text-sm font-bold tracking-widest uppercase rpg-title-glow m-0 flex items-center justify-center gap-2">
        <img src="<?= base_url('icons/cross-sword.png') ?>" alt="Cross Swords" class="w-6 h-6 object-contain image-rendering-pixelated inline-block align-middle">
        <span>WELCOME, ADVENTURER!</span>
        <img src="<?= base_url('icons/cross-sword.png') ?>" alt="Cross Swords" class="w-6 h-6 object-contain image-rendering-pixelated inline-block align-middle">
      </h2>

      <div class="flex items-center justify-center gap-3 text-[#c8a951] w-full my-1">
        <span class="h-[2px] w-20 bg-[#8b7355]"></span>
        <span class="text-xs">◆</span>
        <span class="h-[2px] w-20 bg-[#8b7355]"></span>
      </div>

      <p class="text-[#d0d0e0] text-xs lg:text-[13px] leading-relaxed font-normal max-w-[480px]">
        YOU ARE ENTERING THE DEVELOPER DUNGEON OF <span class="text-[#f0c040] font-bold"><?= htmlspecialchars(strtoupper($home['name'] ?? 'AGASSI BUSTARGA')) ?></span>.
      </p>

      <button onclick="enterDungeon()" class="golden-btn text-xs lg:text-sm py-4 px-8 mt-3 flex items-center justify-center gap-3 cursor-pointer">
        <img src="<?= base_url('icons/cross-sword.png') ?>" alt="Cross Swords" class="w-5 h-5 object-contain image-rendering-pixelated inline-block">
        <span>ENTER DUNGEON</span>
        <span class="rpg-cursor-blink">▶</span>
      </button>
    </div>
  </div>

  <!-- Instant Inline Execution Script with Brave Shields try/catch compatibility & dungeon_loaded flag -->
  <script>
    (function() {
      var loadingOverlay = document.getElementById('dungeon-loading-overlay');
      var entranceModal = document.getElementById('dungeon-entrance-modal');
      var fillBar = document.getElementById('dungeon-loading-bar-fill');
      var subtext = document.getElementById('dungeon-loading-subtext');

      if (!loadingOverlay) return;

      var isEntered = false;
      var isLoaded = false;

      try {
        isEntered = (sessionStorage.getItem('dungeon_entered') === 'true');
        isLoaded = (sessionStorage.getItem('dungeon_loaded') === 'true');
      } catch (e) {}

      if (isEntered) {
        loadingOverlay.style.display = 'none';
        if (entranceModal) entranceModal.style.display = 'none';
        return;
      }

      if (isLoaded) {
        loadingOverlay.style.display = 'none';
        if (entranceModal) entranceModal.style.display = 'flex';
        return;
      }

      var steps = [
        { pct: 30, text: 'INITIALIZING 8-BIT SYNTHESIZERS...' },
        { pct: 65, text: 'EQUIPPING WEAPONS & MAGIC...' },
        { pct: 90, text: 'SUMMONING PIXEL SKYLINE...' },
        { pct: 100, text: 'DUNGEON READY!' }
      ];

      var stepIdx = 0;
      var interval = setInterval(function() {
        try {
          if (stepIdx < steps.length) {
            if (fillBar) fillBar.style.width = steps[stepIdx].pct + '%';
            if (subtext) subtext.textContent = steps[stepIdx].text;
            stepIdx++;
          } else {
            clearInterval(interval);
            dismissLoadingOverlay();
          }
        } catch (err) {
          clearInterval(interval);
          dismissLoadingOverlay();
        }
      }, 140);

      function dismissLoadingOverlay() {
        if (!loadingOverlay || loadingOverlay.style.display === 'none') return;
        try {
          sessionStorage.setItem('dungeon_loaded', 'true');
        } catch (e) {}
        loadingOverlay.style.opacity = '0';
        loadingOverlay.style.pointerEvents = 'none';
        setTimeout(function() {
          loadingOverlay.style.display = 'none';
          if (entranceModal) entranceModal.style.display = 'flex';
        }, 300);
      }

      // Hard safety timer for Brave & all privacy browsers: Force dismiss after max 0.9s
      setTimeout(dismissLoadingOverlay, 900);
    })();

    function enterDungeon() {
      var overlay = document.getElementById('dungeon-entrance-modal');
      if (overlay) {
        try {
          if (window.rpgAudio) window.rpgAudio.playQuestFanfare();
        } catch (e) {}
        try {
          if (typeof spawnRPGFloatingText === 'function') {
            spawnRPGFloatingText(window.innerWidth / 2, window.innerHeight / 2, '+100 EXP! DUNGEON ENTERED!');
          }
        } catch (e) {}
        
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
        
        try {
          sessionStorage.setItem('dungeon_entered', 'true');
        } catch (e) {}
        
        setTimeout(function() {
          overlay.style.display = 'none';
        }, 400);
      }
    }
  </script>

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