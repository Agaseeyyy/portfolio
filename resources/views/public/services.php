<?php
/**
 * Inventory (Skills) Section - 8-bit RPG Style
 * 2-column skills grid with interactive sequential block bar loading
 * 
 * @var array $techstack - Tech stack data from database
 */

// Exact skills matching mockup image layout
$mockupSkillsCol1 = [
  ['name' => 'JAVASCRIPT', 'level' => 7],
  ['name' => 'REACT', 'level' => 8],
  ['name' => 'TYPESCRIPT', 'level' => 7],
  ['name' => 'NODE.JS', 'level' => 7],
];

$mockupSkillsCol2 = [
  ['name' => 'TAILWIND CSS', 'level' => 8],
  ['name' => 'PYTHON', 'level' => 7],
  ['name' => 'SQL', 'level' => 6],
  ['name' => 'GIT & GITHUB', 'level' => 8],
];

// If DB techstack has items, map them into 2 columns
if (!empty($techstack)) {
  $col1 = [];
  $col2 = [];
  foreach ($techstack as $index => $tech) {
    $item = [
      'name' => strtoupper($tech['tech_name']),
      'level' => max(5, min(9, 9 - intval($index * 0.4)))
    ];
    if ($index % 2 === 0) {
      $col1[] = $item;
    } else {
      $col2[] = $item;
    }
  }
  if (!empty($col1)) $mockupSkillsCol1 = $col1;
  if (!empty($col2)) $mockupSkillsCol2 = $col2;
}
?>
<section id="inventory" class="max-w-7xl mx-auto px-6 py-14">
  <div class="rpg-header">
    <span>🧰</span>
    <span class="rpg-title-glow">INVENTORY</span>
    <span class="sub-text">(SKILLS)</span>
  </div>

  <div class="nes-container is-dark" style="padding: 2.25rem;">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-7">
      
      <!-- Left Column -->
      <div class="flex flex-col gap-6">
        <?php foreach ($mockupSkillsCol1 as $skill): ?>
          <div class="flex items-center justify-between gap-6 stat-row-item">
            <span class="text-white text-xs lg:text-[13px] font-bold tracking-wider uppercase min-w-[160px]">
              <?= htmlspecialchars($skill['name']) ?>
            </span>
            <div class="block-bar">
              <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="block-unit <?= $i < $skill['level'] ? 'filled-skill animate-fill' : '' ?>"></div>
              <?php endfor; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Right Column -->
      <div class="flex flex-col gap-6">
        <?php foreach ($mockupSkillsCol2 as $skill): ?>
          <div class="flex items-center justify-between gap-6 stat-row-item">
            <span class="text-white text-xs lg:text-[13px] font-bold tracking-wider uppercase min-w-[160px]">
              <?= htmlspecialchars($skill['name']) ?>
            </span>
            <div class="block-bar">
              <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="block-unit <?= $i < $skill['level'] ? 'filled-skill animate-fill' : '' ?>"></div>
              <?php endfor; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>