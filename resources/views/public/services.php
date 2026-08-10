<?php
/**
 * Inventory (Skills) Section - 8-bit RPG Style
 * Features custom category header icons and DB skill proficiency blocks (1-10)
 * 
 * @var array $techstack - Tech stack data from database
 */

use app\models\TechstackModel;

$publicDir = dirname(__DIR__, 3) . '/public/';

// Default categorized data with custom PNG category icons
$defaultCategories = [
  'frontend' => [
    'title' => 'FRONTEND MAGIC',
    'icon_img' => 'icons/frontend.webp',
    'items' => [
      ['name' => 'JAVASCRIPT', 'icon' => 'icons/javascript.svg', 'level' => 8],
      ['name' => 'REACT', 'icon' => 'icons/react.svg', 'level' => 8],
      ['name' => 'TAILWIND CSS', 'icon' => 'icons/tailwind.svg', 'level' => 8],
    ]
  ],
  'backend' => [
    'title' => 'BACKEND ENGINES',
    'icon_img' => 'icons/backend.webp',
    'items' => [
      ['name' => 'PHP', 'icon' => 'icons/php.svg', 'level' => 8],
      ['name' => 'JAVA', 'icon' => 'icons/java.svg', 'level' => 6],
    ]
  ],
  'database' => [
    'title' => 'DATA VAULTS',
    'icon_img' => 'icons/database.webp',
    'items' => [
      ['name' => 'MYSQL', 'icon' => 'icons/mysql.svg', 'level' => 7],
      ['name' => 'SQL', 'icon' => 'icons/database.svg', 'level' => 7],
    ]
  ],
  'tools' => [
    'title' => 'EQUIPMENT & TOOLS',
    'icon_img' => 'icons/inventory.webp',
    'items' => [
      ['name' => 'GIT & GITHUB', 'icon' => 'icons/github.svg', 'level' => 8],
      ['name' => 'VS CODE', 'icon' => 'icons/vscode.svg', 'level' => 9],
      ['name' => 'LINUX', 'icon' => 'icons/linux.svg', 'level' => 7],
      ['name' => 'POSTMAN', 'icon' => 'icons/postman.svg', 'level' => 8],
    ]
  ]
];

$categories = $defaultCategories;

// If DB techstack is provided, organize by DB category & proficiency
if (!empty($techstack)) {
  $groupedDB = [
    'frontend' => ['title' => 'FRONTEND MAGIC', 'icon_img' => 'icons/frontend.webp', 'items' => []],
    'backend' => ['title' => 'BACKEND ENGINES', 'icon_img' => 'icons/backend.webp', 'items' => []],
    'database' => ['title' => 'DATA VAULTS', 'icon_img' => 'icons/database.webp', 'items' => []],
    'tools' => ['title' => 'EQUIPMENT & TOOLS', 'icon_img' => 'icons/inventory.webp', 'items' => []],
  ];

  foreach ($techstack as $index => $tech) {
    $tName = strtoupper($tech['tech_name']);
    $cat = strtolower($tech['category'] ?? 'tools');
    if (!isset($groupedDB[$cat])) $cat = 'tools';

    $dbIcon = $tech['icon'] ?? '';
    $iconPath = '';
    if (!empty($dbIcon) && file_exists($publicDir . $dbIcon)) {
      $iconPath = $dbIcon;
    } else {
      $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $tName));
      if (!empty($cleanName) && file_exists($publicDir . 'icons/' . $cleanName . '.svg')) {
        $iconPath = 'icons/' . $cleanName . '.svg';
      } elseif (!empty($cleanName) && file_exists($publicDir . 'icons/' . $cleanName . '.webp')) {
        $iconPath = 'icons/' . $cleanName . '.webp';
      }
    }

    $prof = isset($tech['proficiency']) && $tech['proficiency'] !== '' ? intval($tech['proficiency']) : max(5, min(9, 9 - intval($index * 0.3)));

    $groupedDB[$cat]['items'][] = [
      'name' => $tName,
      'icon' => $iconPath,
      'level' => max(1, min(10, $prof))
    ];
  }

  // Filter empty categories
  $filtered = array_filter($groupedDB, fn($c) => !empty($c['items']));
  if (!empty($filtered)) {
    $categories = $filtered;
  }
}

