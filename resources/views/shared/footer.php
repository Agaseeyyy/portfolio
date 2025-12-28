<?php
/**
 * Footer
 * Uses dynamic data from contacts and home
 * 
 * @var array $home - Home section data (name)
 * @var array $contact - Contact data with social links
 */

use app\core\View;
$data = View::getData();
$home = $data['home'] ?? [];
$contact = $data['contact'] ?? [];

// Get name
$fullName = $home['name'] ?? 'Agassi Bustarga';
$shortBio = $home['short_bio'] ?? 'Passionate student developer crafting digital experiences with modern technologies and creative solutions.';

// Social links
$github = $contact['github_link'] ?? '';
$linkedin = $contact['linkedin_link'] ?? '';
$instagram = $contact['instagram_link'] ?? '';
$email = $contact['email'] ?? '';
?>
<!-- Footer -->
<footer class="relative z-10 mt-20 overflow-hidden">
  <!-- Animated Background Elements -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute w-64 h-64 rounded-full bg-gradient-to-r from-pink-500/15 to-purple-500/15 -bottom-32 -left-32 animate-pulse"></div>
    <div class="absolute w-48 h-48 rounded-full bg-gradient-to-r from-blue-500/15 to-cyan-500/15 -bottom-24 -right-24 animate-pulse" style="animation-delay: 1.5s;"></div>
    <div class="absolute w-32 h-32 rounded-full bg-gradient-to-r from-rose-500/10 to-pink-500/10 top-4 left-1/4 animate-pulse" style="animation-delay: 0.8s;"></div>
  </div>
  
  <!-- Main Footer Content -->
  <div class="relative border-t bg-gradient-to-br from-gray-900/80 via-purple-900/60 to-pink-900/80 border-white/30">
    <!-- Top decorative line -->
    <div class="h-1 bg-gradient-to-r from-transparent via-pink-500 to-transparent"></div>
    
    <div class="px-6 py-12 mx-auto max-w-8xl lg:px-8 xl:px-12">
      <!-- Footer Grid -->
      <div class="grid gap-8 mb-8 md:grid-cols-3 lg:gap-12">
        
        <!-- Brand Section -->
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <div class="flex items-center justify-center w-10 h-10 p-1 rounded-full bg-gradient-to-br from-gray-700 to-gray-900">
              <img src="<?= base_url('images/favicon.png') ?>" alt="<?= htmlspecialchars($fullName) ?>" class="object-contain w-full h-full rounded-full">
            </div>
            <h3 class="text-xl font-bold text-white"><?= htmlspecialchars($fullName) ?></h3>
          </div>
          <p class="text-sm leading-relaxed text-gray-300">
            <?= htmlspecialchars($shortBio) ?>
          </p>
          <div class="flex items-center gap-2 text-xs text-gray-400">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            Available for opportunities
          </div>
        </div>
        
        <!-- Quick Links -->
        <div class="space-y-4">
          <h4 class="text-lg font-semibold text-white">Quick Links</h4>
          <div class="space-y-2">
            <a href="#home" class="flex items-center gap-2 text-sm text-gray-300 transition-colors duration-300 transform hover:text-pink-400 hover:translate-x-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              Home
            </a>
            <a href="#portfolio" class="flex items-center gap-2 text-sm text-gray-300 transition-colors duration-300 transform hover:text-pink-400 hover:translate-x-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
              </svg>
              Portfolio
            </a>
            <a href="#services" class="flex items-center gap-2 text-sm text-gray-300 transition-colors duration-300 transform hover:text-pink-400 hover:translate-x-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Services
            </a>
            <a href="#contacts" class="flex items-center gap-2 text-sm text-gray-300 transition-colors duration-300 transform hover:text-pink-400 hover:translate-x-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Contact
            </a>
          </div>
        </div>
        
        <!-- Connect Section -->
        <div class="space-y-4">
          <h4 class="text-lg font-semibold text-white">Let's Connect</h4>
          <div class="grid grid-cols-2 gap-3">
            <?php if (!empty($github)): ?>
            <a href="<?= htmlspecialchars($github) ?>" target="_blank" 
               class="flex items-center gap-2 p-3 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 496 512">
                <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8z"/>
              </svg>
              <span class="text-xs text-white">GitHub</span>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($linkedin)): ?>
            <a href="<?= htmlspecialchars($linkedin) ?>" target="_blank" 
               class="flex items-center gap-2 p-3 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-blue-500/20 hover:border-blue-500/50 hover:scale-105 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
              </svg>
              <span class="text-xs text-white">LinkedIn</span>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($instagram)): ?>
            <a href="<?= htmlspecialchars($instagram) ?>" target="_blank" 
               class="flex items-center gap-2 p-3 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-purple-500/20 hover:border-purple-500/50 hover:scale-105 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
              </svg>
              <span class="text-xs text-white">Instagram</span>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($email)): ?>
            <a href="mailto:<?= htmlspecialchars($email) ?>" 
               class="flex items-center gap-2 p-3 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-green-500/20 hover:border-green-500/50 hover:scale-105 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span class="text-xs text-white">Email</span>
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
      <!-- Footer Bottom -->
      <div class="pt-6 border-t border-white/10">
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
          <div class="flex items-center gap-4 text-sm text-gray-400">
            <span>© <?= date('Y') ?> <?= htmlspecialchars($fullName) ?></span>
            <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
            <span>All Rights Reserved</span>
          </div>
          
          <div class="flex items-center gap-2 text-xs text-gray-500">
            <span>Built with</span>
            <span class="text-pink-400">❤️</span>
            <span>using PHP & Tailwind CSS</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>