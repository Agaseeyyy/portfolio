<?php
/**
 * Project Detail Page Template
 * Displays full project information including description, technologies, features, and challenges
 * 
 * @var array $project - Full project data array (access via $project['key'])
 * @var string $duration - Calculated project duration (computed in controller)
 * @var string $dateRange - Formatted date range (computed in controller)
 * @var array $home - Home data for header
 * @var array $contact - Contact data
 */

use app\core\View;

// Extend the public layout
View::extend('public/layout');
?>

<?php View::section('title') ?>
<?= htmlspecialchars($project['project_name'] ?? 'Project') ?> - Portfolio
<?php View::endSection() ?>

<?php View::section('content') ?>
<main class="min-h-screen px-6 py-20 max-lg:py-32">
  <div class="max-w-6xl mx-auto">
    
    <!-- Back Button - Top -->
    <a href="<?= base_url('/') ?>#portfolio" class="inline-flex items-center gap-2 px-4 py-2 mb-8 text-sm font-medium text-gray-300 transition-all duration-300 border rounded-full bg-gray-800/50 border-gray-700/50 hover:bg-pink-500/20 hover:border-pink-500/50 hover:text-pink-300 group">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      Back to Portfolio
    </a>

    <!-- Hero Section -->
    <div class="relative mb-12 overflow-hidden border shadow-2xl rounded-2xl bg-gray-800/30 border-gray-700/50">
      <?php if (!empty($project['image'])): ?>
      <div class="w-full overflow-hidden aspect-video">
        <img src="<?= base_url($project['image']) ?>" alt="<?= htmlspecialchars($project['project_name'] ?? '') ?>" class="object-cover w-full h-full">
      </div>
      <?php else: ?>
      <div class="flex items-center justify-center w-full aspect-video bg-gradient-to-br from-pink-500/20 to-purple-500/20">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </div>
      <?php endif; ?>
      
      <!-- Gradient Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/20 to-transparent"></div>
      
      <!-- Project Title Overlay -->
      <div class="absolute bottom-0 left-0 right-0 p-8">
        <h1 class="mb-3 text-3xl font-bold text-white lg:text-4xl xl:text-5xl"><?= htmlspecialchars($project['project_name'] ?? '') ?></h1>
        
        <div class="flex flex-wrap items-center gap-4 text-sm">
          <?php if (!empty($project['role'])): ?>
          <span class="flex items-center gap-2 px-3 py-1 text-pink-300 border rounded-full bg-pink-500/20 border-pink-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <?= htmlspecialchars($project['role']) ?>
          </span>
          <?php endif; ?>
          
          <?php if ($duration): ?>
          <span class="flex items-center gap-2 px-3 py-1 text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <?= $duration ?>
          </span>
          <?php endif; ?>
          
          <?php if ($dateRange): ?>
          <span class="flex items-center gap-2 px-3 py-1 text-gray-300 border rounded-full bg-gray-500/20 border-gray-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <?= $dateRange ?>
          </span>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Content Grid -->
    <div class="grid gap-8 lg:grid-cols-3">
      
      <!-- Main Content -->
      <div class="space-y-8 lg:col-span-2">
        
        <!-- Description -->
        <div class="p-6 border shadow-lg rounded-xl bg-gray-800/30 border-gray-700/50">
          <h2 class="flex items-center gap-3 mb-4 text-xl font-semibold text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            About This Project
          </h2>
          <p class="leading-relaxed text-gray-300"><?= nl2br(htmlspecialchars($project['description'] ?? '')) ?></p>
          <?php if (!empty($project['long_description'])): ?>
          <p class="mt-4 leading-relaxed text-gray-400"><?= nl2br(htmlspecialchars($project['long_description'])) ?></p>
          <?php endif; ?>
        </div>

        <!-- Key Features -->
        <?php if (!empty($project['key_features'])): ?>
        <div class="p-6 border shadow-lg rounded-xl bg-gray-800/30 border-gray-700/50">
          <h2 class="flex items-center gap-3 mb-4 text-xl font-semibold text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Key Features
          </h2>
          <ul class="space-y-3">
            <?php foreach ($project['key_features'] as $feature): ?>
            <li class="flex items-start gap-3">
              <span class="flex-shrink-0 w-2 h-2 mt-2 bg-green-400 rounded-full"></span>
              <span class="text-gray-300"><?= htmlspecialchars($feature) ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <!-- Challenges -->
        <?php if (!empty($project['challenges'])): ?>
        <div class="p-6 border shadow-lg rounded-xl bg-gray-800/30 border-gray-700/50">
          <h2 class="flex items-center gap-3 mb-4 text-xl font-semibold text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            Challenges & Solutions
          </h2>
          <ul class="space-y-3">
            <?php foreach ($project['challenges'] as $challenge): ?>
            <li class="flex items-start gap-3">
              <span class="flex-shrink-0 w-2 h-2 mt-2 bg-orange-400 rounded-full"></span>
              <span class="text-gray-300"><?= htmlspecialchars($challenge) ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <div class="space-y-6">
        
        <!-- Technologies -->
        <?php if (!empty($project['technologies'])): ?>
        <div class="p-6 border shadow-lg rounded-xl bg-gray-800/30 border-gray-700/50">
          <h3 class="flex items-center gap-3 mb-4 text-lg font-semibold text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
            Technologies Used
          </h3>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($project['technologies'] as $tech): ?>
            <span class="flex items-center gap-2 px-3 py-2 text-sm text-gray-200 border rounded-lg bg-gray-700/50 border-gray-600/50">
              <?php if (!empty($tech['icon'])): ?>
              <img src="<?= base_url($tech['icon']) ?>" alt="<?= htmlspecialchars($tech['tech_name']) ?>" class="w-4 h-4">
              <?php endif; ?>
              <?= htmlspecialchars($tech['tech_name']) ?>
            </span>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="p-6 border shadow-lg rounded-xl bg-gray-800/30 border-gray-700/50">
          <h3 class="flex items-center gap-3 mb-4 text-lg font-semibold text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
            </svg>
            Project Links
          </h3>
          <div class="space-y-3">
            <?php if (!empty($project['preview_link'])): ?>
            <a href="<?= htmlspecialchars($project['preview_link']) ?>" target="_blank" 
               class="flex items-center justify-center w-full gap-2 px-4 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-pink-500/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              Live Preview
            </a>
            <?php endif; ?>
            
            <?php if (!empty($project['project_link'])): ?>
            <a href="<?= htmlspecialchars($project['project_link']) ?>" target="_blank" 
               class="flex items-center justify-center w-full gap-2 px-4 py-3 text-sm font-semibold text-gray-200 transition-all duration-300 border rounded-lg bg-gray-700/50 border-gray-600/50 hover:bg-gray-700 hover:scale-105">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 496 512">
                <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8z"/>
              </svg>
              View on GitHub
            </a>
            <?php endif; ?>
            
            <?php if (empty($project['preview_link']) && empty($project['project_link'])): ?>
            <p class="text-sm text-center text-gray-500">No links available</p>
            <?php endif; ?>
          </div>
        </div>

        <!-- Share -->
        <div class="p-6 border shadow-lg rounded-xl bg-gray-800/30 border-gray-700/50">
          <h3 class="flex items-center gap-3 mb-4 text-lg font-semibold text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
            </svg>
            Share Project
          </h3>
          <button onclick="navigator.clipboard.writeText(window.location.href); this.textContent = 'Copied!'; setTimeout(() => this.textContent = 'Copy Link', 2000);" 
                  class="flex items-center justify-center w-full gap-2 px-4 py-3 text-sm font-medium text-gray-300 transition-all duration-300 border rounded-lg bg-gray-700/30 border-gray-600/50 hover:bg-gray-700/50 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
            </svg>
            Copy Link
          </button>
        </div>
      </div>
    </div>

    <!-- Back Button - Bottom -->
    <div class="mt-12 text-center">
      <a href="<?= base_url('/') ?>#portfolio" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-pink-500/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Portfolio
      </a>
    </div>
  </div>
</main>
<?php View::endSection() ?>
