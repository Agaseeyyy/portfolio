<?php
/**
 * Contacts Section Template
 * Interactive contact page with form, chat, and social media integration
 * Features: Contact form, live chat simulation, GitHub auth, comments system
 */
?>
<section id="contacts" class="relative px-6 py-8">
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

    <!-- Contact Grid: Two-column layout for forms and interactive features -->
    <div class="grid gap-8 lg:grid-cols-5 lg:gap-12 xl:gap-16">
      
      <!-- Left Column: Contact Form with Info and Social Media Links -->
      <div class="lg:col-span-2">
        <!-- Contact Form Section: Email contact form with mailto functionality -->
        <div class="relative p-8 mb-8 border shadow-md rounded-xl bg-rose-500/10 border-rose-500/25 button-animate">
          
          <div class="relative z-10">
            <h3 class="mb-4 text-xl font-bold text-white">Send me a message</h3>
            
            <form action="mailto:bustargaagassi1018@gmail.com" method="post" enctype="text/plain" class="space-y-4">
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
                <img src="../public/images/icons/send.svg" alt="Send" class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1 filter brightness-0 invert">
                Send Message
              </button>
            </form>
          </div>
        </div>

        <!-- Contact Info Card: Display contact details and response time -->
        <div class="relative p-6 mb-8 border shadow-md rounded-xl bg-rose-500/10 border-rose-500/25 button-animate" style="animation-delay: 0.2s;">
          
          <div class="relative z-10">
            <h3 class="mb-3 text-lg font-bold text-white">Contact Info</h3>
            
            <div class="space-y-3">
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-500/20">
                  <img src="../public/images/icons/gmail.svg" alt="Email" class="w-4 h-4" style="filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);">
                </div>
                <div>
                  <p class="text-xs text-gray-400">Email</p>
                  <p class="text-sm text-white">bustargaagassi1018@gmail.com</p>
                </div>
              </div>
              
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-500/20">
                  <img src="../public/images/icons/location.svg" alt="Location" class="w-4 h-4" style="filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);">
                </div>
                <div>
                  <p class="text-xs text-gray-400">Location</p>
                  <p class="text-sm text-white">Philippines</p>
                </div>
              </div>
              
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-pink-500/20">
                  <img src="../public/images/icons/clock.svg" alt="Clock" class="w-4 h-4" style="filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);">
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
              <a href="https://github.com/agaseeyyy" target="_blank" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <img src="../public/images/icons/github.svg" alt="GitHub" class="w-4 h-4 text-white transition-colors duration-300 group-hover:text-pink-500" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                <span class="text-xs text-white">GitHub</span>
              </a>
              
              <a href="https://linkedin.com/in/agassi-bustarga" target="_blank" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <img src="../public/images/icons/linkedin.svg" alt="LinkedIn" class="w-4 h-4 text-white transition-colors duration-300 group-hover:text-pink-500" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                <span class="text-xs text-white">LinkedIn</span>
              </a>
              
              <a href="https://instagram.com/_agaseeyyy" target="_blank" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <img src="../public/images/icons/instagram.svg" alt="Instagram" class="w-4 h-4 text-white transition-colors duration-300 group-hover:text-pink-500" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                <span class="text-xs text-white">Instagram</span>
              </a>
              
              <a href="mailto:bustargaagassi1018@gmail.com" 
                 class="flex items-center gap-2 p-2 transition-all duration-300 border rounded-lg border-white/30 bg-white/20 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-105 group">
                <img src="../public/images/icons/gmail.svg" alt="Email" class="w-4 h-4 text-white transition-colors duration-300 group-hover:text-pink-500" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                <span class="text-xs text-white">Email</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Interactive Chat and Comments System -->
      <div class="space-y-8 lg:col-span-3">

        <!-- Live Chat Card: Simulated real-time chat with GitHub authentication -->
        <div class="relative p-6 border shadow-lg rounded-xl bg-rose-500/10 border-rose-500/25 button-animate" style="animation-delay: 0.4s;">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-60"></div>
          
          <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
              <h3 class="text-lg font-bold text-white">Live Chat</h3>
              <div class="flex items-center gap-1">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-xs text-green-400">Online</span>
              </div>
            </div>
            
            <!-- Chat Container: Scrollable message history -->
            <div class="mb-4 overflow-y-auto border rounded-lg h-80 bg-black/20 border-white/10 scrollbar-themed">
              <div id="chatMessages" class="p-3 space-y-2">
                <div class="flex items-start gap-2">
                  <div class="flex-shrink-0 w-6 h-6 bg-pink-500 rounded-full"></div>
                  <div class="flex-1">
                    <div class="text-xs text-gray-400">Agassi • 2m ago</div>
                    <div class="text-sm text-white">Welcome! Please login with GitHub to join the chat.</div>
                  </div>
                </div>
                <div class="flex items-start gap-2">
                  <div class="flex-shrink-0 w-6 h-6 bg-blue-500 rounded-full"></div>
                  <div class="flex-1">
                    <div class="text-xs text-gray-400">DevUser • 1m ago</div>
                    <div class="text-sm text-white">Great portfolio! Love the design.</div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- GitHub Auth Required Message: Authentication prompt for chat -->
            <div id="chatAuthRequired" class="p-4 mb-4 border rounded-lg bg-yellow-500/10 border-yellow-500/30">
              <div class="flex items-center gap-2 mb-2">
                <img src="../public/images/icons/warning.svg" alt="Warning" class="w-4 h-4" style="filter: brightness(0) saturate(100%) invert(77%) sepia(89%) saturate(1919%) hue-rotate(3deg) brightness(103%) contrast(107%);">
                <span class="text-sm font-medium text-yellow-300">GitHub Login Required</span>
              </div>
              <p class="mb-2 text-xs text-gray-300">To participate in the chat, please login with your GitHub account.</p>
              <button onclick="window.Contacts.loginWithGitHub()" class="flex items-center gap-2 px-3 py-1 text-xs font-semibold text-white transition-all duration-300 border rounded cursor-pointer bg-gradient-to-r from-gray-800/90 to-gray-900/90 border-gray-600/50 hover:from-gray-700 hover:to-gray-800 hover:border-gray-500">
                <img src="../public/images/icons/github.svg" alt="GitHub" class="w-4 h-4 filter brightness-0 invert">
                Login with GitHub
              </button>
            </div>
            
            <!-- Chat Input: Message input field (disabled until authenticated) -->
            <div id="chatInputArea" class="flex gap-2 opacity-50 pointer-events-none">
              <input type="text" id="chatInput" placeholder="Login with GitHub to chat..." disabled
                     class="flex-1 px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
              <button disabled class="px-3 py-2 text-sm font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-gray-500/90 to-gray-600/90 border-white/30">
                <img src="../public/images/icons/send.svg" alt="Send" class="w-4 h-4 filter brightness-0 invert">
              </button>
            </div>
          </div>
        </div>

        <!-- Comments Section: User feedback and testimonials system -->
        <div class="relative p-6 border shadow-lg rounded-xl bg-rose-500/10 border-rose-500/25 button-animate" style="animation-delay: 0.5s;">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-60"></div>
          
          <div class="relative z-10">
            <h3 class="mb-3 text-lg font-bold text-white">Comments</h3>
            
            <!-- GitHub Auth Required Message: Authentication prompt for comments -->
            <div id="commentsAuthRequired" class="p-3 mb-4 border rounded-lg bg-yellow-500/10 border-yellow-500/30">
              <div class="flex items-center gap-2 mb-2">
                <img src="../public/images/icons/warning.svg" alt="Warning" class="w-4 h-4" style="filter: brightness(0) saturate(100%) invert(77%) sepia(89%) saturate(1919%) hue-rotate(3deg) brightness(103%) contrast(107%);">
                <span class="text-sm font-medium text-yellow-300">GitHub Login Required</span>
              </div>
              <p class="mb-2 text-xs text-gray-300">To leave a comment, please login with your GitHub account.</p>
              <button onclick="window.Contacts.loginWithGitHub()" class="flex items-center gap-2 px-3 py-1 text-xs font-semibold text-white transition-all duration-300 border rounded cursor-pointer bg-gradient-to-r from-gray-800/90 to-gray-900/90 border-gray-600/50 hover:from-gray-700 hover:to-gray-800 hover:border-gray-500">
                <img src="../public/images/icons/github.svg" alt="GitHub" class="w-4 h-4 filter brightness-0 invert">
                Login with GitHub
              </button>
            </div>
            
            <!-- Add Comment Form: User input for new comments (disabled until authenticated) -->
            <div id="commentForm" class="mb-4 space-y-2 opacity-50 pointer-events-none">
              <input type="text" id="commentName" placeholder="Login with GitHub to comment..." disabled
                     class="w-full px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
              <textarea id="commentText" placeholder="Share your thoughts..." rows="2" disabled
                        class="w-full px-3 py-2 text-sm text-white placeholder-gray-400 transition-all duration-300 border rounded-lg resize-none bg-rose-500/10 border-rose-500/25 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"></textarea>
              <button disabled class="px-4 py-2 text-xs font-semibold text-white transition-all duration-300 border rounded-lg bg-gradient-to-r from-gray-500/90 to-gray-600/90 border-white/30">
                Post Comment
              </button>
            </div>
            
            <!-- Comments List: Display existing user comments and testimonials -->
            <div id="commentsList" class="space-y-4 overflow-y-auto max-h-80 scrollbar-themed">
              <div class="p-3 border rounded-lg bg-white/15 border-white/25">
                <div class="flex items-center justify-between mb-1">
                  <span class="text-sm font-medium text-white">@johndoe</span>
                  <span class="text-xs text-gray-400">5 min ago</span>
                </div>
                <p class="text-sm text-gray-300">Amazing portfolio! The design is really clean and professional.</p>
              </div>
              
              <div class="p-3 border rounded-lg bg-white/15 border-white/25">
                <div class="flex items-center justify-between mb-1">
                  <span class="text-sm font-medium text-white">@sarahwilson</span>
                  <span class="text-xs text-gray-400">1 hour ago</span>
                </div>
                <p class="text-sm text-gray-300">Love the glass morphism effect. Great work!</p>
              </div>
              
              <div class="p-3 border rounded-lg bg-white/15 border-white/25">
                <div class="flex items-center justify-between mb-1">
                  <span class="text-sm font-medium text-white">@devmaster</span>
                  <span class="text-xs text-gray-400">2 hours ago</span>
                </div>
                <p class="text-sm text-gray-300">The animations are smooth and the color scheme is perfect!</p>
              </div>
              
              <div class="p-3 border rounded-lg bg-white/15 border-white/25">
                <div class="flex items-center justify-between mb-1">
                  <span class="text-sm font-medium text-white">@codegeek</span>
                  <span class="text-xs text-gray-400">3 hours ago</span>
                </div>
                <p class="text-sm text-gray-300">Impressive work! Would love to collaborate on a project.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>