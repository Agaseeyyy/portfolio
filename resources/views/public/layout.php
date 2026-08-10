<?php
/**
 * Main Layout Template - 8-Bit NES RPG Style
 * Enhanced with 10-Block Segmented HP/EXP Style Loading Bar, Solid Backdrop, Manual Scroll Restoration, SEO Meta Tags, and JSON-LD Schema
 */
use app\core\View;

$data = View::getData();
$home = $data['home'] ?? [];
$project = $data['project'] ?? null;

$pageTitle = !empty($project['project_name']) ? (htmlspecialchars($project['project_name']) . ' - Agassi Bustarga Portfolio') : ($data['title'] ?? 'Agassi Bustarga | Full-Stack Developer Portfolio');
$rawBio = !empty($project['description']) ? $project['description'] : ($home['bio'] ?? ($home['short_bio'] ?? 'Agassi Bustarga - Full-stack Web Developer specializing in PHP, React, Node.js, and modern retro web applications.'));
$metaDesc = htmlspecialchars(substr(strip_tags($rawBio), 0, 160));

$currentUrl = absolute_url(ltrim($_SERVER['REQUEST_URI'] ?? '', '/'));
$ogImage = !empty($project['image']) ? absolute_url($project['image']) : absolute_url('images/me.webp');
$homeSkyBg = base_url('images/home-sky.webp');
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

  <!-- Force Manual Scroll Restoration so Page Always Loads at the Top -->
  <script>
    if ('scrollRestoration' in history) {
      history.scrollRestoration = 'manual';
    }
    window.scrollTo(0, 0);
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
    "url": "<?= absolute_url() ?>",
    "image": "<?= absolute_url('images/me.webp') ?>",
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
  
  <!-- 8-Bit Retro Dungeon Entrance & Loading Screen -->
  <div id="dungeon-loading-overlay" style="background-color: #0a0f24 !important; background-image: radial-gradient(circle at center, rgba(10, 15, 36, 0.35) 0%, rgba(6, 9, 24, 0.85) 100%), url('<?= $homeSkyBg ?>') !important; background-position: center top !important; background-size: cover !important; background-repeat: no-repeat !important;">
    <div class="dungeon-card flex flex-col items-center justify-center text-center gap-5 mx-auto">
      
      <!-- Favicon Icon -->
      <div class="w-16 h-16 flex-shrink-0 mx-auto mb-1">
        <img src="<?= base_url('images/favicon.ico') ?>" alt="Favicon" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 0 12px rgba(240,192,64,0.7))">
      </div>

      <!-- Phase 1: 10-Block Segmented HP/EXP Style Loading Progress Bar -->
      <div id="loading-phase" class="w-full flex flex-col items-center justify-center text-center gap-2 mx-auto">
        <h2 class="text-[#f0c040] text-xs lg:text-sm font-bold tracking-widest uppercase rpg-title-glow m-0 text-center w-full">
          LOADING DUNGEON ASSETS
        </h2>

        <div id="dungeon-loading-pct" class="text-white text-xs lg:text-sm font-bold text-center w-full my-0.5">
          0%
        </div>
        
        <!-- 10-Segment Block Bar (HP & EXP Style) -->
        <div id="dungeon-loading-segmented-bar" class="block-bar w-full max-w-[420px] mx-auto my-2 flex items-center justify-center">
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
          <div class="block-unit"></div>
        </div>

        <p id="dungeon-loading-subtext" class="text-[#8a8aa8] text-[10px] uppercase tracking-wider font-normal m-0 min-h-[18px] text-center w-full">
          INITIALIZING 8-BIT SYNTHESIZERS...
        </p>
      </div>

      <!-- Phase 2: Enter Dungeon Gate (Revealed when loading hits 100%) -->
      <div id="entrance-phase" class="w-full flex flex-col items-center gap-4" style="display: none;">
        <h2 class="text-[#f0c040] text-xs lg:text-sm font-bold tracking-widest uppercase rpg-title-glow m-0 flex items-center justify-center gap-2">
          <img src="<?= base_url('icons/cross-sword.webp') ?>" alt="Cross Swords" class="w-6 h-6 object-contain image-rendering-pixelated inline-block align-middle">
          <span>WELCOME, ADVENTURER!</span>
          <img src="<?= base_url('icons/cross-sword.webp') ?>" alt="Cross Swords" class="w-6 h-6 object-contain image-rendering-pixelated inline-block align-middle">
        </h2>

        <div class="flex items-center justify-center gap-3 text-[#c8a951] w-full my-1">
          <span class="h-[2px] w-16 bg-[#8b7355]"></span>
          <span class="text-xs">◆</span>
          <span class="h-[2px] w-16 bg-[#8b7355]"></span>
        </div>

        <p class="text-[#d0d0e0] text-xs lg:text-[13px] leading-relaxed font-normal max-w-[480px] m-0">
          YOU ARE ENTERING THE DEVELOPER DUNGEON OF <span class="text-[#f0c040] font-bold"><?= htmlspecialchars(strtoupper($home['name'] ?? 'AGASSI BUSTARGA')) ?></span>.
        </p>

        <button onclick="enterDungeon()" class="golden-btn text-xs lg:text-sm py-4 px-8 mt-2 flex items-center justify-center gap-3 cursor-pointer">
          <img src="<?= base_url('icons/cross-sword.webp') ?>" alt="Cross Swords" class="w-5 h-5 object-contain image-rendering-pixelated inline-block">
          <span>ENTER DUNGEON</span>
          <span class="rpg-cursor-blink">▶</span>
        </button>
      </div>

    </div>
  </div>

  <!-- Segmented HP/EXP Style Loading Progress Bar Script -->
  <script>
    (function() {
      // Force scroll position to top
      window.scrollTo(0, 0);
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;

      var loadingOverlay = document.getElementById('dungeon-loading-overlay');
      var loadingPhase = document.getElementById('loading-phase');
      var entrancePhase = document.getElementById('entrance-phase');
      var subtext = document.getElementById('dungeon-loading-subtext');
      var pctText = document.getElementById('dungeon-loading-pct');

      if (!loadingOverlay) return;

      var currentPct = 0;
      var isWindowLoaded = false;
      var isCompleted = false;

      var steps = [
        { threshold: 30, text: 'INITIALIZING 8-BIT SYNTHESIZERS...' },
        { threshold: 60, text: 'EQUIPPING WEAPONS & MAGIC...' },
        { threshold: 90, text: 'DOWNLOADING GRAPHICS & ASSETS...' },
        { threshold: 100, text: 'DUNGEON READY!' }
      ];

      function updateSegmentedUI(pct) {
        var blocks = document.querySelectorAll('#dungeon-loading-segmented-bar .block-unit');
        var filledCount = Math.floor(pct / 10);
        
        for (var b = 0; b < blocks.length; b++) {
          if (b < filledCount) {
            blocks[b].classList.add('filled-skill');
            blocks[b].style.opacity = '1';
          } else {
            blocks[b].classList.remove('filled-skill');
          }
        }

        if (pctText) pctText.textContent = pct + '%';

        for (var i = 0; i < steps.length; i++) {
          if (pct <= steps[i].threshold) {
            if (subtext) subtext.textContent = steps[i].text;
            break;
          }
        }
      }

      // Fill blocks progressively up to 90% max while waiting for network load
      var animInterval = setInterval(function() {
        if (isCompleted) return;

        if (!isWindowLoaded) {
          if (currentPct < 90) {
            currentPct += 10; // Fill 1 block (10%) per tick
            if (currentPct > 90) currentPct = 90;
            updateSegmentedUI(currentPct);
          }
        } else {
          // Window/Network finished loading -> light up remaining blocks to 100%
          currentPct += 10;
          if (currentPct >= 100) {
            currentPct = 100;
            isCompleted = true;
            clearInterval(animInterval);
            updateSegmentedUI(100);
            if (subtext) subtext.textContent = 'DUNGEON READY!';
            setTimeout(revealEntrance, 220);
          } else {
            updateSegmentedUI(currentPct);
          }
        }
      }, 100);

      function markWindowLoaded() {
        isWindowLoaded = true;
      }

      if (document.readyState === 'complete') {
        markWindowLoaded();
      } else {
        window.addEventListener('load', markWindowLoaded);
      }

      function revealEntrance() {
        if (loadingPhase) loadingPhase.style.display = 'none';
        if (entrancePhase) entrancePhase.style.display = 'flex';
      }
    })();

    function enterDungeon() {
      var overlay = document.getElementById('dungeon-loading-overlay');
      if (overlay) {
        window.scrollTo(0, 0);
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

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
        setTimeout(function() {
          overlay.style.display = 'none';
          window.scrollTo(0, 0);
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }, 350);
      }
    }

    window.addEventListener('load', function() {
      window.scrollTo(0, 0);
    });
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
  <script src="<?= base_url('resources/js/rpg-audio.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/animations.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/contacts.js?v=' . $version) ?>" defer></script>
  <script src="<?= base_url('resources/js/script.js?v=' . $version) ?>" defer></script>
  <?= View::renderSection('scripts') ?>
</body>
</html>