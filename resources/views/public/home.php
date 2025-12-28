<?php
/**
 * Home/Hero Section Template
 * Main landing page with introduction, avatar, and call-to-action buttons
 * 
 * @var array $home - Home section data
 * @var array $contact - Contact info data
 * @var string $firstName - First name (processed in controller)
 * @var string $lastName - Last name (processed in controller)
 * @var string $profilePhoto - Profile photo path with default fallback
 */

use app\core\View;

// Extend the public layout
View::extend('public/layout');
?>

<?php View::section('title') ?>
Portfolio - <?= htmlspecialchars($home['name'] ?? 'Agassi Bustarga') ?>
<?php View::endSection() ?>

<?php View::section('content') ?>
<header id="home" class="flex flex-col items-center justify-center min-h-screen gap-8 px-6 max-w-8xl lg:flex-row lg:gap-16 xl:gap-20">
  
  <!-- Text Content Section: Introduction and call-to-action buttons -->
  <div class="relative w-full max-w-xl p-6 border shadow-md opacity-0 lg:w-auto lg:max-w-2xl xl:max-w-3xl rounded-xl bg-pink-500/10 border-pink-500/30 animate-slide-in-left">
    <div class="relative z-10 space-y-5">
      <h3 class="text-xl font-semibold text-pink-500">Hi, I'm <?= htmlspecialchars($home['name'] ?? 'Agassi Bustarga') ?></h3>
      <h1 class="text-2xl font-bold text-white lg:text-3xl xl:text-4xl drop-shadow-lg">Full-stack Web
        <span class="text-pink-500"><br><span class="typing-container" data-text="<?= htmlspecialchars($home['role'] ?? 'Student Developer') ?>"><span class="typing-text"><?= htmlspecialchars($home['role'] ?? 'Student Developer') ?></span></span></span>
      </h1>
      <p class="max-w-2xl text-base text-gray-100 drop-shadow-md"><?= htmlspecialchars($home['short_bio'] ?? '') ?></p>
      
      <!-- Action buttons: Primary CTA buttons for CV download and portfolio exploration -->
      <div class="flex flex-row gap-4 mt-6 opacity-0 max-sm:justify-center lg:gap-6 animate-fade-in-up animation-delay-1000">
        <a href="#projects" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg shadow-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <img src="icons/download.svg" alt="Download" class="w-4 h-4 transition-transform duration-300 group-hover:-translate-y-1" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
          Download CV
        </a>

        <a href="#portfolio" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg shadow-lg border-pink-500/50 hover:from-pink-600/30 hover:to-rose-700/30 hover:scale-105 hover:shadow-xl bg-gradient-to-r from-pink-500/20 to-rose-600/20">
          <img src="icons/arrow-right.svg" alt="Arrow Right" class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
          Explore More
        </a>
      </div>

      <!-- Social Media Icons: External profile links with hover animations -->
      <div class="flex gap-6 pt-8 mt-8 border-t opacity-0 border-white/30 animate-scale-in animation-delay-1500">
        <!-- Github -->
        <?php if (!empty($contact['github_link'])): ?>
        <a href="<?= htmlspecialchars($contact['github_link']) ?>" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:rotate-12">
          <img src="icons/github.svg" alt="GitHub" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        <?php endif; ?>
        
        <!-- Linkedin -->
        <?php if (!empty($contact['linkedin_link'])): ?>
        <a href="<?= htmlspecialchars($contact['linkedin_link']) ?>" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:-rotate-12">
          <img src="icons/linkedin.svg" alt="LinkedIn" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        <?php endif; ?>
        
        <!-- Instagram -->
        <?php if (!empty($contact['instagram_link'])): ?>
        <a href="<?= htmlspecialchars($contact['instagram_link']) ?>" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:rotate-12">
          <img src="icons/instagram.svg" alt="Instagram" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        <?php endif; ?>
        
        <!-- Gmail -->
        <?php if (!empty($contact['email'])): ?>
        <a href="mailto:<?= htmlspecialchars($contact['email']) ?>" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:-rotate-12">
          <img src="icons/gmail.svg" alt="Gmail" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Avatar Section: Large profile image with animated tech stack orbits -->
  <div class="relative flex items-center justify-center opacity-0 animate-slide-in-right animation-delay-500">
    <!-- Orbit Container: Animated tech stack icons rotating around avatar -->
    <div class="absolute inset-0 flex items-center justify-center" style="width: 200%; height: 200%; left: -50%; top: -50%;">
      <!-- Outer Orbit: First ring of technology icons -->
      <div class="absolute w-[32rem] h-[32rem] lg:w-[40rem] lg:h-[40rem] xl:w-[48rem] xl:h-[48rem] border rounded-full border-pink-500/20 animate-spin" style="animation-duration: 20s;">
        <?php 
        // Display first 4 tech icons in outer orbit
        $orbitPositions = [
          '-top-3 left-1/2 -translate-x-1/2',
          'top-1/2 -right-3 -translate-y-1/2',
          '-bottom-3 left-1/2 -translate-x-1/2',
          'top-1/2 -left-3 -translate-y-1/2'
        ];
        $outerTech = array_slice($techstack ?? [], 0, 4);
        foreach ($outerTech as $i => $tech):
          $pos = $orbitPositions[$i] ?? $orbitPositions[0];
        ?>
        <div class="absolute z-30 w-6 h-6 opacity-30 <?= $pos ?> lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <?php if (!empty($tech['icon'])): ?>
          <img src="<?= htmlspecialchars($tech['icon']) ?>" alt="<?= htmlspecialchars($tech['tech_name']) ?>" class="w-full h-full">
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    
      <!-- Inner Orbit: Second ring of technology icons (reverse rotation) -->
      <div class="absolute border overscroll-none rounded-full w-[26rem] h-[26rem] lg:w-[32rem] lg:h-[32rem] xl:w-[38rem] xl:h-[38rem] border-rose-400/20 animate-spin" style="animation-duration: 15s; animation-direction: reverse;">
        <?php 
        // Display next 4 tech icons in inner orbit
        $innerTech = array_slice($techstack ?? [], 4, 4);
        foreach ($innerTech as $i => $tech):
          $pos = $orbitPositions[$i] ?? $orbitPositions[0];
        ?>
        <div class="absolute z-30 w-6 h-6 opacity-40 <?= $pos ?> lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <?php if (!empty($tech['icon'])): ?>
          <img src="<?= htmlspecialchars($tech['icon']) ?>" alt="<?= htmlspecialchars($tech['tech_name']) ?>" class="w-full h-full">
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    
    <!-- Avatar Container: Main profile image with glow effects -->
    <div class="relative z-10 flex items-center justify-center">
      <!-- Glow Effect: Animated background glow for avatar -->
      <div class="absolute inset-0 rounded-full w-[20rem] h-[20rem] lg:w-[24rem] lg:h-[24rem] xl:w-[28rem] xl:h-[28rem] bg-gradient-to-r from-pink-500/30 via-rose-500/30 to-pink-500/30 blur-xl animate-pulse"></div>
      
      <!-- Main Avatar Frame: Bordered container for profile image -->
      <div class="relative flex items-center justify-center rounded-full shadow-2xl border-pink-500/20 border-2 w-[18rem] h-[18rem] lg:w-[22rem] lg:h-[22rem] xl:w-[26rem] xl:h-[26rem] bg-white/20">
        <!-- Inner glow -->
        <div class="absolute rounded-full inset-4 bg-gradient-to-r from-pink-500/20 via-transparent to-pink-500/20"></div>
        
        <!-- Avatar Image: Interactive profile photo with hover state -->
        <div class="relative z-20 flex items-center justify-center w-[16rem] h-[16rem] lg:w-[20rem] lg:h-[20rem] xl:w-[24rem] xl:h-[24rem] overflow-hidden rounded-full cursor-pointer">
          <img
            src="<?= htmlspecialchars($profilePhoto) ?>"
            onmouseover="this.src='<?= htmlspecialchars($hoverPhoto) ?>'"
            onmouseout="this.src='<?= htmlspecialchars($profilePhoto) ?>'"
            alt="avatar"
            class="object-cover w-full h-full"
          />
        </div>
      </div>
    </div>
  </div>
</header>

<?php 
// Include other page sections
include __DIR__ . '/portfolio.php'; 
include __DIR__ . '/services.php'; 
include __DIR__ . '/contacts.php'; 
?>
<?php View::endSection() ?>
