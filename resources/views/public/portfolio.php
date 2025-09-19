<!-- Portfolio Section -->
<section id="portfolio" class="px-6 py-20 lg:px-8 xl:px-12">
  <div class="mx-auto max-w-8xl">
    <!-- Section Header -->
    <div class="mb-16 text-center header-animate">
      <h2 class="mb-4 text-3xl font-bold text-white lg:text-4xl">Portfolio Showcase</h2>
      <p class="max-w-3xl mx-auto text-lg text-gray-300">Explore my projects, technical expertise, and achievements</p>
    </div>

    <!-- Portfolio Navigation Tabs -->
    <div class="flex justify-center mb-12 tab-animate">
      <div class="relative p-1 border rounded-full backdrop-blur-md bg-white/10 border-white/20">
        <button onclick="window.Portfolio.showSection('projects')" id="projects-tab" class="cursor-pointer px-6 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full portfolio-tab portfolio-tab-active">
          Projects
        </button>
        <button onclick="window.Portfolio.showSection('techstack')" id="techstack-tab" class="cursor-pointer px-6 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full portfolio-tab">
          Tech Stack
        </button>
        <button onclick="window.Portfolio.showSection('certifications')" id="certifications-tab" class="cursor-pointer px-6 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full portfolio-tab">
          Certifications
        </button>
      </div>
    </div>

    <!-- Projects Section -->
    <div id="projects-section" class="portfolio-section portfolio-section-active">
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="projects-grid">
        <!-- Project 1 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl project-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl group portfolio-card-initial" data-aos="fade-up" data-aos-delay="100">
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
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/20 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Project 2 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl project-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl group portfolio-card-initial" data-aos="fade-up" data-aos-delay="200">
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
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/20 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Project 3 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl project-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl group portfolio-card-initial" data-aos="fade-up" data-aos-delay="300">
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
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/20 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Hidden Project 4 -->
        <div class="hidden project-item relative p-6 transition-all duration-300 border shadow-xl project-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl group portfolio-card-initial" data-aos="fade-up" data-aos-delay="400">
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
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/20 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Hidden Project 5 -->
        <div class="hidden project-item relative p-6 transition-all duration-300 border shadow-xl project-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl group portfolio-card-initial" data-aos="fade-up" data-aos-delay="500">
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
              <a href="#" class="flex-1 px-4 py-3 text-sm text-center text-white transition-all duration-200 border rounded-xl bg-white/10 border-white/20 hover:bg-white/20">
                GitHub
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Show More Button for Projects -->
      <div class="mt-12 text-center button-animate">
        <button id="projects-show-more" onclick="window.Portfolio.toggleProjects()" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/20 backdrop-blur-sm hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          Show More Projects
        </button>
      </div>
    </div>

    <!-- Tech Stack Section -->
    <div id="techstack-section" class="hidden portfolio-section">
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <!-- Frontend Technologies -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category backdrop-blur-md bg-white/10 border-white/20">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Frontend</h3>
            <div class="space-y-3 overflow-y-auto max-h-60 scrollbar-themed">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-cyan-400">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.41 0-.783.093-1.106.278-1.375.793-1.683 3.264-.973 6.365C1.98 8.917 0 10.42 0 12.004c0 1.59 1.99 3.097 5.043 4.03-.704 3.113-.39 5.588.988 6.38.32.187.69.275 1.102.275 1.345 0 3.107-.96 4.888-2.624 1.78 1.654 3.542 2.603 4.887 2.603.41 0 .783-.09 1.106-.275 1.374-.792 1.683-3.263.973-6.365C22.02 15.096 24 13.59 24 12.004c0-1.59-1.99-3.097-5.043-4.032.704-3.11.39-5.587-.988-6.38-.318-.184-.688-.277-1.092-.278zm-.005 1.09v.006c.225 0 .406.044.558.127.666.382.955 1.835.73 3.704-.054.46-.142.945-.25 1.44-.96-.236-2.006-.417-3.107-.534-.66-.905-1.345-1.727-2.035-2.447 1.592-1.48 3.087-2.292 4.105-2.295zm-9.77.02c1.012 0 2.514.808 4.11 2.28-.686.72-1.37 1.537-2.02 2.442-1.107.117-2.154.298-3.113.538-.112-.49-.195-.964-.254-1.42-.23-1.868.054-3.32.714-3.707.19-.09.4-.127.563-.132zm4.882 3.05c.455.468.91.992 1.36 1.564-.44-.02-.89-.034-1.36-.034-.46 0-.915.01-1.36.034.44-.572.895-1.096 1.36-1.564zM12 8.1c.74 0 1.477.034 2.202.093.406.582.802 1.203 1.183 1.86.372.64.71 1.29 1.018 1.946-.308.655-.646 1.31-1.013 1.95-.38.66-.773 1.288-1.18 1.87-.728.063-1.466.098-2.21.098-.74 0-1.477-.035-2.202-.093-.406-.582-.802-1.204-1.183-1.86-.372-.64-.71-1.29-1.018-1.946.303-.657.646-1.313 1.013-1.954.38-.66.773-1.286 1.18-1.868.728-.064 1.466-.098 2.21-.098zm-3.635.254c-.24.377-.48.763-.704 1.16-.225.39-.435.782-.635 1.174-.265-.656-.49-1.31-.676-1.947.64-.15 1.315-.283 2.015-.386zm7.26 0c.695.103 1.365.23 2.006.387-.18.632-.405 1.282-.66 1.933-.2-.39-.41-.783-.64-1.174-.225-.392-.465-.774-.705-1.146zm3.063.675c.484.15.944.317 1.375.498 1.732.74 2.852 1.708 2.852 2.476-.005.768-1.125 1.74-2.857 2.475-.42.18-.88.342-1.355.493-.28-.958-.646-1.956-1.1-2.98.45-1.017.81-2.01 1.085-2.964zm-13.395.004c.278.96.645 1.957 1.1 2.98-.45 1.017-.812 2.01-1.086 2.964-.484-.15-.944-.318-1.37-.5-1.732-.737-2.852-1.706-2.852-2.474 0-.768 1.12-1.742 2.852-2.476.42-.18.88-.342 1.356-.494zm11.678 4.28c.265.657.49 1.312.676 1.948-.64.157-1.316.29-2.016.39.24-.375.48-.762.705-1.158.225-.39.435-.788.636-1.18zm-9.945.02c.2.392.41.783.64 1.175.23.39.465.772.705 1.143-.695-.102-1.365-.23-2.006-.386.18-.63.406-1.282.66-1.933zM17.92 16.32c.112.493.2.968.254 1.423.23 1.868-.054 3.32-.714 3.708-.147.09-.338.128-.563.128-1.012 0-2.514-.807-4.11-2.28.686-.72 1.37-1.536 2.02-2.44 1.107-.118 2.154-.3 3.113-.54zm-11.83.01c.96.234 2.006.415 3.107.532.66.905 1.345 1.727 2.035 2.446-1.595 1.483-3.092 2.295-4.11 2.295-.22-.005-.406-.05-.553-.132-.666-.38-.955-1.834-.73-3.703.054-.46.142-.944.25-1.438zm4.56.64c.44.02.89.034 1.36.034.47 0 .915-.01 1.36-.034-.44.572-.895 1.095-1.36 1.56-.465-.467-.92-.990-1.36-1.56z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">React</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-cyan-400">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Tailwind CSS</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-orange-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm7.031 9.75l-.232-2.718 10.059.003.23-2.622L5.412 4.41l.698 8.01h9.126l-.326 3.426-2.91.804-2.955-.81-.188-2.11H6.248l.33 4.171L12 19.351l5.379-1.443.744-8.157H8.531z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">HTML5</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-blue-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm17.09 4.413L5.41 4.41l.213 2.622 10.125.002-.255 2.716h-6.64l.24 2.573h6.182l-.366 3.523-2.91.804-2.956-.81-.188-2.11h-2.61l.29 3.855L12 19.288l5.373-1.53L18.59 4.414z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">CSS3</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-yellow-400">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0V0zm22.034 18.276c-.175-1.095-.888-2.015-3.003-2.873-.736-.345-1.554-.585-1.797-1.14-.091-.33-.105-.51-.046-.705.15-.646.915-.84 1.515-.66.39.12.75.42.976.9 1.034-.676 1.034-.676 1.755-1.125-.27-.42-.404-.601-.586-.78-.63-.705-1.469-1.065-2.834-1.034l-.705.089c-.676.165-1.32.525-1.71 1.005-1.14 1.291-.811 3.541.569 4.471 1.365 1.02 3.361 1.244 3.616 2.205.24 1.17-.87 1.545-1.966 1.41-.811-.18-1.26-.586-1.755-1.336l-1.83 1.051c.21.48.45.689.81 1.109 1.74 1.756 6.09 1.666 6.871-1.004.029-.09.24-.705.074-1.65l.046.067zm-8.983-7.245h-2.248c0 1.938-.009 3.864-.009 5.805 0 1.232.063 2.363-.138 2.711-.33.689-1.18.601-1.566.48-.396-.196-.597-.466-.83-.855-.063-.105-.11-.196-.127-.196l-1.825 1.125c.305.63.75 1.172 1.324 1.517.855.51 2.004.675 3.207.405.783-.226 1.458-.691 1.811-1.411.51-.93.402-2.07.397-3.346.012-2.054 0-4.109 0-6.179l.004-.056z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">JavaScript</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-blue-400">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.41 0-.783.093-1.106.278-1.375.793-1.683 3.264-.973 6.365C1.98 8.917 0 10.42 0 12.004c0 1.59 1.99 3.097 5.043 4.03-.704 3.113-.39 5.588.988 6.38.32.187.69.275 1.102.275 1.345 0 3.107-.96 4.888-2.624 1.78 1.654 3.542 2.603 4.887 2.603.41 0 .783-.09 1.106-.275 1.374-.792 1.683-3.263.973-6.365C22.02 15.096 24 13.59 24 12.004c0-1.59-1.99-3.097-5.043-4.032.704-3.11.39-5.587-.988-6.38-.318-.184-.688-.277-1.092-.278zm-.005 1.09v.006c.225 0 .406.044.558.127.666.382.955 1.835.73 3.704-.054.46-.142.945-.25 1.44-.96-.236-2.006-.417-3.107-.534-.66-.905-1.345-1.727-2.035-2.447 1.592-1.48 3.087-2.292 4.105-2.295zm-9.77.02c1.012 0 2.514.808 4.11 2.28-.686.72-1.37 1.537-2.02 2.442-1.107.117-2.154.298-3.113.538-.112-.49-.195-.964-.254-1.42-.23-1.868.054-3.32.714-3.707.19-.09.4-.127.563-.132zm4.882 3.05c.455.468.91.992 1.36 1.564-.44-.02-.89-.034-1.36-.034-.46 0-.915.01-1.36.034.44-.572.895-1.096 1.36-1.564zM12 8.1c.74 0 1.477.034 2.202.093.406.582.802 1.203 1.183 1.86.372.64.71 1.29 1.018 1.946-.308.655-.646 1.31-1.013 1.95-.38.66-.773 1.288-1.18 1.87-.728.063-1.466.098-2.21.098-.74 0-1.477-.035-2.202-.093-.406-.582-.802-1.204-1.183-1.86-.372-.64-.71-1.29-1.018-1.946.303-.657.646-1.313 1.013-1.954.38-.66.773-1.286 1.18-1.868.728-.064 1.466-.098 2.21-.098zm-3.635.254c-.24.377-.48.763-.704 1.16-.225.39-.435.782-.635 1.174-.265-.656-.49-1.31-.676-1.947.64-.15 1.315-.283 2.015-.386zm7.26 0c.695.103 1.365.23 2.006.387-.18.632-.405 1.282-.66 1.933-.2-.39-.41-.783-.64-1.174-.225-.392-.465-.774-.705-1.146zm3.063.675c.484.15.944.317 1.375.498 1.732.74 2.852 1.708 2.852 2.476-.005.768-1.125 1.74-2.857 2.475-.42.18-.88.342-1.355.493-.28-.958-.646-1.956-1.1-2.98.45-1.017.81-2.01 1.085-2.964zm-13.395.004c.278.96.645 1.957 1.1 2.98-.45 1.017-.812 2.01-1.086 2.964-.484-.15-.944-.318-1.37-.5-1.732-.737-2.852-1.706-2.852-2.474 0-.768 1.12-1.742 2.852-2.476.42-.18.88-.342 1.356-.494zm11.678 4.28c.265.657.49 1.312.676 1.948-.64.157-1.316.29-2.016.39.24-.375.48-.762.705-1.158.225-.39.435-.788.636-1.18zm-9.945.02c.2.392.41.783.64 1.175.23.39.465.772.705 1.143-.695-.102-1.365-.23-2.006-.386.18-.63.406-1.282.66-1.933zM17.92 16.32c.112.493.2.968.254 1.423.23 1.868-.054 3.32-.714 3.708-.147.09-.338.128-.563.128-1.012 0-2.514-.807-4.11-2.28.686-.72 1.37-1.536 2.02-2.44 1.107-.118 2.154-.3 3.113-.54zm-11.83.01c.96.234 2.006.415 3.107.532.66.905 1.345 1.727 2.035 2.446-1.595 1.483-3.092 2.295-4.11 2.295-.22-.005-.406-.05-.553-.132-.666-.38-.955-1.834-.73-3.703.054-.46.142-.944.25-1.438zm4.56.64c.44.02.89.034 1.36.034.47 0 .915-.01 1.36-.034-.44.572-.895 1.095-1.36 1.56-.465-.467-.92-.990-1.36-1.56z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">React Native</span>
              </div>
            </div>
          </div>
        </div>

         <!-- Backend Technologies -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category backdrop-blur-md bg-white/10 border-white/20">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Backend</h3>
            <div class="space-y-3">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-green-600">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.205 16.392c-2.469 3.289-7.741 2.179-11.122 2.338 0 0-.599.034-1.201.133 0 0 .228-.097.519-.198 2.374-.821 3.496-.984 4.939-1.727 2.71-1.388 5.408-4.413 5.957-7.555-1.032 3.022-4.17 5.623-7.027 6.679-1.955.722-5.492 1.424-5.493 1.424a5.28 5.28 0 0 1-.143-.076c-2.405-1.17-2.475-6.38 1.894-8.059 1.916-.736 3.747-.332 5.818-.825 2.208-.525 4.766-2.18 5.805-4.344 1.165 3.458 2.565 8.866.054 12.21zm.042-13.28a9.212 9.212 0 0 1-1.065 1.89 9.982 9.982 0 0 0-7.167-3.031C6.492 1.971 2 6.463 2 11.985a9.983 9.983 0 0 0 3.205 7.334l.22.194a10.001 10.001 0 1 1 14.822-16.401z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Spring Boot</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-red-600">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.851 18.56s-.917.534.653.714c1.902.218 2.874.187 4.969-.211 0 0 .552.346 1.321.646-4.699 2.013-10.633-.118-6.943-1.149M8.276 15.933s-1.028.761.542.924c2.032.209 3.636.227 6.413-.308 0 0 .384.389.987.602-5.679 1.661-12.007.13-7.942-1.218M13.116 11.475c1.158 1.333-.304 2.533-.304 2.533s2.939-1.518 1.589-3.418c-1.261-1.772-2.228-2.652 3.007-5.688 0-.001-8.216 2.051-4.292 6.573M19.33 20.504s.679.559-.747.991c-2.712.822-11.288 1.069-13.669.033-.856-.373.75-.89 1.254-.998.527-.114.828-.093.828-.093-.953-.671-6.156 1.317-2.643 1.887 9.58 1.553 17.462-.7 14.977-1.82M9.292 13.21s-4.362 1.036-1.544 1.412c1.189.159 3.561.123 5.77-.062 1.806-.152 3.618-.477 3.618-.477s-.637.272-1.098.587c-4.429 1.165-12.986.623-10.522-.568 2.082-1.006 3.776-.892 3.776-.892M17.116 17.584c4.503-2.34 2.421-4.589.968-4.285-.355.074-.515.138-.515.138s.132-.207.385-.297c2.875-1.011 5.086 2.981-.928 4.562 0-.001.07-.062.09-.118M14.401 0s2.494 2.494-2.365 6.33c-3.896 3.077-.888 4.832-.001 6.836-2.274-2.053-3.943-3.858-2.824-5.539 1.644-2.469 6.197-3.665 5.19-7.627M9.734 23.924c4.322.277 10.959-.153 11.116-2.198 0 0-.302.775-3.572 1.391-3.688.694-8.239.613-10.937.168 0-.001.553.457 3.393.639"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Java</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-red-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.017c-.008.002-.016.002-.024.002-.008 0-.016 0-.024-.002a.316.316 0 01-.066-.017L.726 18.755a.378.378 0 01-.188-.326V9.584c0-.019.002-.038.005-.056a.355.355 0 01.06-.2c.003-.005.003-.01.007-.014a.344.344 0 01.124-.107L5.044 6.767V2.201a.378.378 0 01.188-.326L14.263.681a.318.318 0 01.32 0l9.031 5.194a.382.382 0 01.028.055zm-6.928 4.891l-4.54-2.637L7.646 10.3l4.54 2.638 4.528-2.618zM1.262 10.142v8.001l8.24 4.738v-8.001l-8.24-4.738zm17.007 0v4.26l4.323-2.49V9.854l-4.323 2.288z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Laravel</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-purple-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7.01 10.207h-.944l-.515 2.648h.838c.556 0 .982-.122 1.292-.391.313-.27.47-.638.47-1.103 0-.247-.04-.431-.117-.551-.078-.12-.196-.2-.353-.235-.157-.035-.397-.052-.72-.052v-.316zm.427 5.023c.353 0 .63-.080.83-.241.2-.161.3-.435.3-.82 0-.329-.062-.576-.185-.742-.123-.166-.295-.249-.516-.249-.221 0-.405.083-.552.249-.147.166-.22.413-.22.742 0 .385.1.659.3.82.2.161.477.241.83.241h.213zm2.872-9.746h-2.35c-.866 0-1.566.2-2.1.6-.533.4-.8.95-.8 1.65 0 .35.117.663.35.938.233.275.55.456.95.544v.031c-.467.075-.85.244-1.15.506-.3.262-.45.6-.45 1.012 0 .7.283 1.263.85 1.688.567.425 1.283.637 2.15.637h2.35c.133 0 .25-.117.25-.25v-6.506c0-.133-.117-.25-.25-.25z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">PHP</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Database Technologies -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category backdrop-blur-md bg-white/10 border-white/20">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Database</h3>
            <div class="space-y-3">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-blue-600">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3C16.97 3 21 4.43 21 6.5S16.97 10 12 10 3 8.57 3 6.5 7.03 3 12 3M21 9.5C21 11.57 16.97 13 12 13S3 11.57 3 9.5V12.5C3 14.57 7.03 16 12 16S21 14.57 21 12.5V9.5M21 14.5C21 16.57 16.97 18 12 18S3 16.57 3 14.5V17.5C3 19.57 7.03 21 12 21S21 19.57 21 17.5V14.5Z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">MySQL</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Tools & Others -->
        <div class="relative p-6 border shadow-xl rounded-xl tech-category backdrop-blur-md bg-white/10 border-white/20">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-4 text-lg font-semibold text-center text-white">Tools & Others</h3>
            <div class="space-y-3 overflow-y-auto max-h-60 scrollbar-themed">
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-blue-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.15 2.587L18.21.21a1.494 1.494 0 0 0-1.705.29l-9.46 8.63-4.12-3.128a.999.999 0 0 0-1.276.057L.327 7.261A1 1 0 0 0 .326 8.74L3.899 12 .326 15.26a1 1 0 0 0 .001 1.479L1.65 17.94a.999.999 0 0 0 1.276.057l4.12-3.128 9.46 8.63a1.492 1.492 0 0 0 1.704.29l4.942-2.377A1.5 1.5 0 0 0 24 20.06V3.939a1.5 1.5 0 0 0-.85-1.352z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">VS Code</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-orange-600">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Git</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-purple-400">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M15.852 8.981h-4.588V0h4.588c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.491-4.49 4.491zM12.735 7.51h3.117c1.665 0 3.019-1.355 3.019-3.019s-1.354-3.019-3.019-3.019h-3.117V7.51zm0 1.471H8.148c-2.476 0-4.49-2.015-4.49-4.491S5.672 0 8.148 0h4.588v8.981zm-4.587-7.51c-1.665 0-3.019 1.355-3.019 3.019s1.354 3.019 3.019 3.019h3.117V1.471H8.148zm4.587 15.019H8.148c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49h4.588v8.98zM8.148 8.981c-1.665 0-3.019 1.355-3.019 3.019s1.355 3.019 3.019 3.019h3.117v-6.038H8.148zm7.704 0c2.476 0 4.49 2.015 4.49 4.49s-2.014 4.49-4.49 4.49s-4.49-2.015-4.49-4.49s2.014-4.49 4.49-4.49zm0 1.471c-1.665 0-3.019 1.355-3.019 3.019s1.355 3.019 3.019 3.019s3.019-1.355 3.019-3.019s-1.354-3.019-3.019-3.019z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Figma</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-orange-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.527.099C6.955-.744.942 3.9.099 10.473c-.843 6.572 3.8 12.584 10.373 13.428 6.573.843 12.587-3.801 13.428-10.374C24.744 6.955 20.101.943 13.527.099zm2.471 7.485a.855.855 0 0 0-.593.25l-4.453 4.453-.307-.307-.643-.643c4.389-4.376 5.18-4.418 5.996-3.753zm-4.863 4.861l4.44-4.44a.62.62 0 1 1 .847.903l-4.699 4.125-.588-.588zm.33.694l-1.1.238a.06.06 0 0 1-.067-.032.06.06 0 0 1 .01-.073l.645-.645.512.512zm-2.803-.459l1.172-1.172.879.879-1.916.426a.074.074 0 0 1-.08-.039.072.072 0 0 1 .013-.094l-.068.000zm3.803-6.06a.855.855 0 0 0 .593-.25l4.453-4.453.307.307.643.643C17.619.839 16.828.797 16.012 1.462l.453-.302z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Postman</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-yellow-500">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.504 0c-.155 0-.315.008-.48.021-4.226.333-3.105 4.807-3.17 6.298-.076 1.092-.3 1.953-1.05 3.02-.885 1.051-2.127 2.75-2.716 4.521-.278.832-.41 1.684-.287 2.489a.424.424 0 00-.11.135c-.26.268-.45.6-.663.839-.199.199-.485.267-.797.4-.313.136-.658.269-.864.68-.09.189-.136.394-.132.602 0 .199.027.4.055.536.058.399.116.8.319 1.169.394.718 1.204 1.169 1.948 1.169.238 0 .489-.058.695-.222.206-.164.31-.406.335-.663.025-.223-.054-.42-.335-.663a.671.671 0 00-.748-.098c-.084.037-.157.08-.218.134.025-.216.122-.31.335-.4.109-.045.251-.1.335-.134.109-.045.335-.134.664-.134.329 0 .621.134.687.4.025.199-.039.4-.335.4-.199 0-.4-.066-.536-.134-.109-.054-.199-.134-.335-.134-.109 0-.199.066-.267.134-.054.054-.109.134-.109.267 0 .199.109.4.335.4.329 0 .664-.199.864-.4.199-.199.335-.536.335-.864 0-.329-.136-.664-.335-.864-.199-.199-.536-.335-.864-.335-.329 0-.664.136-.864.335-.199.199-.335.536-.335.864z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">Linux</span>
              </div>
              <div class="flex items-center gap-3 p-3 border rounded-lg tech-item bg-white/5 border-white/10">
                <div class="w-5 h-5 text-blue-600">
                  <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M0 0v11.408h11.408V0H0zm1.902 1.902h7.604v7.604H1.902V1.902zM0 12.592V24h11.408V12.592H0zm1.902 1.902h7.604v7.604H1.902v-7.604zM12.592 0v11.408H24V0H12.592zm1.902 1.902h7.604v7.604h-7.604V1.902zM12.592 12.592V24H24V12.592H12.592zm1.902 1.902h7.604v7.604h-7.604v-7.604z"/>
                  </svg>
                </div>
                <span class="text-sm font-medium text-white">MS Office</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Certifications Section -->
    <div id="certifications-section" class="hidden portfolio-section">
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3" id="certifications-grid">
        <!-- Certification 1 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-pink-500/20 to-rose-600/20 border-pink-500/30">
                <svg class="w-5 h-5 text-pink-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Certification 2 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-blue-500/20 to-cyan-600/20 border-blue-500/30">
                <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Certification 3 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-green-500/20 to-emerald-600/20 border-green-500/30">
                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Certification 4 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-indigo-500/20 to-purple-600/20 border-indigo-500/30">
                <svg class="w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Certification 5 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-red-500/20 to-pink-600/20 border-red-500/30">
                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Certification 6 -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-orange-500/20 to-amber-600/20 border-orange-500/30">
                <svg class="w-5 h-5 text-orange-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Hidden Certification 7 -->
        <div class="hidden cert-item relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-teal-500/20 to-cyan-600/20 border-teal-500/30">
                <svg class="w-5 h-5 text-teal-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

        <!-- Hidden Certification 8 -->
        <div class="hidden cert-item relative p-6 transition-all duration-300 border shadow-xl cert-card rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/15 hover:scale-[1.02] hover:shadow-2xl">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10 text-center">
            <div class="mb-4">
              <div class="flex items-center justify-center w-10 h-10 mx-auto border rounded-full bg-gradient-to-br from-violet-500/20 to-purple-600/20 border-violet-500/30">
                <svg class="w-5 h-5 text-violet-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
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

      <!-- Show More Button for Certifications -->
      <div class="mt-12 text-center button-animate">
        <button id="certifications-show-more" onclick="window.Portfolio.toggleCertifications()" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/20 backdrop-blur-sm hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl">
          <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          Show More Certifications
        </button>
      </div>
    </div>
  </div>
</section>