// Function to resolve icon URL dynamically
if (!function_exists('resolveSkillIconUrl')) {
  function resolveSkillIconUrl($skill, $publicDir) {
    if (!empty($skill['icon']) && file_exists($publicDir . $skill['icon'])) {
      return base_url($skill['icon']);
    }
    $sName = strtoupper($skill['name'] ?? '');
    $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $sName));
    if (!empty($cleanName) && file_exists($publicDir . 'icons/' . $cleanName . '.svg')) {
      return base_url('icons/' . $cleanName . '.svg');
    } elseif (!empty($cleanName) && file_exists($publicDir . 'icons/' . $cleanName . '.webp')) {
      return base_url('icons/' . $cleanName . '.webp');
    }
    return null;
  }
}
?>
<section id="inventory" class="max-w-7xl mx-auto px-6 py-14">
  <!-- RPG Section Header with Enlarged inventory.png Icon -->
  <div class="rpg-header items-center gap-4 mb-8">
    <div class="w-11 h-11 flex-shrink-0 flex items-center justify-center">
      <img src="<?= base_url('icons/inventory.webp') ?>" alt="Inventory" class="w-full h-full object-contain image-rendering-pixelated filter drop-shadow(0 2px 6px rgba(240,192,64,0.4))">
    </div>
    <span class="rpg-title-glow text-lg lg:text-xl">INVENTORY</span>
    <span class="sub-text text-sm">(SKILLS & EQUIPMENT)</span>
  </div>

  <!-- Categorized 2x2 Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <?php foreach ($categories as $catKey => $catData): ?>
      <div class="nes-container is-dark" style="padding: 1.75rem 2rem;">
        <!-- Category Header with custom PNG icon -->
        <h3 class="text-[#f0c040] text-xs font-bold tracking-widest uppercase mb-6 flex items-center gap-3 border-b-2 border-[#8b7355] pb-3">
          <div class="w-7 h-7 flex-shrink-0 flex items-center justify-center">
            <img src="<?= base_url($catData['icon_img']) ?>" alt="<?= htmlspecialchars($catData['title']) ?>" class="w-full h-full object-contain image-rendering-pixelated">
          </div>
          <span><?= htmlspecialchars($catData['title']) ?></span>
        </h3>

        <!-- Skills List -->
        <div class="flex flex-col gap-5">
          <?php foreach ($catData['items'] as $skill): 
            $iconUrl = resolveSkillIconUrl($skill, $publicDir);
          ?>
            <div class="flex flex-wrap items-center justify-between gap-4 stat-row-item">
              <!-- 8-Bit Icon Frame Badges -->
              <div class="flex items-center gap-3.5 min-w-[160px] group cursor-pointer" title="<?= htmlspecialchars($skill['name']) ?>">
                <div class="w-12 h-12 rpg-pixel-frame flex items-center justify-center bg-[#11162a] text-lg flex-shrink-0 p-2 group-hover:border-[#f0c040] transition-colors shadow-md">
                  <?php if ($iconUrl): ?>
                    <img src="<?= $iconUrl ?>" alt="<?= htmlspecialchars($skill['name']) ?>" class="w-full h-full object-contain filter drop-shadow(0 2px 4px rgba(0,0,0,0.5))">
                  <?php else: ?>
                    <span class="text-white text-[10px] font-bold"><?= substr($skill['name'], 0, 3) ?></span>
                  <?php endif; ?>
                </div>
                <span class="text-white text-[11px] font-bold tracking-wider uppercase group-hover:text-[#f0c040] transition-colors">
                  <?= htmlspecialchars($skill['name']) ?>
                </span>
              </div>

              <!-- Progress Block Bar (1-10 units) -->
              <div class="block-bar">
                <?php for ($i = 0; $i < 10; $i++): ?>
                  <div class="block-unit" data-fill-class="filled-skill" data-target="<?= $i < $skill['level'] ? 'true' : 'false' ?>"></div>
                <?php endfor; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>