<?php
/**
 * Portfolio Section Template
 * Showcases projects, tech stack, and certifications with tabbed navigation
 * 
 * @var array $projects - Projects data with technologies
 * @var array $techstack - Tech stack data
 * @var array $techCategories - Techstack grouped by category (from controller)
 * @var array $certifications - Certifications data
 */
?>
<!-- Portfolio Section: Main showcase of work and skills -->
<section id="portfolio" class="px-6 py-20">
  <div class="mx-auto max-w-8xl">
    <!-- Section Header: Portfolio introduction and navigation -->
    <div class="mb-16 text-center header-animate">
      <h2 class="mb-4 text-3xl font-bold text-white lg:text-4xl">Portfolio Showcase</h2>
      <p class="max-w-3xl mx-auto text-lg text-gray-300">Explore my projects, technical expertise, and achievements</p>
    </div>

    <!-- Portfolio Navigation Tabs: Switch between different content sections -->
    <div class="flex justify-center mb-12 tab-animate">
      <div class="relative p-1 border rounded-full bg-gray-600/15 border-gray-500/25">
        <button onclick="window.Portfolio.showSection('projects')" id="projects-tab" class="px-6 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full cursor-pointer portfolio-tab portfolio-tab-active">
          Projects
        </button>
        <button onclick="window.Portfolio.showSection('techstack')" id="techstack-tab" class="px-6 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full cursor-pointer portfolio-tab">
          Tech Stack
        </button>
        <button onclick="window.Portfolio.showSection('certifications')" id="certifications-tab" class="px-6 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full cursor-pointer portfolio-tab">
          Certifications
        </button>
      </div>
    </div>

    <!-- Projects Section: Gallery of completed projects -->
    <div id="projects-section" class="portfolio-section portfolio-section-active">
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="projects-grid">
        <?php if (!empty($projects)): ?>
          <?php foreach ($projects as $index => $project): ?>
            <a href="<?= base_url('project/' . $project['project_id']) ?>" class="relative p-6 border shadow-lg simple-hover project-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation group portfolio-card-initial block <?= $index >= 3 ? 'hidden project-item' : '' ?>" data-aos="fade-up" data-aos-delay="<?= ($index % 3 + 1) * 100 ?>">
              <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
              <div class="relative z-10">
                <div class="mb-4">
                  <?php if (!empty($project['image'])): ?>
                  <img src="<?= base_url($project['image']) ?>" alt="<?= htmlspecialchars($project['project_name']) ?>" class="object-cover w-full h-40 rounded-xl">
                  <?php else: ?>
                  <div class="flex items-center justify-center w-full h-40 rounded-xl bg-gray-700/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <?php endif; ?>
                </div>
                <h3 class="mb-3 text-xl font-semibold text-white group-hover:text-pink-300 transition-colors"><?= htmlspecialchars($project['project_name']) ?></h3>
                <p class="mb-4 text-sm leading-relaxed text-gray-300 line-clamp-2"><?= htmlspecialchars($project['description'] ?? '') ?></p>
                <div class="flex flex-wrap gap-2 mb-4">
                  <?php if (!empty($project['technologies'])): ?>
                    <?php foreach (array_slice($project['technologies'], 0, 3) as $tech): ?>
                    <span class="px-3 py-1 text-sm text-pink-300 border rounded-full bg-pink-500/20 border-pink-500/30"><?= htmlspecialchars($tech['tech_name']) ?></span>
                    <?php endforeach; ?>
                    <?php if (count($project['technologies']) > 3): ?>
                    <span class="px-3 py-1 text-sm text-gray-400">+<?= count($project['technologies']) - 3 ?></span>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
                <div class="flex gap-3">
                  <span class="flex-1 px-4 py-3 text-sm text-center text-pink-300 transition-all duration-200 border rounded-xl bg-pink-500/20 border-pink-500/30 group-hover:bg-pink-500/30">
                    View Details
                  </span>
                  <?php if (!empty($project['project_link'])): ?>
                  <span onclick="event.preventDefault(); event.stopPropagation(); window.open('<?= htmlspecialchars($project['project_link']) ?>', '_blank');" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/30 hover:bg-white/20 cursor-pointer">
                    GitHub
                  </span>
                  <?php endif; ?>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-span-full text-center py-12">
            <p class="text-gray-400">No projects yet.</p>
          </div>
        <?php endif; ?>
      </div>

      <?php if (count($projects ?? []) > 3): ?>
      <!-- Show More Button -->
      <div class="mt-12 text-center button-animate">
        <button id="projects-show-more" onclick="window.Portfolio.toggleProjects()" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <img src="icons/arrow-right.svg" alt="Show More" class="w-4 h-4 transition-transform duration-300" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
          Show More Projects
        </button>
      </div>
      <?php endif; ?>
    </div>

    <!-- Tech Stack Section: Display technical skills and proficiencies -->
    <div id="techstack-section" class="hidden portfolio-section">
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($techCategories as $catKey => $category): ?>
          <?php if (!empty($category['items'])): ?>
          <div class="relative p-5 border shadow-xl rounded-xl tech-category bg-gray-600/15 border-gray-500/25">
            <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
            <div class="relative z-10">
              <h3 class="mb-4 text-lg font-semibold text-center text-white"><?= htmlspecialchars($category['label']) ?></h3>
              <div class="space-y-3 overflow-y-auto max-h-60 scrollbar-themed p-3">
                <?php foreach ($category['items'] as $tech): ?>
                <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                  <div class="w-5 h-5">
                    <?php if (!empty($tech['icon'])): ?>
                    <img src="<?= htmlspecialchars($tech['icon']) ?>" alt="<?= htmlspecialchars($tech['tech_name']) ?>" class="w-full h-full">
                    <?php endif; ?>
                  </div>
                  <span class="text-sm font-medium text-white"><?= htmlspecialchars($tech['tech_name']) ?></span>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Certifications Section: Professional certifications and achievements -->
    <div id="certifications-section" class="hidden portfolio-section">
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4" id="certifications-grid">
        <?php if (!empty($certifications)): ?>
          <?php foreach ($certifications as $index => $cert): ?>
          <div class="relative overflow-hidden transition-all duration-300 border rounded-xl group bg-gray-800/50 border-gray-700/50 hover:border-pink-500/50 cert-card <?= $index >= 8 ? 'hidden cert-item' : '' ?>">
            <!-- Image Container -->
            <div class="relative aspect-[4/3] overflow-hidden bg-gray-900/50 cursor-pointer" onclick="viewCertImage('<?= base_url($cert['image'] ?? '') ?>')">
              <?php if (!empty($cert['image'])): ?>
              <img src="<?= base_url($cert['image']) ?>" alt="Certification" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
              <?php else: ?>
              <div class="flex items-center justify-center w-full h-full text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <?php endif; ?>
              
              <!-- Hover Overlay -->
              <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 opacity-0 bg-black/60 group-hover:opacity-100">
                <div class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-pink-500/80 rounded-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                  </svg>
                  View
                </div>
              </div>
            </div>
            
            <!-- Card Footer -->
            <div class="p-3 border-t border-gray-700/50">
              <p class="text-xs text-gray-400">Added: <?= date('M d, Y', strtotime($cert['created_at'] ?? 'now')) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-span-full flex flex-col items-center gap-4 py-12">
            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-pink-500/10">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
              </svg>
            </div>
            <p class="text-gray-400">No certifications yet.</p>
          </div>
        <?php endif; ?>
      </div>

      <?php if (count($certifications ?? []) > 8): ?>
      <!-- Show More Button -->
      <div class="mt-12 text-center button-animate">
        <button id="certifications-show-more" onclick="window.Portfolio.toggleCertifications()" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Show More Certifications
        </button>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Certificate Image Modal -->
  <div id="certImageModal" class="fixed inset-0 z-50 items-center justify-center hidden p-4 bg-black/90" onclick="closeCertModal(event)">
    <button onclick="closeCertModal()" class="absolute text-white top-4 right-4 hover:text-pink-400">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    <img id="certModalImage" src="" alt="Certificate" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl">
  </div>

  <script>
    function viewCertImage(src) {
      if (!src) return;
      document.getElementById('certModalImage').src = src;
      document.getElementById('certImageModal').classList.remove('hidden');
      document.getElementById('certImageModal').classList.add('flex');
      document.body.style.overflow = 'hidden';
    }

    function closeCertModal(event) {
      if (event && event.target !== event.currentTarget) return;
      document.getElementById('certImageModal').classList.add('hidden');
      document.getElementById('certImageModal').classList.remove('flex');
      document.body.style.overflow = '';
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeCertModal();
    });
  </script>
</section>