<?php
/**
 * Home/Hero Section Template
 * Main landing page with introduction, avatar, and call-to-action buttons
 * Features: Typing animation, social links, animated tech stack orbits
 */
?>
<header id="home" class="flex flex-col items-center justify-center min-h-screen gap-8 px-6 max-w-8xl lg:flex-row lg:gap-16 xl:gap-20">
  
  <!-- Text Content Section: Introduction and call-to-action buttons -->
  <div class="relative w-full max-w-xl p-6 border shadow-md opacity-0 lg:w-auto lg:max-w-2xl xl:max-w-3xl rounded-xl bg-pink-500/10 border-pink-500/30 animate-slide-in-left">
    <div class="relative z-10 space-y-5">
      <h3 class="text-xl font-semibold text-pink-500">Hi, I'm Agassi Bustarga</h3>
      <h1 class="text-2xl font-bold text-white lg:text-3xl xl:text-4xl drop-shadow-lg">Full-stack Web
        <span class="text-pink-500"><br><span class="typing-container" data-text="Student Developer"><span class="typing-text">Student Developer</span></span></span>
      </h1>
      <p class="max-w-2xl text-base text-gray-100 drop-shadow-md">A passionate and dedicated information technology student with a knack for problem-solving and a love for coding. Eager to learn and grow in the tech industry.</p>
      
      <!-- Action buttons: Primary CTA buttons for CV download and portfolio exploration -->
      <div class="flex flex-row gap-4 mt-6 opacity-0 max-sm:justify-center lg:gap-6 animate-fade-in-up animation-delay-1000">
        <a href="#projects" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg shadow-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <img src="../public/images/icons/download.svg" alt="Download" class="w-4 h-4 transition-transform duration-300 group-hover:-translate-y-1" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
          Download CV
        </a>

        <a href="#portfolio" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg shadow-lg border-pink-500/50 hover:from-pink-600/30 hover:to-rose-700/30 hover:scale-105 hover:shadow-xl bg-gradient-to-r from-pink-500/20 to-rose-600/20">
          <img src="../public/images/icons/arrow-right.svg" alt="Arrow Right" class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
          Explore More
        </a>
      </div>

      <!-- Social Media Icons: External profile links with hover animations -->
      <div class="flex gap-6 pt-8 mt-8 border-t opacity-0 border-white/30 animate-scale-in animation-delay-1500">
        <!-- Github -->
        <a href="https://github.com/agaseeyyy" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:rotate-12">
          <img src="../public/images/icons/github.svg" alt="GitHub" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        
        <!-- Linkedin -->
        <a href="https://linkedin.com/in/agassi-bustarga" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:-rotate-12">
          <img src="../public/images/icons/linkedin.svg" alt="LinkedIn" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        
        <!-- Instagram -->
        <a href="https://instagram.com/_agaseeyyy" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:rotate-12">
          <img src="../public/images/icons/instagram.svg" alt="Instagram" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
        
        <!-- Gmail -->
        <a href="mailto:bustargaagassi1018@gmail.com" target="_blank" 
           class="p-3 transition-all duration-200 border rounded-full border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:-rotate-12">
          <img src="../public/images/icons/gmail.svg" alt="Gmail" class="w-6 h-6 text-white lg:w-5 lg:h-5" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
        </a>
      </div>
    </div>
  </div>

  <!-- Avatar Section: Large profile image with animated tech stack orbits -->
  <div class="relative flex items-center justify-center opacity-0 animate-slide-in-right animation-delay-500">
    <!-- Orbit Container: Animated tech stack icons rotating around avatar -->
    <div class="absolute inset-0 flex items-center justify-center" style="width: 200%; height: 200%; left: -50%; top: -50%;">
      <!-- Outer Orbit: First ring of technology icons -->
      <div class="absolute w-[32rem] h-[32rem] lg:w-[40rem] lg:h-[40rem] xl:w-[48rem] xl:h-[48rem] border rounded-full border-pink-500/20 animate-spin" style="animation-duration: 20s;">
      <!-- React Icon -->
      <div class="absolute z-30 w-6 h-6 text-blue-400 transform -translate-x-1/2 opacity-30 -top-3 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/react.svg" alt="React" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(42%) sepia(93%) saturate(3777%) hue-rotate(203deg) brightness(101%) contrast(101%);">
      </div>
      
      <!-- Spring Boot Icon -->
      <div class="absolute z-30 w-6 h-6 text-green-500 transform -translate-y-1/2 opacity-30 top-1/2 -right-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/spring-boot.svg" alt="Spring Boot" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(48%) sepia(79%) saturate(2476%) hue-rotate(86deg) brightness(118%) contrast(119%);">
      </div>
      
      <!-- HTML Icon -->
      <div class="absolute z-30 w-6 h-6 text-orange-500 transform -translate-x-1/2 opacity-30 -bottom-3 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/html-tag.svg" alt="HTML" class="w-full h-full">
      </div>
      
      <!-- JavaScript Icon -->
      <div class="absolute z-30 w-6 h-6 text-yellow-400 transform -translate-y-1/2 opacity-30 top-1/2 -left-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/javascript.svg" alt="JavaScript" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(82%) sepia(62%) saturate(467%) hue-rotate(359deg) brightness(102%) contrast(101%);">
      </div>
    </div>
    
    <!-- Inner Orbit: Second ring of technology icons (reverse rotation) -->
    <div class="absolute border overscroll-none rounded-full w-[26rem] h-[26rem] lg:w-[32rem] lg:h-[32rem] xl:w-[38rem] xl:h-[38rem] border-rose-400/20 animate-spin" style="animation-duration: 15s; animation-direction: reverse;">
      <!-- Java Icon -->
      <div class="absolute z-30 w-6 h-6 text-red-500 transform -translate-x-1/2 opacity-40 -top-3 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/java.svg" alt="Java" class="w-full h-full">
      </div>
      
      <!-- Tailwind CSS Icon -->
      <div class="absolute z-30 w-6 h-6 transform -translate-y-1/2 opacity-30 text-cyan-400 top-1/2 -right-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/tailwind.svg" alt="Tailwind CSS" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(68%) sepia(100%) saturate(1000%) hue-rotate(159deg) brightness(103%) contrast(104%);">
      </div>
      
      <!-- PHP Icon -->
      <div class="absolute z-30 w-6 h-6 text-purple-500 transform -translate-y-1/2 opacity-40 top-1/2 -left-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/php.svg" alt="php" class="w-full h-full">
      </div>
      
      <!-- Laravel Icon -->
      <div class="absolute z-30 w-6 h-6 text-red-400 transform -translate-x-1/2 -translate-y-1/2 opacity-50 -bottom-8 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
        <img src="../public/images/icons/laravel.svg" alt="Laravel" class="w-full h-full">
      </div>
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
            src="../public/images/def-avatar.png"
            onmouseover="this.src='../public/images/hover-avatar.png'"
            onmouseout="this.src='../public/images/def-avatar.png'"
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
include 'portfolio.php'; 
include 'services.php'; 
include 'contacts.php'; 
?>

