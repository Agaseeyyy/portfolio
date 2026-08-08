<?php
/**
 * Single-Page RPG Portfolio Layout View
 * Integrates Hero, About Me (Character Stats), Quest Log (Projects), and Inventory (Skills)
 */
use app\core\View;

View::extend('public/layout');
View::section('content');

$home = View::getData()['home'] ?? [];
$firstName = View::getData()['firstName'] ?? 'Agassi';
$lastName = View::getData()['lastName'] ?? 'Bustarga';
$location = View::getData()['location'] ?? 'Earth (Remote)';

$fullName = strtoupper(($home['name'] ?? ($firstName . ' ' . $lastName)));
$roleName = strtoupper(($home['role'] ?? 'DEVELOPER'));
$bioText = $home['bio'] ?? ($home['short_bio'] ?? 'I build modern, scalable, and user-friendly web applications with clean code and pixel-perfect precision.');

$levelText = $home['level_text'] ?? '5 Years Experience';
$weaponText = $home['weapon_text'] ?? 'Code & Creativity';
$hpVal = intval($home['hp_percentage'] ?? 100);
$hpBlocks = max(1, min(10, round($hpVal / 10)));
$expVal = intval($home['exp_percentage'] ?? 85);
$expBlocks = max(0, min(10, round($expVal / 10)));
?>

