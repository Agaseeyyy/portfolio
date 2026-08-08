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
  <!-- Hero Sky Pixel Banner - Full height with smooth gradient fade -->
  <div class="absolute top-0 left-0 right-0 h-[720px] lg:h-[800px] z-0 overflow-hidden pointer-events-none opacity-90">
    <img src="<?= base_url('images/home-sky.png') ?>" alt="Pixel Art Night City" class="w-full h-full object-cover object-top m-0 p-0">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0a0f24]/20 via-50% to-[#0a0f24]"></div>
  </div>

  <!-- 8-Bit Pixel Tree Silhouette Shadows Horizon Layer (High Contrast Above Gradient) -->
  <div class="absolute bottom-0 left-0 right-0 h-44 lg:h-64 z-2 pointer-events-none overflow-hidden flex flex-col justify-end">
    
    <!-- Layer 1: Distant Midnight Navy Pixel Trees -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 160" preserveAspectRatio="none" class="w-full h-36 lg:h-52 fill-[#162044] opacity-85 absolute bottom-4 left-0">
      <path d="
        M 0,160 L 0,80 L 15,35 L 30,80 L 30,60 L 45,20 L 60,60 L 60,40 L 75,5 L 90,40 L 90,60 L 105,25 L 120,60 L 120,80 L 135,40 L 150,80
        L 150,60 L 165,25 L 180,60 L 180,45 L 195,10 L 210,45 L 210,60 L 225,30 L 240,60 L 240,80 L 255,45 L 270,80 L 270,65 L 285,30
        L 300,65 L 300,50 L 315,15 L 330,50 L 330,65 L 345,35 L 360,65 L 360,85 L 375,50 L 390,85 L 390,65 L 405,30 L 420,65
        L 420,45 L 435,12 L 450,45 L 450,65 L 465,30 L 480,65 L 480,85 L 495,50 L 510,85 L 510,65 L 525,32 L 540,65 L 540,48 L 555,18
        L 570,48 L 570,65 L 585,35 L 600,65 L 600,85 L 615,50 L 630,85 L 630,65 L 645,30 L 660,65 L 660,45 L 675,12 L 690,45
        L 690,65 L 705,32 L 720,65 L 720,85 L 735,50 L 750,85 L 750,65 L 765,30 L 780,65 L 780,48 L 795,18 L 810,48 L 810,65
        L 825,35 L 840,65 L 840,85 L 855,50 L 870,85 L 870,65 L 885,30 L 900,65 L 900,45 L 915,12 L 930,45 L 930,65 L 945,32
        L 960,65 L 960,85 L 975,50 L 990,85 L 990,65 L 1005,30 L 1020,65 L 1020,48 L 1035,18 L 1050,48 L 1050,65 L 1065,35 L 1080,65
        L 1080,85 L 1095,50 L 1110,85 L 1110,65 L 1125,30 L 1140,65 L 1140,45 L 1155,12 L 1170,45 L 1170,75 L 1185,40 L 1200,75 L 1200,160 Z
      " shape-rendering="crispEdges"/>
    </svg>

    <!-- Layer 2: Sharp Dark Foreground Pine Trees -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 130" preserveAspectRatio="none" class="w-full h-32 lg:h-44 fill-[#080d20] opacity-98 relative z-1">
      <path d="
        M 0,130 L 0,65 L 12,30 L 24,65 L 24,50 L 36,20 L 48,50 L 48,65 L 60,35 L 72,65 L 72,80 L 84,45 L 96,80 L 96,65 L 108,30
        L 120,65 L 120,50 L 132,15 L 144,50 L 144,65 L 156,35 L 168,65 L 168,85 L 180,50 L 192,85 L 192,70 L 204,35 L 216,70
        L 216,55 L 228,25 L 240,55 L 240,70 L 252,40 L 264,70 L 264,90 L 276,55 L 288,90 L 288,70 L 300,35 L 312,70 L 312,50
        L 324,18 L 336,50 L 336,70 L 348,40 L 360,70 L 360,90 L 372,55 L 384,90 L 384,70 L 396,38 L 408,70 L 408,52 L 420,22
        L 432,52 L 432,70 L 444,40 L 456,70 L 456,90 L 468,55 L 480,90 L 480,70 L 492,35 L 504,70 L 504,50 L 516,18 L 528,50
        L 528,70 L 540,38 L 552,70 L 552,90 L 564,55 L 576,90 L 576,70 L 588,35 L 600,70 L 600,52 L 612,22 L 624,52 L 624,70
        L 636,40 L 648,70 L 648,90 L 660,55 L 672,90 L 672,70 L 684,35 L 696,70 L 696,50 L 708,18 L 720,50 L 720,70 L 732,38
        L 744,70 L 744,90 L 756,55 L 768,90 L 768,70 L 780,35 L 792,70 L 792,52 L 804,22 L 816,52 L 816,70 L 828,40 L 840,70
        L 840,90 L 852,55 L 864,90 L 864,70 L 876,35 L 888,70 L 888,50 L 900,18 L 912,50 L 912,70 L 924,38 L 936,70 L 936,90
        L 948,55 L 960,90 L 960,70 L 972,35 L 984,70 L 984,52 L 996,22 L 1008,52 L 1008,70 L 1020,40 L 1032,70 L 1032,90
        L 1044,55 L 1056,90 L 1056,70 L 1068,35 L 1080,70 L 1080,50 L 1092,18 L 1104,50 L 1104,70 L 1116,38 L 1128,70 L 1128,90
        L 1140,55 L 1152,90 L 1152,70 L 1164,35 L 1176,70 L 1176,50 L 1188,25 L 1200,60 L 1200,130 Z
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

  <!-- Fire Pillars Component with Pixel Flames -->
  <div class="fire-pillar-wrapper fire-left hidden md:block">
    <img src="<?= base_url('images/fire-pillar-base.png') ?>" alt="Fire Pillar Left Base" class="fire-base-img">
    <img src="<?= base_url('images/flame-only.png') ?>" alt="Pixel Flame Left" class="flame-tip-img">
    <div class="flame-ember ember-l w-2 h-2 left-6 bottom-40"></div>
    <div class="flame-ember ember-r w-1.5 h-1.5 left-10 bottom-48"></div>
  </div>

  <div class="fire-pillar-wrapper fire-right hidden md:block">
    <img src="<?= base_url('images/fire-pillar-base.png') ?>" alt="Fire Pillar Right Base" class="fire-base-img">
    <img src="<?= base_url('images/flame-only.png') ?>" alt="Pixel Flame Right" class="flame-tip-img">
    <div class="flame-ember ember-l w-2 h-2 left-6 bottom-40"></div>
    <div class="flame-ember ember-r w-1.5 h-1.5 left-10 bottom-48"></div>
  </div>

  <!-- Animated Grass Component -->
  <div class="fire-pillar-wrapper fire-left hidden md:block">
    <img src="<?= base_url('images/grass-two.png') ?>" alt="Grass Left" class="grass-tuft-img">
  </div>
  <div class="fire-pillar-wrapper fire-right hidden md:block">
    <img src="<?= base_url('images/grass-two.png') ?>" alt="Grass Right" class="grass-tuft-img">
  </div>
</header>

<!-- About Me Section (Character Stats) -->
<section id="about" class="py-16 px-4 max-w-6xl mx-auto relative z-10">
  <div class="rpg-header header-animate flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="<?= base_url('icons/user.png') ?>" alt="Character Status" class="w-8 h-8 object-contain image-rendering-pixelated">
      <span class="rpg-title-glow text-lg lg:text-xl font-bold">CHARACTER STATUS</span>
    </div>
    <span class="sub-text">[ PLAYER PROFILE ]</span>
  </div>

  <!-- Double Border Frame Pixel Box -->
  <div class="rpg-pixel-frame p-6 lg:p-10 mb-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
      
      <!-- Character Avatar & Badges -->
      <div class="flex flex-col items-center text-center border-b md:border-b-0 md:border-r border-[#8b7355]/40 pb-6 md:pb-0 md:pr-6">
        <div class="relative w-36 h-36 mb-4 p-2 bg-[#11162a] border-2 border-[#8b7355] shadow-inner">
          <img src="<?= base_url('images/me.gif') ?>" alt="Agassi Bustarga Avatar" class="w-full h-full object-cover rounded-none image-rendering-pixelated">
          <span class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-[#f0c040] text-black text-[9px] font-bold px-2 py-0.5 border border-[#8b7355] shadow">
            LVL 99
          </span>
        </div>
        <h3 class="text-[#f0c040] text-sm lg:text-base font-bold mb-1 tracking-wider uppercase"><?= htmlspecialchars($fullName) ?></h3>
        <p class="text-[#8a8aa8] text-[10px] uppercase tracking-widest mb-3"><?= htmlspecialchars($roleName) ?></p>
        
        <div class="flex gap-2 flex-wrap justify-center">
          <span class="nes-badge"><span class="is-warning text-[9px] py-1 px-2">FULL STACK</span></span>
          <span class="nes-badge"><span class="is-success text-[9px] py-1 px-2">PHP / REACT</span></span>
        </div>
      </div>

      <!-- Character RPG Stats Bars -->
      <div class="md:col-span-2 space-y-4">
        
        <!-- HP Bar -->
        <div class="stat-row-item flex flex-col sm:flex-row sm:items-center justify-between gap-2">
          <span class="text-[#e74c3c] text-xs font-bold w-28 flex items-center gap-1.5">
            <span class="heart-pulse text-sm inline-block">❤️</span> HP:
          </span>
          <div class="flex-1 flex items-center gap-3">
            <div class="block-bar">
              <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="block-unit <?= $i < $hpBlocks ? 'filled-hp' : '' ?>"></div>
              <?php endfor; ?>
            </div>
            <span class="text-xs text-[#e74c3c] font-bold w-12 text-right"><?= $hpVal ?>%</span>
          </div>
        </div>

        <!-- EXP Bar -->
        <div class="stat-row-item flex flex-col sm:flex-row sm:items-center justify-between gap-2">
          <span class="text-[#2ecc71] text-xs font-bold w-28 flex items-center gap-1.5">
            <span class="text-sm inline-block">⚡</span> EXP:
          </span>
          <div class="flex-1 flex items-center gap-3">
            <div class="block-bar">
              <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="block-unit <?= $i < $expBlocks ? 'filled-exp' : '' ?>"></div>
              <?php endfor; ?>
            </div>
            <span class="text-xs text-[#2ecc71] font-bold w-12 text-right"><?= $expVal ?>%</span>
          </div>
        </div>

        <div class="border-t border-[#8b7355]/30 my-3"></div>

        <!-- Key RPG Attributes Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-[11px]">
          <div class="bg-[#11162a] p-3 border border-[#8b7355]/40 flex items-center justify-between">
            <span class="text-[#8a8aa8] uppercase">CLASS:</span>
            <span class="text-white font-bold">FULL-STACK</span>
          </div>
          <div class="bg-[#11162a] p-3 border border-[#8b7355]/40 flex items-center justify-between">
            <span class="text-[#8a8aa8] uppercase">LOCATION:</span>
            <span class="text-[#f0c040] font-bold"><?= htmlspecialchars($location) ?></span>
          </div>
          <div class="bg-[#11162a] p-3 border border-[#8b7355]/40 flex items-center justify-between">
            <span class="text-[#8a8aa8] uppercase">MAIN WEAPON:</span>
            <span class="text-[#f0c040] font-bold"><?= htmlspecialchars($weaponText) ?></span>
          </div>
          <div class="bg-[#11162a] p-3 border border-[#8b7355]/40 flex items-center justify-between">
            <span class="text-[#8a8aa8] uppercase">EXPERIENCE:</span>
            <span class="text-[#2ecc71] font-bold"><?= htmlspecialchars($levelText) ?></span>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- Quest Log Section (Projects) -->
<section id="quest-log" class="py-16 px-4 max-w-6xl mx-auto relative z-10">
  <div class="rpg-header header-animate flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="<?= base_url('icons/cross-sword.png') ?>" alt="Quest Log" class="w-7 h-7 object-contain image-rendering-pixelated">
      <span class="rpg-title-glow text-lg lg:text-xl font-bold">QUEST LOG</span>
    </div>
    <span class="sub-text">[ SELECT A QUEST ]</span>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php 
    $projects = View::getData()['projects'] ?? [];
    if (!empty($projects)):
      foreach ($projects as $idx => $p):
        $pId = $p['id'] ?? ($idx + 1);
        $pTitle = htmlspecialchars($p['project_name'] ?? 'UNTITLED QUEST');
        $pDesc = htmlspecialchars($p['description'] ?? 'No quest description available.');
        $pImg = !empty($p['image']) ? base_url($p['image']) : base_url('images/home-sky.png');
        $pTech = !empty($p['tech_stack']) ? explode(',', $p['tech_stack']) : ['PHP', 'MYSQL', 'TAILWIND'];
    ?>
      <!-- Quest Card Item -->
      <a href="<?= base_url("project/$pId") ?>" class="quest-card-item group p-5 flex flex-col justify-between no-underline">
        <div>
          <!-- Quest Image Frame -->
          <div class="relative w-full h-44 mb-4 bg-[#11162a] border-2 border-[#8b7355] overflow-hidden">
            <img src="<?= $pImg ?>" alt="<?= $pTitle ?>" class="w-full h-full object-cover image-rendering-pixelated group-hover:scale-105 transition-transform duration-300">
            <span class="absolute top-2 right-2 bg-[#0a0f24]/90 text-[#f0c040] border border-[#8b7355] text-[8.5px] px-2 py-1 font-bold uppercase">
              QUEST #<?= sprintf("%02d", $idx + 1) ?>
            </span>
          </div>

          <!-- Quest Title -->
          <h3 class="text-[#f0c040] group-hover:text-white text-xs lg:text-sm font-bold tracking-wide mb-2 flex items-center gap-2">
            <span class="quest-select-cursor">▶</span>
            <span><?= $pTitle ?></span>
          </h3>

          <!-- Quest Description -->
          <p class="text-[#a0a0c0] text-[10.5px] leading-relaxed mb-4 line-clamp-3">
            <?= $pDesc ?>
          </p>
        </div>

        <div>
          <!-- Tech Stack Badges -->
          <div class="flex flex-wrap gap-1.5 mb-4">
            <?php foreach (array_slice($pTech, 0, 3) as $tech): ?>
              <span class="quest-tag-badge"><?= htmlspecialchars(trim($tech)) ?></span>
            <?php endforeach; ?>
          </div>

          <!-- Action Button Footer -->
          <div class="flex items-center justify-between border-t border-[#8b7355]/40 pt-3 text-[10px] text-[#f0c040] font-bold">
            <span>VIEW QUEST DETAILS</span>
            <span class="group-hover:translate-x-1 transition-transform font-bold">▶</span>
          </div>
        </div>
      </a>
    <?php 
      endforeach;
    else:
    ?>
      <div class="col-span-full rpg-pixel-frame p-8 text-center text-[#8a8aa8]">
        <p>[ NO ACTIVE QUESTS FOUND IN DATABASE ]</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Inventory Section (Skills Categorized) -->
<section id="inventory" class="py-16 px-4 max-w-6xl mx-auto relative z-10 mb-12">
  <div class="rpg-header header-animate flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="<?= base_url('icons/chest.png') ?>" alt="Skill Inventory" class="w-7 h-7 object-contain image-rendering-pixelated">
      <span class="rpg-title-glow text-lg lg:text-xl font-bold">INVENTORY &amp; SKILLS</span>
    </div>
    <span class="sub-text">[ EQUIPPED SKILLS ]</span>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <?php
    $skillsByCategory = View::getData()['skillsByCategory'] ?? [];
    if (!empty($skillsByCategory)):
      foreach ($skillsByCategory as $categoryName => $skillList):
        $catTitle = htmlspecialchars(strtoupper($categoryName));
        $catIcon = 'sparkles.png';
        if (str_contains($catTitle, 'FRONT')) $catIcon = 'code.png';
        elseif (str_contains($catTitle, 'BACK')) $catIcon = 'cpu.png';
        elseif (str_contains($catTitle, 'DB') || str_contains($catTitle, 'DATA')) $catIcon = 'chest.png';
        elseif (str_contains($catTitle, 'TOOL') || str_contains($catTitle, 'OTHER')) $catIcon = 'wand.png';
    ?>
      <!-- Category Skill Container -->
      <div class="rpg-pixel-frame p-6 lg:p-8">
        <h3 class="text-[#f0c040] text-xs lg:text-sm font-bold tracking-wider uppercase mb-6 flex items-center gap-3 border-b border-[#8b7355]/40 pb-3">
          <img src="<?= base_url("icons/$catIcon") ?>" alt="<?= $catTitle ?>" class="w-5 h-5 object-contain image-rendering-pixelated">
          <span><?= $catTitle ?></span>
        </h3>

        <div class="space-y-4">
          <?php foreach ($skillList as $s): 
            $sName = htmlspecialchars($s['skill_name'] ?? 'SKILL');
            $sPct = intval($s['proficiency_percentage'] ?? 80);
            $sBlocks = max(1, min(10, round($sPct / 10)));
            $sIcon = !empty($s['icon_name']) ? base_url($s['icon_name']) : base_url('icons/sparkles.png');
          ?>
            <div class="stat-row-item flex items-center justify-between gap-3 text-[11px]">
              <div class="flex items-center gap-2.5 w-36 sm:w-44 truncate">
                <img src="<?= $sIcon ?>" alt="<?= $sName ?>" class="w-4 h-4 object-contain image-rendering-pixelated flex-shrink-0">
                <span class="text-[#d0d0e0] font-bold truncate"><?= $sName ?></span>
              </div>

              <div class="flex-1 flex items-center justify-end gap-2.5">
                <div class="block-bar">
                  <?php for ($i = 0; $i < 10; $i++): ?>
                    <div class="block-unit <?= $i < $sBlocks ? 'filled-skill' : '' ?>"></div>
                  <?php endfor; ?>
                </div>
                <span class="text-[#f0c040] font-bold text-[10px] w-8 text-right"><?= $sPct ?>%</span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php 
      endforeach;
    else:
    ?>
      <div class="col-span-full rpg-pixel-frame p-8 text-center text-[#8a8aa8]">
        <p>[ NO SKILLS EQUIPPED IN INVENTORY ]</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php View::endSection(); ?>
