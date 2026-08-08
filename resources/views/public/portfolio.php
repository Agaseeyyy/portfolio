<?php
/**
 * Quest Log (Projects) Section - 8-bit RPG Style
 * Loaded directly from Database (ProjectModel::getProjectsWithTech())
 * 
 * @var array $projects - Projects data from database
 */

// Fallback project data matching mockup if DB has no valid projects
$defaultProjects = [
  [
    'project_id' => 1,
    'project_name' => 'PIXEL BLOG',
    'description' => 'A minimal blogging platform for developers.',
    'image' => '',
    'technologies' => [['tech_name' => 'REACT'], ['tech_name' => 'TAILWIND'], ['tech_name' => 'API']]
  ],
  [
    'project_id' => 2,
    'project_name' => 'RETRO SHOP',
    'description' => 'E-commerce store with pixel-perfect UI & UX.',
    'image' => '',
    'technologies' => [['tech_name' => 'NEXT.JS'], ['tech_name' => 'STRIPE'], ['tech_name' => 'TS']]
  ],
  [
    'project_id' => 3,
    'project_name' => 'TASK QUEST',
    'description' => 'Gamified task manager to boost your productivity.',
    'image' => '',
    'technologies' => [['tech_name' => 'REACT'], ['tech_name' => 'FIREBASE'], ['tech_name' => 'CSS']]
  ],
  [
    'project_id' => 4,
    'project_name' => 'ANALYTICS DASH',
    'description' => 'Dashboard for visualizing data with beautiful charts.',
    'image' => '',
    'technologies' => [['tech_name' => 'VITE'], ['tech_name' => 'CHART.JS'], ['tech_name' => 'TS']]
  ]
];

// Filter DB projects to ensure clean, non-empty records are displayed
$validDBProjects = array_filter($projects ?? [], function($p) {
  return !empty($p['project_name']) && !empty($p['description']) && strtolower($p['project_name']) !== 'test';
});

$activeProjects = !empty($validDBProjects) ? array_values(array_slice($validDBProjects, 0, 4)) : $defaultProjects;
?>
<section id="quest-log" class="max-w-7xl mx-auto px-6 py-14">
  <!-- RPG Section Header with Enlarged quest.png Icon -->
  <div class="rpg-header items-center gap-4 mb-8">
    <div class="w-11 h-11 flex-shrink-0 flex items-center justify-center">
      <img src="<?= base_url('icons/quest.png') ?>" alt="Quest Log" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 2px 6px rgba(240,192,64,0.4))">
    </div>
    <span class="rpg-title-glow text-lg lg:text-xl">QUEST LOG</span>
    <span class="sub-text text-sm">(PROJECTS)</span>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach ($activeProjects as $index => $project): 
      $pName = strtoupper($project['project_name'] ?? 'QUEST');
      $pDesc = $project['description'] ?? $defaultProjects[$index % 4]['description'];
      $pImg = !empty($project['image']) ? base_url($project['image']) : base_url('images/home-sky.png');
      $pTech = !empty($project['technologies']) ? $project['technologies'] : $defaultProjects[$index % 4]['technologies'];
    ?>
      <a href="<?= base_url('project/' . ($project['project_id'] ?? 1)) ?>" class="quest-card-item no-underline group">
        <!-- Thumbnail -->
        <div class="relative w-full h-44 bg-[#080b18] overflow-hidden border-b-3 border-[#8b7355]">
          <img src="<?= $pImg ?>" alt="<?= htmlspecialchars($pName) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
        </div>

        <!-- Content loaded from DB -->
        <div class="p-4.5 flex flex-col flex-1 justify-between gap-3">
          <div>
            <!-- Title loaded from DB -->
            <h3 class="text-[#f0c040] text-xs font-bold tracking-wide mb-2.5 flex items-center justify-between group-hover:text-white transition-colors uppercase">
              <span><?= htmlspecialchars($pName) ?></span>
              <span class="quest-select-cursor text-sm flex-shrink-0">▶</span>
            </h3>

            <!-- Description loaded from DB -->
            <p class="text-[#8a8aa8] text-[10px] leading-relaxed line-clamp-3 mb-3 font-normal">
              <?= htmlspecialchars($pDesc) ?>
            </p>
          </div>

          <!-- Tech Badges loaded from DB -->
          <div class="flex flex-wrap gap-2 mt-auto pt-3 border-t border-[#1d243c]">
            <?php foreach (array_slice($pTech, 0, 3) as $tech): ?>
              <span class="quest-tag-badge"><?= htmlspecialchars(strtoupper($tech['tech_name'])) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>