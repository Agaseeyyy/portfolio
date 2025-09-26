<?php
/**
 * Portfolio Section Template
 * Showcases projects, tech stack, and certifications with tabbed navigation
 * Features: Project gallery, technology showcase, certification display
 */
?>
<!-- Portfolio Section: Main showcase of work and skills -->
<section id="portfolio" class="px-6 py-8">
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
        <!-- Project Card: E-commerce Platform -->
        <div class="relative p-6 border shadow-lg simple-hover project-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation group portfolio-card-initial" data-aos="fade-up" data-aos-delay="100">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <div class="mb-4">
              <img src="/placeholder.svg?height=200&width=300" alt="E-commerce Platform" class="object-cover w-full h-40 rounded-xl">
            </div>
            <h3 class="mb-3 text-xl font-semibold text-white">E-commerce Platform</h3>
            <p class="mb-4 text-sm leading-relaxed text-gray-300">Full-stack e-commerce solution with user authentication, payment integration, and admin dashboard.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-3 py-1 text-sm text-pink-300 border rounded-full bg-pink-500/20 border-pink-500/30">PHP</span>
              <span class="px-3 py-1 text-sm text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">Laravel</span>
              <span class="px-3 py-1 text-sm text-yellow-300 border rounded-full bg-yellow-500/20 border-yellow-500/30">JavaScript</span>
            </div>
            <div class="flex gap-3">
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-pink-300 transition-all duration-200 border rounded-xl bg-pink-500/20 border-pink-500/30 hover:bg-pink-500/30">
                View
              </a>
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/30 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Project Card: Task Management System -->
        <div class="relative p-6 border shadow-lg simple-hover project-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation group portfolio-card-initial" data-aos="fade-up" data-aos-delay="200">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <div class="mb-4">
              <img src="/placeholder.svg?height=200&width=300" alt="Task Management App" class="object-cover w-full h-40 rounded-xl">
            </div>
            <h3 class="mb-3 text-xl font-semibold text-white">Task Management System</h3>
            <p class="mb-4 text-sm leading-relaxed text-gray-300">Collaborative task management application with real-time updates and team collaboration features.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-3 py-1 text-sm text-green-300 border rounded-full bg-green-500/20 border-green-500/30">Vue.js</span>
              <span class="px-3 py-1 text-sm text-purple-300 border rounded-full bg-purple-500/20 border-purple-500/30">PHP</span>
              <span class="px-3 py-1 text-sm text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">MySQL</span>
            </div>
            <div class="flex gap-3">
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-pink-300 transition-all duration-200 border rounded-xl bg-pink-500/20 border-pink-500/30 hover:bg-pink-500/30">
                View
              </a>
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/30 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Project Card: Weather Forecast App -->
        <div class="relative p-6 border shadow-lg simple-hover project-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation group portfolio-card-initial" data-aos="fade-up" data-aos-delay="300">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <div class="mb-4">
              <img src="/placeholder.svg?height=200&width=300" alt="Weather App" class="object-cover w-full h-40 rounded-xl">
            </div>
            <h3 class="mb-3 text-xl font-semibold text-white">Weather Forecast App</h3>
            <p class="mb-4 text-sm leading-relaxed text-gray-300">Responsive weather application with location-based forecasts and interactive weather maps.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-3 py-1 text-sm text-yellow-300 border rounded-full bg-yellow-500/20 border-yellow-500/30">JavaScript</span>
              <span class="px-3 py-1 text-sm border rounded-full bg-cyan-500/20 text-cyan-300 border-cyan-500/30">API Integration</span>
              <span class="px-3 py-1 text-sm text-pink-300 border rounded-full bg-pink-500/20 border-pink-500/30">CSS3</span>
            </div>
            <div class="flex gap-3">
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-pink-300 transition-all duration-200 border rounded-xl bg-pink-500/20 border-pink-500/30 hover:bg-pink-500/30">
                View
              </a>
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/30 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Hidden Project Card: Blog Platform (expandable content) -->
        <div class="relative hidden p-6 border shadow-lg project-item simple-hover project-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation group portfolio-card-initial" data-aos="fade-up" data-aos-delay="400">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <div class="mb-4">
              <img src="/placeholder.svg?height=200&width=300" alt="Blog Platform" class="object-cover w-full h-40 rounded-xl">
            </div>
            <h3 class="mb-3 text-xl font-semibold text-white">Blog Platform</h3>
            <p class="mb-4 text-sm leading-relaxed text-gray-300">Multi-user blog platform with rich text editor and comment system.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-3 py-1 text-sm text-purple-300 border rounded-full bg-purple-500/20 border-purple-500/30">PHP</span>
              <span class="px-3 py-1 text-sm text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">MySQL</span>
            </div>
            <div class="flex gap-3">
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-pink-300 transition-all duration-200 border rounded-xl bg-pink-500/20 border-pink-500/30 hover:bg-pink-500/30">
                View
              </a>
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/30 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Hidden Project Card: Portfolio Website (expandable content) -->
        <div class="relative hidden p-6 border shadow-lg project-item simple-hover project-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation group portfolio-card-initial" data-aos="fade-up" data-aos-delay="500">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <div class="mb-4">
              <img src="/placeholder.svg?height=200&width=300" alt="Portfolio Website" class="object-cover w-full h-40 rounded-xl">
            </div>
            <h3 class="mb-3 text-xl font-semibold text-white">Portfolio Website</h3>
            <p class="mb-4 text-sm leading-relaxed text-gray-300">Personal portfolio website with modern design and smooth animations.</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-3 py-1 text-sm text-orange-300 border rounded-full bg-orange-500/20 border-orange-500/30">HTML</span>
              <span class="px-3 py-1 text-sm text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">CSS</span>
              <span class="px-3 py-1 text-sm text-yellow-300 border rounded-full bg-yellow-500/20 border-yellow-500/30">JavaScript</span>
            </div>
            <div class="flex gap-3">
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-pink-300 transition-all duration-200 border rounded-xl bg-pink-500/20 border-pink-500/30 hover:bg-pink-500/30">
                View
              </a>
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/30 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Show More Button: Toggle visibility of additional projects -->
      <div class="mt-12 text-center button-animate">
        <button id="projects-show-more" onclick="window.Portfolio.toggleProjects()" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <img src="../public/images/icons/arrow-right.svg" alt="Show More" class="w-4 h-4 transition-transform duration-300" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
          Show More Projects
        </button>
      </div>
    </div>

    <!-- Tech Stack Section: Display technical skills and proficiencies -->
    <div id="techstack-section" class="hidden portfolio-section">
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <!-- Frontend Technologies: Client-side development skills -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category bg-gray-600/15 border-gray-500/25">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Frontend</h3>
            <div class="space-y-3 overflow-y-auto max-h-60 scrollbar-themed">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-cyan-400">
                  <img src="../public/images/icons/react.svg" alt="React" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(68%) sepia(100%) saturate(1000%) hue-rotate(159deg) brightness(103%) contrast(104%);">
                </div>
                <span class="text-sm font-medium text-white">React</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-cyan-400">
                  <img src="../public/images/icons/tailwind.svg" alt="Tailwind CSS" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Tailwind CSS</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-orange-500">
                  <img src="../public/images/icons/html-tag.svg" alt="HTML5" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">HTML5</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-blue-500">
                  <img src="../public/images/icons/css.svg" alt="CSS3" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">CSS3</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-yellow-400">
                  <img src="../public/images/icons/javascript.svg" alt="JavaScript" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(82%) sepia(62%) saturate(467%) hue-rotate(359deg) brightness(102%) contrast(101%);">
                </div>
                <span class="text-sm font-medium text-white">JavaScript</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-blue-400">
                  <img src="../public/images/icons/react.svg" alt="React Native" class="w-full h-full" style="filter: brightness(0) saturate(100%) invert(62%) sepia(98%) saturate(2618%) hue-rotate(177deg) brightness(99%) contrast(101%);">
                </div>
                <span class="text-sm font-medium text-white">React Native</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Backend Technologies: Server-side development skills -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category bg-gray-600/15 border-gray-500/25">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Backend</h3>
            <div class="space-y-3">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-green-600">
                  <img src="../public/images/icons/spring-boot.svg" alt="Spring Boot" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Spring Boot</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-red-600">
                  <img src="../public/images/icons/java.svg" alt="Java" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Java</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-red-500">
                  <img src="../public/images/icons/laravel.svg" alt="Laravel" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Laravel</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-purple-500">
                  <img src="../public/images/icons/php.svg" alt="PHP" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">PHP</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Database Technologies: Data storage and management skills -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category bg-gray-600/15 border-gray-500/25">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Database</h3>
            <div class="space-y-3">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-blue-600">
                  <img src="../public/images/icons/mysql.svg" alt="MySQL" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">MySQL</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Tools & Others: Development tools and additional technologies -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category bg-gray-600/15 border-gray-500/25">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Tools & Others</h3>
            <div class="space-y-3 overflow-y-auto max-h-60 scrollbar-themed">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-blue-500">
                  <img src="../public/images/icons/vscode.svg" alt="VS Code" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">VS Code</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-orange-600">
                  <img src="../public/images/icons/git.svg" alt="Git" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Git</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-purple-400">
                  <img src="../public/images/icons/figma.svg" alt="Figma" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Figma</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-orange-500">
                  <img src="../public/images/icons/postman.svg" alt="Postman" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Postman</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-yellow-500">
                  <img src="../public/images/icons/linux.svg" alt="Linux" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">Linux</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-gray-700/20 border-gray-600/30">
                <div class="w-5 h-5 text-blue-600">
                  <img src="../public/images/icons/office.svg" alt="MS Office" class="w-full h-full">
                </div>
                <span class="text-sm font-medium text-white">MS Office</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Certifications Section: Professional certifications and achievements -->
    <div id="certifications-section" class="hidden portfolio-section">
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" id="certifications-grid">
        <!-- Certification Card: PHP Web Development -->
        <div class="relative p-6 border shadow-lg simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-pink-500/20 to-rose-600/20 border-pink-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(59%) sepia(83%) saturate(1739%) hue-rotate(233deg) brightness(101%) contrast(97%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">PHP Web Development</h3>
            <p class="mb-3 text-sm text-gray-300">Certified PHP Developer</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: Tech Academy • 2024</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs text-purple-300 border rounded-full bg-purple-500/20 border-purple-500/30">PHP</span>
              <span class="px-2 py-1 text-xs text-red-300 border rounded-full bg-red-500/20 border-red-500/30">Laravel</span>
            </div>
          </div>
        </div>

        <!-- Certification Card: JavaScript Fundamentals -->
        <div class="relative p-6 border shadow-lg simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-blue-500/20 to-cyan-600/20 border-blue-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(59%) sepia(83%) saturate(1739%) hue-rotate(216deg) brightness(101%) contrast(97%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">JavaScript Fundamentals</h3>
            <p class="mb-3 text-sm text-gray-300">Frontend Development Certificate</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: CodeCamp • 2024</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs text-yellow-300 border rounded-full bg-yellow-500/20 border-yellow-500/30">JavaScript</span>
              <span class="px-2 py-1 text-xs text-orange-300 border rounded-full bg-orange-500/20 border-orange-500/30">HTML/CSS</span>
            </div>
          </div>
        </div>

        <!-- Certification Card: Database Management -->
        <div class="relative p-6 border shadow-lg simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-green-500/20 to-emerald-600/20 border-green-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(47%) sepia(91%) saturate(515%) hue-rotate(92deg) brightness(104%) contrast(101%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">Database Management</h3>
            <p class="mb-3 text-sm text-gray-300">MySQL & Database Design</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: DataBase Institute • 2023</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">MySQL</span>
              <span class="px-2 py-1 text-xs text-green-300 border rounded-full bg-green-500/20 border-green-500/30">Database Design</span>
            </div>
          </div>
        </div>

        <!-- Certification Card: Responsive Web Design -->
        <div class="relative p-6 border shadow-lg simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-indigo-500/20 to-purple-600/20 border-indigo-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(30%) sepia(96%) saturate(3151%) hue-rotate(231deg) brightness(99%) contrast(103%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">Responsive Web Design</h3>
            <p class="mb-3 text-sm text-gray-300">Mobile-First Development</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: Design Academy • 2023</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs border rounded-full bg-cyan-500/20 text-cyan-300 border-cyan-500/30">CSS3</span>
              <span class="px-2 py-1 text-xs text-pink-300 border rounded-full bg-pink-500/20 border-pink-500/30">Responsive Design</span>
            </div>
          </div>
        </div>

        <!-- Certification Card: Git Version Control -->
        <div class="relative p-6 border shadow-lg simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-red-500/20 to-pink-600/20 border-red-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">Git Version Control</h3>
            <p class="mb-3 text-sm text-gray-300">Source Code Management</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: DevOps Academy • 2023</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs text-gray-300 border rounded-full bg-gray-500/20 border-gray-500/30">Git</span>
              <span class="px-2 py-1 text-xs text-purple-300 border rounded-full bg-purple-500/20 border-purple-500/30">GitHub</span>
            </div>
          </div>
        </div>

        <!-- Certification Card: React Development -->
        <div class="relative p-6 border shadow-lg simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-orange-500/20 to-amber-600/20 border-orange-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(59%) sepia(69%) saturate(959%) hue-rotate(1deg) brightness(102%) contrast(101%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">React Development</h3>
            <p class="mb-3 text-sm text-gray-300">Modern Frontend Framework</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: React Institute • 2024</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs border rounded-full bg-cyan-500/20 text-cyan-300 border-cyan-500/30">React</span>
              <span class="px-2 py-1 text-xs text-yellow-300 border rounded-full bg-yellow-500/20 border-yellow-500/30">JavaScript</span>
            </div>
          </div>
        </div>

        <!-- Hidden Certification Card: API Development (expandable content) -->
        <div class="relative hidden p-6 border shadow-lg cert-item simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-teal-500/20 to-cyan-600/20 border-teal-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(52%) sepia(50%) saturate(1226%) hue-rotate(141deg) brightness(95%) contrast(89%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">API Development</h3>
            <p class="mb-3 text-sm text-gray-300">RESTful API Design</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: API Academy • 2023</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs text-green-300 border rounded-full bg-green-500/20 border-green-500/30">REST API</span>
              <span class="px-2 py-1 text-xs text-blue-300 border rounded-full bg-blue-500/20 border-blue-500/30">JSON</span>
            </div>
          </div>
        </div>

        <!-- Hidden Certification Card: UI/UX Design (expandable content) -->
        <div class="relative hidden p-6 border shadow-lg cert-item simple-hover cert-card rounded-xl bg-gray-600/15 border-gray-500/25 optimized-animation">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-violet-500/20 to-purple-600/20 border-violet-500/30">
                <img src="../public/images/icons/star.svg" alt="Star" class="w-5 h-5" style="filter: brightness(0) saturate(100%) invert(44%) sepia(96%) saturate(3151%) hue-rotate(260deg) brightness(99%) contrast(103%);">
              </div>
            </div>
            <h3 class="mb-2 text-lg font-semibold text-white">UI/UX Design</h3>
            <p class="mb-3 text-sm text-gray-300">User Experience Design</p>
            <p class="mb-4 text-xs text-gray-400">Issued by: Design Institute • 2022</p>
            <div class="flex justify-center gap-2">
              <span class="px-2 py-1 text-xs text-purple-300 border rounded-full bg-purple-500/20 border-purple-500/30">Figma</span>
              <span class="px-2 py-1 text-xs text-pink-300 border rounded-full bg-pink-500/20 border-pink-500/30">UI Design</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Show More Button: Toggle visibility of additional certifications -->
      <div class="mt-12 text-center button-animate">
        <button id="certifications-show-more" onclick="window.Portfolio.toggleCertifications()" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <img src="../public/images/icons/plus.svg" alt="Plus" class="w-4 h-4 transition-transform duration-300 filter brightness-0 invert">
          Show More Certifications
        </button>
      </div>
    </div>
  </div>
</section>