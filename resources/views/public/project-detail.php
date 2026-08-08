<?php
/**
 * Project Detail Page - 8-bit RPG Style
 * High-readability NES RPG layout with custom link.png and share.png section icons
 * 
 * @var array $project - Full project data
 * @var string $duration - Calculated project duration
 * @var string $dateRange - Formatted date range
 * @var array $home - Home data
 * @var array $contact - Contact data
 */
use app\core\View;
View::extend('public/layout');
?>

<?php View::section('title') ?>
<?= htmlspecialchars($project['project_name'] ?? 'Project') ?> - Portfolio
<?php View::endSection() ?>

<?php View::section('content') ?>
<main class="max-w-6xl mx-auto px-6 pt-28 pb-16">
  <!-- Top Back Button -->
  <a href="<?= base_url('/') ?>#quest-log" class="inline-flex items-center gap-3 px-5 py-3 bg-[#11162a] border-2 border-[#8b7355] text-[#f0c040] hover:text-white hover:border-[#f0c040] text-xs font-bold uppercase tracking-wider no-underline transition-colors mb-8 shadow-md" hx-boost="true" hx-target="#main-content" hx-swap="innerHTML transition:true">
    <span>&lt; BACK TO QUEST LOG</span>
  </a>

  <!-- Project Header Container Box -->
  <div class="nes-container is-dark mb-8" style="padding: 2rem;">
    <div class="flex flex-col gap-4">
      <h1 class="text-[#f0c040] text-base lg:text-xl font-bold tracking-wide uppercase rpg-title-glow">
        <?= htmlspecialchars($project['project_name'] ?? 'QUEST DETAILS') ?>
      </h1>

      <!-- Meta Badges -->
      <div class="flex flex-wrap items-center gap-3 pt-3 border-t border-[#232c46]">
        <?php if (!empty($project['role'])): ?>
          <span class="quest-tag-badge flex items-center gap-2">
            <span>🛡️ ROLE:</span>
            <span class="text-white"><?= htmlspecialchars($project['role']) ?></span>
          </span>
        <?php endif; ?>
        <?php if ($duration): ?>
          <span class="quest-tag-badge flex items-center gap-2">
            <span>⏱️ DURATION:</span>
            <span class="text-white"><?= htmlspecialchars($duration) ?></span>
          </span>
        <?php endif; ?>
        <?php if ($dateRange): ?>
          <span class="quest-tag-badge flex items-center gap-2">
            <span>📅 TIMELINE:</span>
            <span class="text-white"><?= htmlspecialchars($dateRange) ?></span>
          </span>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Hero Image Showcase Frame -->
  <?php if (!empty($project['image'])): ?>
    <div class="w-full h-72 lg:h-96 rpg-pixel-frame overflow-hidden mb-8 shadow-xl">
      <img src="<?= base_url($project['image']) ?>" alt="<?= htmlspecialchars($project['project_name'] ?? '') ?>" class="w-full h-full object-cover">
    </div>
  <?php endif; ?>

  <!-- 2-Column Details & Sidebar Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column (Main Details) -->
    <div class="lg:col-span-2 flex flex-col gap-8">
      
      <!-- Quest Overview & Description -->
      <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
        <h2 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-5 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
          <img src="<?= base_url('icons/quest.png') ?>" alt="Quest" class="w-6 h-6 object-contain image-rendering-pixelated">
          <span>QUEST OVERVIEW</span>
        </h2>
        <div class="text-[#d0d0e0] text-xs lg:text-[13px] leading-relaxed flex flex-col gap-4 font-normal">
          <p><?= nl2br(htmlspecialchars($project['description'] ?? '')) ?></p>
          <?php if (!empty($project['long_description'])): ?>
            <p class="pt-3 border-t border-[#1d253b]"><?= nl2br(htmlspecialchars($project['long_description'])) ?></p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Key Features -->
      <?php if (!empty($project['key_features'])): ?>
        <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
          <h2 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-5 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
            <span class="text-base">⚡</span>
            <span>KEY FEATURES & ABILITIES</span>
          </h2>
          <ul class="flex flex-col gap-3.5 pl-0 list-none m-0">
            <?php foreach ($project['key_features'] as $feature): ?>
              <li class="flex items-start gap-3 text-[#d0d0e0] text-xs lg:text-[12.5px] leading-relaxed font-normal">
                <span class="text-[#f0c040] text-sm flex-shrink-0 mt-0.5">▶</span>
                <span><?= htmlspecialchars($feature) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Challenges Overcome -->
      <?php if (!empty($project['challenges'])): ?>
        <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
          <h2 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-5 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
            <img src="<?= base_url('icons/sword.png') ?>" alt="Sword" class="w-6 h-6 object-contain image-rendering-pixelated">
            <span>CHALLENGES OVERCOME</span>
          </h2>
          <ul class="flex flex-col gap-3.5 pl-0 list-none m-0">
            <?php foreach ($project['challenges'] as $challenge): ?>
              <li class="flex items-start gap-3 text-[#d0d0e0] text-xs lg:text-[12.5px] leading-relaxed font-normal">
                <span class="text-[#ff5555] text-sm flex-shrink-0 mt-0.5">⚔️</span>
                <span><?= htmlspecialchars($challenge) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

    </div>

    <!-- Right Column (Sidebar: Tech Stack, Links, Share) -->
    <div class="flex flex-col gap-8">
      
      <!-- Tech Stack -->
      <?php if (!empty($project['technologies'])): ?>
        <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
          <h2 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-5 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
            <img src="<?= base_url('icons/inventory.png') ?>" alt="Tech" class="w-6 h-6 object-contain image-rendering-pixelated">
            <span>TECH STACK</span>
          </h2>
          <div class="flex flex-wrap gap-2.5">
            <?php foreach ($project['technologies'] as $tech): 
              $iconUrl = !empty($tech['icon']) && file_exists(dirname(__DIR__, 3) . '/public/' . $tech['icon']) ? base_url($tech['icon']) : null;
            ?>
              <div class="flex items-center gap-2 px-3 py-2 bg-[#11162a] border border-[#2b354d] text-white text-[11px] font-bold tracking-wider">
                <?php if ($iconUrl): ?>
                  <img src="<?= $iconUrl ?>" alt="" class="w-4 h-4 object-contain">
                <?php endif; ?>
                <span><?= htmlspecialchars(strtoupper($tech['tech_name'])) ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- Quest Links with Custom link.png Icon -->
      <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
        <h2 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-5 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
          <img src="<?= base_url('icons/link.png') ?>" alt="Link" class="w-6 h-6 object-contain image-rendering-pixelated">
          <span>QUEST LINKS</span>
        </h2>
        <div class="flex flex-col gap-3.5">
          <?php if (!empty($project['preview_link'])): ?>
            <a href="<?= htmlspecialchars($project['preview_link']) ?>" target="_blank" class="golden-btn text-center no-underline text-xs block">
              &gt; LIVE PREVIEW
            </a>
          <?php endif; ?>
          <?php if (!empty($project['project_link'])): ?>
            <a href="<?= htmlspecialchars($project['project_link']) ?>" target="_blank" class="px-4 py-3 bg-[#11162a] border-2 border-[#8b7355] text-white hover:border-[#f0c040] hover:text-[#f0c040] text-center text-xs font-bold uppercase tracking-wider no-underline transition-colors block shadow-md">
              &gt; VIEW ON GITHUB
            </a>
          <?php endif; ?>
          <?php if (empty($project['preview_link']) && empty($project['project_link'])): ?>
            <p class="text-[#8a8aa8] text-xs text-center font-normal">NO EXTERNAL LINKS AVAILABLE</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Share Quest with Custom share.png Icon -->
      <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
        <h2 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-5 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
          <img src="<?= base_url('icons/share.png') ?>" alt="Share" class="w-6 h-6 object-contain image-rendering-pixelated">
          <span>SHARE QUEST</span>
        </h2>
        <button onclick="navigator.clipboard.writeText(window.location.href); this.textContent='COPIED!'; setTimeout(() => this.textContent='> COPY LINK', 2000);" class="w-full px-4 py-3 bg-[#11162a] border-2 border-[#8b7355] text-white hover:border-[#f0c040] hover:text-[#f0c040] text-center text-xs font-bold uppercase tracking-wider cursor-pointer transition-colors shadow-md">
          &gt; COPY LINK
        </button>
      </div>

    </div>
  </div>

  <!-- Bottom Back Button -->
  <div class="text-center mt-12">
    <a href="<?= base_url('/') ?>#quest-log" class="golden-btn inline-block no-underline text-xs" hx-boost="true" hx-target="#main-content" hx-swap="innerHTML transition:true">
      &lt; BACK TO QUEST LOG
    </a>
  </div>
</main>
<?php View::endSection() ?>