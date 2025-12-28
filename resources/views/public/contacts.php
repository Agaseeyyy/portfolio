<?php
/**
 * Contacts Section Template
 * Interactive contact page with form and social media integration
 * 
 * @var array $contact - Contact data from database
 * @var array $home - Home data from database
 */
?>
<section id="contacts" class="relative px-6 py-20">
  <!-- Animated Background Elements -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute rounded-full w-96 h-96 bg-gradient-to-r from-pink-500/10 to-purple-500/10 -top-48 -left-48 animate-pulse"></div>
    <div class="absolute rounded-full w-80 h-80 bg-gradient-to-r from-blue-500/10 to-cyan-500/10 -bottom-40 -right-40 animate-pulse" style="animation-delay: 1s;"></div>
    <div class="absolute rounded-full w-72 h-72 bg-gradient-to-r from-rose-500/10 to-pink-500/10 top-1/3 right-1/4 animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <div class="relative z-10 mx-auto max-w-8xl">
    <!-- Section Header: Main title and description -->
    <div class="mb-16 text-center header-animate">
      <h2 class="mb-4 text-3xl font-bold text-white lg:text-4xl">
        Let's <span class="text-pink-500">Connect</span>
      </h2>
      <p class="max-w-3xl mx-auto text-lg text-gray-300">
        Ready to bring your ideas to life? Let's start a conversation and explore how we can work together.
      </p>
    </div>

    <!-- Contact Content: Centered layout -->
    <div class="max-w-2xl mx-auto">
      
      <!-- Contact Form Section: Email contact form with mailto functionality -->
      <div class="relative p-8 mb-8 border shadow-md rounded-xl bg-rose-500/10 border-rose-500/25 button-animate">
        
        <div class="relative z-10">
          <h3 class="mb-4 text-xl font-bold text-white">Send me a message</h3>
          
          <form action="mailto:<?= htmlspecialchars($contact['email']) ?>" method="post" enctype="text/plain" class="space-y-4">
            <div>
              <label for="name" class="block mb-1 text-sm font-medium text-gray-300">Name</label>
              <input type="text" id="name" name="name" required 
                     class="w-full px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
            </div>
            
            <div>
              <label for="email" class="block mb-1 text-sm font-medium text-gray-300">Email</label>
              <input type="email" id="email" name="email" required 
                     class="w-full px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
            </div>
            
            <div>
              <label for="subject" class="block mb-1 text-sm font-medium text-gray-300">Subject</label>
              <input type="text" id="subject" name="subject" required 
                     class="w-full px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
            </div>
            
            <div>
              <label for="message" class="block mb-1 text-sm font-medium text-gray-300">Message</label>
              <textarea id="message" name="message" rows="4" required 
                        class="w-full px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg resize-none bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"></textarea>
            </div>
            
            <button type="submit" class="inline-flex items-center justify-center w-full gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-300 border rounded-lg shadow-lg bg-gradient-to-r from-pink-500/90 to-rose-600/90 border-white/30 hover:from-pink-600 hover:to-rose-700 hover:scale-105 hover:shadow-xl group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
              Send Message
            </button>
          </form>
        </div>
      </div>

      <!-- Contact Info and Social Links Row -->
      <div class="grid gap-6 md:grid-cols-2">
        <!-- Contact Info Card: Display contact details and response time -->
        <div class="relative p-6 border shadow-md rounded-xl bg-rose-500/10 border-rose-500/25 button-animate" style="animation-delay: 0.2s;">
          
          <div class="relative z-10">
            <h3 class="mb-3 text-lg font-bold text-white">Contact Info</h3>
            
            <div class="space-y-3">
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-500/20">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <p class="text-xs text-gray-400">Email</p>
                  <p class="text-sm text-white"><?= htmlspecialchars($contact['email']) ?></p>
                </div>
              </div>
              
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-500/20">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <p class="text-xs text-gray-400">Location</p>
                  <p class="text-sm text-white"><?= htmlspecialchars($contact['address']) ?></p>
                </div>
              </div>
              
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-500/20">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <p class="text-xs text-gray-400">Response Time</p>
                  <p class="text-sm text-white">Within 24 hours</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Social Media Card: Links to external social platforms -->
        <div class="relative p-6 border shadow-md rounded-xl bg-rose-500/10 border-rose-500/25 button-animate" style="animation-delay: 0.3s;">
          
          <div class="relative z-10">
            <h3 class="mb-3 text-lg font-bold text-white">Follow Me</h3>
            
            <div class="grid grid-cols-2 gap-2">
              <?php if (!empty($contact['github_link'])): ?>
              <a href="<?= htmlspecialchars($contact['github_link']) ?>" target="_blank" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 496 512">
                  <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8z"/>
                </svg>
                <span class="text-xs text-white">GitHub</span>
              </a>
              <?php endif; ?>
              
              <?php if (!empty($contact['linkedin_link'])): ?>
              <a href="<?= htmlspecialchars($contact['linkedin_link']) ?>" target="_blank" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                  <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                </svg>
                <span class="text-xs text-white">LinkedIn</span>
              </a>
              <?php endif; ?>
              
              <?php if (!empty($contact['instagram_link'])): ?>
              <a href="<?= htmlspecialchars($contact['instagram_link']) ?>" target="_blank" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                  <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
                <span class="text-xs text-white">Instagram</span>
              </a>
              <?php endif; ?>
              
              <?php if (!empty($contact['email'])): ?>
              <a href="mailto:<?= htmlspecialchars($contact['email']) ?>" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-xs text-white">Email</span>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>