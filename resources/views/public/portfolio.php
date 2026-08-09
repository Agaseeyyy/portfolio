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

$allProjects = !empty($validDBProjects) ? array_values($validDBProjects) : $defaultProjects;
$initialLimit = 4;
$extraCount = max(0, count($allProjects) - $initialLimit);

$publicDir = dirname(__DIR__, 3) . '/public/';
?>
<section id="quest-log" class="max-w-7xl mx-auto px-6 py-14">
  <!-- RPG Section Header with Enlarged quest.png Icon -->
  <div class="rpg-header items-center gap-4 mb-8">
    <div class="w-11 h-11 flex-shrink-0 flex items-center justify-center">
      <img src="<?= base_url('icons/quest.webp') ?>" alt="Quest Log" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 2px 6px rgba(240,192,64,0.4))">
    </div>
    <span class="rpg-title-glow text-lg lg:text-xl">QUEST LOG</span>
    <span class="sub-text text-sm">(PROJECTS)</span>
  </div>

  <div id="quest-log-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach ($allProjects as $index => $project): 
      $pName = strtoupper($project['project_name'] ?? 'QUEST');
      $pDesc = $project['description'] ?? $defaultProjects[$index % count($defaultProjects)]['description'];
      $pImg = !empty($project['image']) ? base_url($project['image']) : base_url('images/home-sky.webp');
      $pTech = !empty($project['technologies']) ? $project['technologies'] : $defaultProjects[$index % count($defaultProjects)]['technologies'];
      $isExtra = $index >= $initialLimit;
    ?>
      <a href="<?= base_url('project/' . ($project['project_id'] ?? 1)) ?>" class="quest-card-item no-underline group <?= $isExtra ? 'hidden extra-quest-card' : '' ?>">
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

          <!-- Tech Badges (Icons Only) loaded dynamically from DB -->
          <div class="flex flex-wrap items-center gap-2 mt-auto pt-3 border-t border-[#1d243c]">
            <?php foreach (array_slice($pTech, 0, 5) as $tech): 
              $tName = strtoupper($tech['tech_name'] ?? '');
              $dbIcon = $tech['icon'] ?? '';
              $iconUrl = null;
              if (!empty($dbIcon) && file_exists($publicDir . $dbIcon)) {
                $iconUrl = base_url($dbIcon);
              } else {
                $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $tName));
                if (!empty($cleanName) && file_exists($publicDir . 'icons/' . $cleanName . '.svg')) {
                  $iconUrl = base_url('icons/' . $cleanName . '.svg');
                } elseif (!empty($cleanName) && file_exists($publicDir . 'icons/' . $cleanName . '.webp')) {
                  $iconUrl = base_url('icons/' . $cleanName . '.webp');
                }
              }
            ?>
              <?php if ($iconUrl): ?>
                <div class="w-7 h-7 p-1 bg-[#11162a] border border-[#2b354d] hover:border-[#f0c040] flex items-center justify-center transition-colors shadow-sm cursor-pointer" title="<?= htmlspecialchars($tName) ?>">
                  <img src="<?= $iconUrl ?>" alt="<?= htmlspecialchars($tName) ?>" class="w-full h-full object-contain filter drop-shadow(0 1px 2px rgba(0,0,0,0.5))">
                </div>
              <?php else: ?>
                <span class="quest-tag-badge" title="<?= htmlspecialchars($tName) ?>"><?= htmlspecialchars(substr($tName, 0, 4)) ?></span>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <?php if ($extraCount > 0): ?>
    <!-- 8-Bit Retro Expand/Collapse Quests Button -->
    <div class="flex justify-center mt-10">
      <button id="toggle-more-quests-btn" type="button" onclick="toggleExtraQuests()" class="px-6 py-3.5 bg-[#11162a] border-2 border-[#8b7355] hover:border-[#f0c040] text-[#f0c040] hover:text-white text-xs lg:text-sm font-bold tracking-widest uppercase flex items-center gap-3 transition-colors shadow-lg cursor-pointer">
        <span id="quest-btn-icon" class="text-sm transition-transform duration-200 inline-block">▶</span>
        <span id="quest-btn-text">VIEW MORE QUESTS (+<?= $extraCount ?>)</span>
      </button>
    </div>
  <?php endif; ?>
</section>

<script>
function toggleExtraQuests() {
  const extraCards = document.querySelectorAll('.extra-quest-card');
  const btnText = document.getElementById('quest-btn-text');
  const btnIcon = document.getElementById('quest-btn-icon');
  
  if (!extraCards.length) return;
  
  const isCurrentlyHidden = extraCards[0].classList.contains('hidden');
  
  extraCards.forEach(card => {
    if (isCurrentlyHidden) {
      card.classList.remove('hidden');
    } else {
      card.classList.add('hidden');
    }
  });

  if (isCurrentlyHidden) {
    if (btnText) btnText.innerText = 'SHOW LESS QUESTS';
    if (btnIcon) btnIcon.style.transform = 'rotate(90deg)';
  } else {
    if (btnText) btnText.innerText = 'VIEW MORE QUESTS (+' + extraCards.length + ')';
    if (btnIcon) btnIcon.style.transform = 'rotate(0deg)';
    
    // Scroll back to quest log header smoothly if collapsing
    const questHeader = document.getElementById('quest-log');
    if (questHeader) {
      questHeader.scrollIntoView({ behavior: 'smooth' });
    }
  }
}
</script>