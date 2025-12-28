<?php
/**
 * Services Section Template  
 * Displays offered services with detailed descriptions and features
 * 
 * @var array $services - Services data
 */

// Color themes for each service card
$colorThemes = [
    ['from-blue-400 to-cyan-400', 'bg-blue-400'],
    ['from-purple-400 to-pink-400', 'bg-purple-400'],
    ['from-green-400 to-emerald-400', 'bg-green-400'],
    ['from-orange-400 to-red-400', 'bg-orange-400'],
    ['from-teal-400 to-blue-400', 'bg-teal-400'],
    ['from-yellow-400 to-orange-400', 'bg-yellow-400'],
];
?>
<!-- Services Section: Professional services and capabilities showcase -->
<section id="services" class="px-6 py-20">
  <div class="mx-auto max-w-8xl">
    <!-- Section Header: Services introduction and value proposition -->
    <div class="mb-16 text-center header-animate">
      <h2 class="mb-4 text-3xl font-bold text-white lg:text-4xl">My Services</h2>
      <p class="max-w-3xl mx-auto text-lg text-gray-300">
        Transforming ideas into digital reality with cutting-edge solutions and creative expertise
      </p>
    </div>

    <!-- Services Grid: Dynamic layout of service offerings -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      <?php if (!empty($services)): ?>
        <?php foreach ($services as $index => $service): ?>
          <?php 
            $theme = $colorThemes[$index % count($colorThemes)];
            $gradient = $theme[0];
            $dotColor = $theme[1];
          ?>
          <div class="relative group">
            <div class="relative flex flex-col h-full p-6 overflow-hidden transition-all duration-300 border rounded-lg shadow-lg bg-pink-500/10 border-pink-500/30 hover:bg-pink-500/15 hover:border-pink-500/40 hover:scale-105">
              <!-- Top stroke with gradient -->
              <div class="absolute top-0 left-0 right-0 z-20 h-1 rounded-t-lg bg-gradient-to-r <?= $gradient ?>"></div>
              <div class="relative z-10 flex flex-col h-full">
                <!-- Service Icon -->
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-gradient-to-br <?= str_replace('to-', 'to-', $gradient) ?>/20">
                  <?php if (!empty($service['icon'])): ?>
                  <img src="<?= htmlspecialchars($service['icon']) ?>" alt="<?= htmlspecialchars($service['title'] ?? '') ?>" class="w-6 h-6">
                  <?php endif; ?>
                </div>
                <h3 class="mb-3 text-xl font-semibold text-white"><?= htmlspecialchars($service['title'] ?? '') ?></h3>
                <?php 
                  // Decode the JSON description
                  $descData = json_decode($service['description_json'] ?? '{}', true);
                  $shortInfo = $descData['short_info'] ?? '';
                  $features = $descData['features'] ?? [];
                ?>
                <p class="flex-grow mb-4 text-sm leading-relaxed text-gray-300">
                  <?= htmlspecialchars($shortInfo) ?>
                </p>
                <?php if (!empty($features)): ?>
                <ul class="mt-3 space-y-1 text-xs text-gray-400">
                  <?php foreach ($features as $feature): ?>
                  <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full <?= $dotColor ?>"></span>
                    <?= htmlspecialchars($feature) ?>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- Fallback: Default hardcoded services if no data -->
        <div class="col-span-full text-center py-12">
          <p class="text-gray-400">No services listed yet.</p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Call to Action: Encourage visitors to start a project -->
    <div class="mt-12 text-center button-animate">
      <a href="#contacts" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
        <img src="icons/chat-message.svg" alt="Chat" class="w-4 h-4 transition-transform duration-300 filter brightness-0 invert">
        Start Your Project
      </a>
    </div>
  </div>
</section>