<!-- Hero Header & Background Image -->
<header id="home" class="relative pt-24 pb-12 overflow-hidden flex flex-col items-center justify-center min-h-[85vh]">
  <!-- Hero Sky Pixel Banner - Full height with smooth gradient fade into #0a0f24 -->
  <div class="absolute top-0 left-0 right-0 h-[720px] lg:h-[800px] z-0 overflow-hidden pointer-events-none opacity-90">
    <img src="<?= base_url('images/home-sky.png') ?>" alt="Pixel Art Night City" class="w-full h-full object-cover object-top m-0 p-0">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0a0f24]/30 via-60% to-[#0a0f24]"></div>
  </div>

  <!-- 8-Bit Pixel Tree Silhouette Shadows Horizon Line (Positioned Directly in Initial Hero Viewport) -->
  <div class="absolute top-[280px] lg:top-[320px] left-0 right-0 h-40 lg:h-56 z-5 pointer-events-none overflow-hidden">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-full fill-white opacity-95">
      <path d="
        M 0,120 L 0,80 L 15,50 L 30,80 L 30,65 L 45,35 L 60,65 L 60,50 L 75,20 L 90,50 L 90,65 L 105,40 L 120,65 L 120,80 L 135,55 L 150,80
        L 150,70 L 165,45 L 180,70 L 180,55 L 195,25 L 210,55 L 210,70 L 225,45 L 240,70 L 240,85 L 255,60 L 270,85 L 270,75 L 285,50
        L 300,75 L 300,60 L 315,30 L 330,60 L 330,75 L 345,50 L 360,75 L 360,90 L 375,65 L 390,90 L 390,75 L 405,45 L 420,75
        L 420,60 L 435,28 L 450,60 L 450,75 L 465,45 L 480,75 L 480,90 L 495,65 L 510,90 L 510,75 L 525,48 L 540,75 L 540,62 L 555,32
        L 570,62 L 570,78 L 585,50 L 600,78 L 600,90 L 615,65 L 630,90 L 630,75 L 645,45 L 660,75 L 660,60 L 675,28 L 690,60
        L 690,75 L 705,48 L 720,75 L 720,90 L 735,65 L 750,90 L 750,75 L 765,45 L 780,75 L 780,62 L 795,32 L 810,62 L 810,78
        L 825,50 L 840,78 L 840,90 L 855,65 L 870,90 L 870,75 L 885,45 L 900,75 L 900,60 L 915,28 L 930,60 L 930,75 L 945,48
        L 960,75 L 960,90 L 975,65 L 990,90 L 990,75 L 1005,45 L 1020,75 L 1020,62 L 1035,32 L 1050,62 L 1050,78 L 1065,50 L 1080,78
        L 1080,90 L 1110,75 L 1125,45 L 1140,75 L 1140,60 L 1155,28 L 1170,60 L 1170,80 L 1185,55 L 1200,80 L 1200,120 Z
      " shape-rendering="crispEdges"/>
    </svg>
  </div>

  <!-- Hero Content Box (Golden Dialog) - Extra Large Text Hierarchy -->
  <div class="golden-hero-box max-w-[860px] w-full mx-auto relative z-10 mb-4">
    <!-- Extra Large WELCOME BACK! Heading -->
    <h2 class="text-[#f0c040] text-base lg:text-xl font-bold tracking-widest mb-5 uppercase rpg-title-glow">
      WELCOME BACK!
    </h2>
    
    <!-- Extra Large Main Title (I AM ...) -->
    <h1 class="text-white text-xl lg:text-3xl font-bold leading-relaxed mb-6">
      I AM <span class="text-[#f0c040] font-bold"><?= htmlspecialchars($fullName) ?></span>,<br>
      A <?= htmlspecialchars($roleName) ?>.
    </h1>

    <div class="flex items-center justify-center gap-4 my-6 text-[#c8a951]">
      <span class="h-[2px] w-32 bg-[#c8a951]"></span>
      <span class="text-base">◆</span>
      <span class="h-[2px] w-32 bg-[#c8a951]"></span>
    </div>

    <!-- Extra Large Bio Description -->
    <p class="text-[#d0d0e0] text-xs lg:text-sm leading-loose max-w-[720px] mx-auto mb-10 font-normal">
      <?= htmlspecialchars($bioText) ?>
    </p>

    <!-- Large Golden Hero CTA Button -->
    <a href="#quest-log" class="golden-btn flex items-center justify-center gap-3 text-xs lg:text-sm py-4 px-10">
      <span>&gt; START QUEST</span>
      <span class="rpg-cursor-blink">▶</span>
    </a>
  </div>
</header>

<!-- ====== ABOUT ME / CHARACTER STATS ====== -->
<section id="about" class="max-w-7xl mx-auto px-6 py-14">
  <!-- RPG Section Header with Enlarged 44px sword.png Icon -->
  <div class="rpg-header items-center gap-4 mb-8">
    <div class="w-11 h-11 flex-shrink-0 flex items-center justify-center">
      <img src="<?= base_url('icons/cross-sword.png') ?>" alt="About Me" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 2px 6px rgba(240,192,64,0.4))">
    </div>
    <span class="rpg-title-glow text-lg lg:text-xl">ABOUT ME</span>
    <span class="sub-text text-sm">(CHARACTER STATS)</span>
  </div>

  <div class="nes-container is-dark with-title" style="padding: 2.25rem;">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 items-center">

      <!-- Character Avatar Sprite - Large Borderless me.gif (240px x 240px) with Ground Shadow -->
      <div class="flex flex-col items-center justify-center md:border-r-2 border-[#2b334e] md:pr-8">
        <div class="relative w-52 h-52 lg:w-60 lg:h-60 flex items-center justify-center">
          <!-- Pixel Ground Shadow Ellipse under character -->
          <div class="absolute bottom-1 left-1/2 -translate-x-1/2 w-4/5 h-6 bg-black/80 rounded-[50%] blur-sm pointer-events-none"></div>
          <!-- Animated me.gif sprite with drop shadow -->
          <img src="<?= base_url('images/me.gif') ?>" alt="Animated Character Sprite" class="relative z-10 w-full h-full object-contain filter drop-shadow-[0_16px_12px_rgba(0,0,0,0.95)] image-pixelated">
        </div>
      </div>

      <!-- Stat Col 1: Extra Large Borderless Inline Icons with Hover Bounce -->
      <div class="flex flex-col gap-6">
        <!-- Class Stat -->
        <div class="stat-row-item flex items-center gap-4">
          <span class="text-3xl lg:text-4xl shrink-0">🛡️</span>
          <div class="flex flex-col justify-center">
            <span class="text-[#f0c040] text-xs font-bold tracking-wider">CLASS</span>
            <span class="text-white text-xs lg:text-sm leading-snug mt-0.5"><?= htmlspecialchars($home['role'] ?? 'Full Stack Developer') ?></span>
          </div>
        </div>

        <!-- Location Stat -->
        <div class="stat-row-item flex items-center gap-4">
          <img src="<?= base_url('icons/location.png') ?>" alt="Location" class="w-12 h-12 lg:w-14 lg:h-14 shrink-0 object-contain image-pixelated">
          <div class="flex flex-col justify-center">
            <span class="text-[#f0c040] text-xs font-bold tracking-wider">LOCATION</span>
            <span class="text-white text-xs lg:text-sm leading-snug mt-0.5"><?= htmlspecialchars($location) ?></span>
          </div>
        </div>
      </div>

      <!-- Stat Col 2: Extra Large Borderless Inline Icons with Hover Bounce -->
      <div class="flex flex-col gap-6">
        <!-- Level Stat loaded from DB -->
        <div class="stat-row-item flex items-center gap-4">
          <img src="<?= base_url('icons/star.png') ?>" alt="Level Star" class="w-12 h-12 lg:w-14 lg:h-14 shrink-0 object-contain image-pixelated">
          <div class="flex flex-col justify-center">
            <span class="text-[#f0c040] text-xs font-bold tracking-wider">LEVEL</span>
            <span class="text-white text-xs lg:text-sm leading-snug mt-0.5"><?= htmlspecialchars($levelText) ?></span>
          </div>
        </div>

        <!-- Weapon Stat loaded from DB -->
        <div class="stat-row-item flex items-center gap-4">
          <img src="<?= base_url('icons/cross-sword.png') ?>" alt="Weapon Sword" class="w-12 h-12 lg:w-14 lg:h-14 shrink-0 object-contain image-pixelated">
          <div class="flex flex-col justify-center">
            <span class="text-[#f0c040] text-xs font-bold tracking-wider">WEAPON</span>
            <span class="text-white text-xs lg:text-sm leading-snug mt-0.5"><?= htmlspecialchars($weaponText) ?></span>
          </div>
        </div>
      </div>

      <!-- Stat Col 3: Animated HP & EXP Bars loaded directly from DB -->
      <div class="flex flex-col gap-7 md:border-l-2 border-[#2b334e] md:pl-8 justify-center">
        <!-- HP Bar -->
        <div class="flex flex-col gap-2.5">
          <div class="flex justify-between items-center text-xs lg:text-[13px]">
            <span class="text-[#e74c3c] font-bold flex items-center gap-2">
              <img src="<?= base_url('icons/heart.png') ?>" alt="Heart Icon" class="w-6 h-6 object-contain image-pixelated heart-pulse"> HP
            </span>
            <span class="text-white font-bold"><?= $hpVal ?>%</span>
          </div>
          <div class="block-bar">
            <?php for ($i = 0; $i < 10; $i++): ?>
              <div class="block-unit <?= $i < $hpBlocks ? 'filled-hp animate-fill' : '' ?>"></div>
            <?php endfor; ?>
          </div>
        </div>

        <!-- EXP Bar -->
        <div class="flex flex-col gap-2.5">
          <div class="flex justify-between items-center text-xs lg:text-[13px]">
            <span class="text-[#2ecc71] font-bold flex items-center gap-2">
              <img src="<?= base_url('icons/star.png') ?>" alt="Exp Star" class="w-6 h-6 object-contain image-pixelated"> EXP
            </span>
            <span class="text-white font-bold"><?= $expVal ?>%</span>
          </div>
          <div class="block-bar">
            <?php for ($i = 0; $i < 10; $i++): ?>
              <div class="block-unit <?= $i < $expBlocks ? 'filled-exp animate-fill' : '' ?>"></div>
            <?php endfor; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php
    // Include remaining sections (Quest Log & Inventory)
    include __DIR__ . '/portfolio.php';
    include __DIR__ . '/services.php';
?>
<?php View::endSection()?>
