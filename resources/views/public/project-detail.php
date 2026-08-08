<?php
/**
 * Project Detail Page - 8-bit RPG Style
 * Full project information with retro NES styling
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
<style>
@media (max-width: 768px) {
  main > div[style*='grid-template-columns'] {
    grid-template-columns: 1fr !important;
  }
}
</style>
<main style="min-height:100vh;padding:6rem 1rem 3rem;max-width:900px;margin:0 auto;">
  
  <!-- Back Button -->
  <a href="<?= base_url('/') ?>#quest-log" style="display:inline-flex;align-items:center;gap:8px;padding:8px 16px;background:#16213e;border:2px solid #8b7355;color:#e0e0e0;text-decoration:none;font-size:8px;font-family:'Press Start 2P',cursive;margin-bottom:1.5rem;transition:all 0.2s;" onmouseover="this.style.borderColor='#f0c040';this.style.color='#f0c040'" onmouseout="this.style.borderColor='#8b7355';this.style.color='#e0e0e0'">
    &lt; BACK TO QUEST LOG
  </a>

  <!-- Project Hero Image -->
  <div class="project-detail-hero" style="margin-bottom:1.5rem;">
    <?php if (!empty($project['image'])): ?>
      <img src="<?= base_url($project['image']) ?>" alt="<?= htmlspecialchars($project['project_name'] ?? '') ?>">
    <?php else: ?>
      <div style="height:250px;display:flex;align-items:center;justify-content:center;background:#1e2a4a;color:#8888aa;font-size:24px;">&#127918;</div>
    <?php endif; ?>
  </div>

  <!-- Project Title & Meta -->
  <div class="project-detail-card">
    <h1 style="font-size:14px;color:#f0c040;margin-bottom:1rem;"><?= htmlspecialchars($project['project_name'] ?? '') ?></h1>
    <div style="display:flex;flex-wrap:wrap;gap:8px;">
      <?php if (!empty($project['role'])): ?>
        <span class="quest-tag" style="font-size:7px;">&#128100; <?= htmlspecialchars($project['role']) ?></span>
      <?php endif; ?>
      <?php if ($duration): ?>
        <span class="quest-tag" style="font-size:7px;">&#9201; <?= $duration ?></span>
      <?php endif; ?>
      <?php if ($dateRange): ?>
        <span class="quest-tag" style="font-size:7px;">&#128197; <?= $dateRange ?></span>
      <?php endif; ?>
    </div>
  </div>

  <div style="display:grid;grid-template-columns:2fr 1fr;gap:1.5rem;">
    <!-- Main Content -->
    <div>
      <!-- Description -->
      <div class="project-detail-card">
        <h2>&#128220; QUEST DETAILS</h2>
        <p><?= nl2br(htmlspecialchars($project['description'] ?? '')) ?></p>
        <?php if (!empty($project['long_description'])): ?>
          <p style="margin-top:1rem;"><?= nl2br(htmlspecialchars($project['long_description'])) ?></p>
        <?php endif; ?>
      </div>

      <!-- Key Features -->
      <?php if (!empty($project['key_features'])): ?>
      <div class="project-detail-card">
        <h2>&#9889; KEY FEATURES</h2>
        <ul>
          <?php foreach ($project['key_features'] as $feature): ?>
            <li><?= htmlspecialchars($feature) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <!-- Challenges -->
      <?php if (!empty($project['challenges'])): ?>
      <div class="project-detail-card">
        <h2>&#9876; CHALLENGES</h2>
        <ul>
          <?php foreach ($project['challenges'] as $challenge): ?>
            <li><?= htmlspecialchars($challenge) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <div>
      <!-- Technologies -->
      <?php if (!empty($project['technologies'])): ?>
      <div class="project-detail-card">
        <h2>&#128736; TECH USED</h2>
        <div style="display:flex;flex-wrap:wrap;gap:6px;">
          <?php foreach ($project['technologies'] as $tech): ?>
            <span class="project-tech-tag">
              <?php if (!empty($tech['icon'])): ?>
                <img src="<?= base_url($tech['icon']) ?>" alt="" style="width:14px;height:14px;">
              <?php endif; ?>
              <?= htmlspecialchars($tech['tech_name']) ?>
            </span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- Action Buttons -->
      <div class="project-detail-card">
        <h2>&#128279; LINKS</h2>
        <?php if (!empty($project['preview_link'])): ?>
          <a href="<?= htmlspecialchars($project['preview_link']) ?>" target="_blank" class="retro-link-btn primary">
            &#128065; LIVE PREVIEW
          </a>
        <?php endif; ?>
        <?php if (!empty($project['project_link'])): ?>
          <a href="<?= htmlspecialchars($project['project_link']) ?>" target="_blank" class="retro-link-btn">
            &#128187; VIEW ON GITHUB
          </a>
        <?php endif; ?>
        <?php if (empty($project['preview_link']) && empty($project['project_link'])): ?>
          <p style="text-align:center;font-size:8px;color:#8888aa;">No links available</p>
        <?php endif; ?>
      </div>

      <!-- Share -->
      <div class="project-detail-card">
        <h2>&#128228; SHARE</h2>
        <button onclick="navigator.clipboard.writeText(window.location.href); this.textContent='COPIED!'; setTimeout(() => this.textContent='> COPY LINK', 2000);" class="retro-link-btn" style="width:100%;cursor:pointer;font-family:'Press Start 2P',cursive;">
          &gt; COPY LINK
        </button>
      </div>
    </div>
  </div>

  <!-- Bottom Back Button -->
  <div style="text-align:center;margin-top:2rem;">
    <a href="<?= base_url('/') ?>#quest-log" class="golden-dialog cta-btn" style="display:inline-block;text-decoration:none;">
      &lt; BACK TO QUEST LOG
    </a>
  </div>
</main>
<?php View::endSection() ?>