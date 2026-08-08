<?php
    /**
 * Home Page - 8-bit RPG Portfolio
 * Hero section + About Me character stats
 *
 * @var array $home - Home section data
 * @var array $contact - Contact info data
 * @var string $profilePhoto - Profile photo path
 * @var array $techstack - Tech stack data
 */
    use app\core\View;
    View::extend('public/layout');

    $fullName = strtoupper(($home['name'] ?? 'CODEWIZARD'));
    $roleName = strtoupper(($home['role'] ?? 'TECH DEVELOPER'));
    $bioText  = $home['short_bio'] ?? 'I build modern, scalable, and user-friendly web applications with clean code and pixel-perfect precision.';
    $location = $contact['address'] ?? 'Earth (Remote)';
?>

<?php View::section('title')?>
<?= htmlspecialchars($fullName) ?> - LVL 5 Developer
<?php View::endSection()?>

<?php View::section('content')?>

<!-- ====== HERO SECTION ====== -->
<header id="home" class="relative min-h-[680px] lg:min-h-[780px] flex flex-col justify-end items-center pt-28 pb-10 px-4 overflow-hidden mt-0">
  <!-- Background Image (home-sky.png) - Fills top to bottom -->
  <div class="absolute inset-0 z-0">
    <img src="<?= base_url('images/home-sky.png') ?>" alt="Pixel Art Night City" class="w-full h-full object-cover object-top m-0 p-0">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#0a0f24]"></div>
  </div>

  <!-- Hero Content Box (Golden Dialog) - Scaled up, floating & lowered down -->
  <div class="golden-hero-box max-w-[780px] w-full mx-auto relative z-10 mb-4">
    <h2 class="text-white text-xs lg:text-sm tracking-widest mb-4 font-normal">
      WELCOME BACK!
    </h2>
    <h1 class="text-white text-base lg:text-lg leading-relaxed mb-5">
      I AM <span class="text-[#f0c040] font-bold"><?= htmlspecialchars($fullName) ?></span>,<br>
      A <?= htmlspecialchars($roleName) ?>.
    </h1>

    <div class="flex items-center justify-center gap-4 my-5 text-[#c8a951]">
      <span class="h-[2px] w-24 bg-[#c8a951]"></span>
      <span class="text-sm">◆</span>
      <span class="h-[2px] w-24 bg-[#c8a951]"></span>
    </div>

    <p class="text-[#d0d0e0] text-[11px] lg:text-[13px] leading-loose max-w-[640px] mx-auto mb-9 font-normal">
      <?= htmlspecialchars($bioText) ?>
    </p>

    <a href="#quest-log" class="golden-btn flex items-center justify-center gap-2">
      <span>&gt; START QUEST</span>
      <span class="rpg-cursor-blink">▶</span>
    </a>
  </div>
</header>

<!-- ====== ABOUT ME / CHARACTER STATS ====== -->
<section id="about" class="max-w-7xl mx-auto px-6 py-14">
  <div class="rpg-header">
    <img src="<?= base_url('icons/sword.png') ?>" alt="Sword Icon" class="w-6 h-6 object-contain image-pixelated inline-block">
    <span class="rpg-title-glow">ABOUT ME</span>
    <span class="sub-text">(CHARACTER STATS)</span>
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
        <!-- Level Stat -->
        <div class="stat-row-item flex items-center gap-4">
          <img src="<?= base_url('icons/star.png') ?>" alt="Level Star" class="w-12 h-12 lg:w-14 lg:h-14 shrink-0 object-contain image-pixelated">
          <div class="flex flex-col justify-center">
            <span class="text-[#f0c040] text-xs font-bold tracking-wider">LEVEL</span>
            <span class="text-white text-xs lg:text-sm leading-snug mt-0.5">5 Years Experience</span>
          </div>
        </div>

        <!-- Weapon Stat -->
        <div class="stat-row-item flex items-center gap-4">
          <img src="<?= base_url('icons/sword.png') ?>" alt="Weapon Sword" class="w-12 h-12 lg:w-14 lg:h-14 shrink-0 object-contain image-pixelated">
          <div class="flex flex-col justify-center">
            <span class="text-[#f0c040] text-xs font-bold tracking-wider">WEAPON</span>
            <span class="text-white text-xs lg:text-sm leading-snug mt-0.5">Code &amp; Creativity</span>
          </div>
        </div>
      </div>

      <!-- Stat Col 3: Animated Sequential HP & EXP Bars with Pulsing Heart -->
      <div class="flex flex-col gap-7 md:border-l-2 border-[#2b334e] md:pl-8 justify-center">
        <!-- HP Bar -->
        <div class="flex flex-col gap-2.5">
          <div class="flex justify-between items-center text-xs lg:text-[13px]">
            <span class="text-[#e74c3c] font-bold flex items-center gap-2">
              <img src="<?= base_url('icons/heart.png') ?>" alt="Heart Icon" class="w-6 h-6 object-contain image-pixelated heart-pulse"> HP
            </span>
            <span class="text-white font-bold">100%</span>
          </div>
          <div class="block-bar">
            <?php for ($i = 0; $i < 10; $i++): ?>
              <div class="block-unit filled-hp animate-fill"></div>
            <?php endfor; ?>
          </div>
        </div>

        <!-- EXP Bar -->
        <div class="flex flex-col gap-2.5">
          <div class="flex justify-between items-center text-xs lg:text-[13px]">
            <span class="text-[#2ecc71] font-bold flex items-center gap-2">
              <img src="<?= base_url('icons/star.png') ?>" alt="Exp Star" class="w-6 h-6 object-contain image-pixelated"> EXP
            </span>
            <span class="text-white font-bold">85%</span>
          </div>
          <div class="block-bar">
            <?php for ($i = 0; $i < 10; $i++): ?>
              <div class="block-unit <?= $i < 8 ? 'filled-exp animate-fill' : '' ?>"></div>
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
