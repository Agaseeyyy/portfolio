<nav class="sticky top-0 z-50 px-6 text-white transition-all duration-300 border-b shadow-md bg-black/80 border-pink-500/20 h-fit">
  <div class="flex items-center justify-between py-6 mx-auto max-w-8xl h-fit">
    <!-- Logo -->
    <a href="" class="relative z-20 text-xl font-semibold">
      Agassi <span class="text-pink-500">Bustarga</span>
    </a>
    <!-- Hamburger Toggle (hidden input) -->
    <input type="checkbox" id="menu-toggle" class="hidden peer">
    
    <!-- Hamburger Button -->
    <label for="menu-toggle" class="relative z-20 cursor-pointer lg:hidden">
      <div class="w-6 h-0.5 bg-white mb-1 transition-all duration-300 peer-checked:rotate-45 peer-checked:translate-y-1.5"></div>
      <div class="w-6 h-0.5 bg-white mb-1 transition-all duration-300 peer-checked:opacity-0"></div>
      <div class="w-6 h-0.5 bg-white transition-all duration-300 peer-checked:-rotate-45 peer-checked:-translate-y-1.5"></div>
    </label>
    <!-- Single Navigation Menu - Responsive -->
    <ul class="justify-around hidden gap-4 text-white lg:flex peer-checked:flex peer-checked:fixed peer-checked:top-0 peer-checked:right-0 peer-checked:h-full peer-checked:w-64 peer-checked:bg-black peer-checked:flex-col peer-checked:justify-start peer-checked:pt-20 peer-checked:px-6 peer-checked:space-y-6 peer-checked:z-20 peer-checked:transform peer-checked:translate-x-0 peer-checked:transition-transform peer-checked:duration-300 lg:peer-checked:relative lg:peer-checked:flex-row lg:peer-checked:h-auto lg:peer-checked:w-auto lg:peer-checked:bg-transparent lg:peer-checked:pt-0 lg:peer-checked:px-0 lg:peer-checked:space-y-0 lg:peer-checked:transform-none">
    
      <!-- Close button for mobile (only visible in mobile menu) -->
      <label for="menu-toggle" class="absolute text-white transition-colors duration-200 cursor-pointer top-4 right-4 lg:hidden hover:text-pink-500">
        <img src="../public/images/icons/close.svg" alt="Close Menu" class="w-6 h-6" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
      </label>
      <!-- Navigation Links -->
      <a href="#home" class="text-lg transition-colors duration-200 nav lg:text-base hover:text-pink-500">Home</a>
      <a href="#portfolio" class="text-lg transition-colors duration-200 nav lg:text-base hover:text-pink-500">Portfolio</a>
      <a href="#services" class="text-lg transition-colors duration-200 nav lg:text-base hover:text-pink-500">Services</a>
      <a href="#contacts" class="text-lg transition-colors duration-200 nav lg:text-base hover:text-pink-500">Contacts</a>
      <!-- Single Social Links - Inside mobile menu, beside desktop nav -->
      <div class="flex justify-center gap-6 pt-8 border-t border-gray-700 lg:border-t-0 lg:pt-0 lg:pl-8">
        <!-- Github -->
        <a href="https://github.com/agaseeyyy" target="_blank"
           class="[&>svg]:h-6 [&>svg]:w-6 lg:[&>svg]:h-5 lg:[&>svg]:w-5
                  hover:text-pink-500 transition-all duration-200 hover:scale-110
                  transform hover:rotate-12">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 496 512">
            <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
          </svg>
        </a>
    
        <!-- Linkedin -->
        <a href="https://linkedin.com/in/agassi-bustarga" target="_blank"
           class="[&>svg]:h-6 [&>svg]:w-6 lg:[&>svg]:h-5 lg:[&>svg]:w-5
                  hover:text-pink-500 transition-all duration-200 hover:scale-110
                  transform hover:-rotate-12">
          <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
            <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
          </svg>
        </a>
    
        <!-- Instagram -->
        <a href="https://instagram.com/_agaseeyyy" target="_blank"
           class="[&>svg]:h-6 [&>svg]:w-6 lg:[&>svg]:h-5 lg:[&>svg]:w-5
                  hover:text-pink-500 transition-all duration-200 hover:scale-110
                  transform hover:rotate-12">
          <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
          </svg>
        </a>
    
        <!-- Gmail -->
        <a href="mailto:bustargaagassi1018@gmail.com" target="_blank"
           class="[&>svg]:h-6 [&>svg]:w-6 lg:[&>svg]:h-5 lg:[&>svg]:w-5
                  hover:text-pink-500 transition-all duration-200 hover:scale-110
                  transform hover:-rotate-12">
          <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
        </a>
      </div>
    </ul>
    <!-- Mobile Menu Overlay - clicking this closes the menu -->
    <label for="menu-toggle" class="fixed inset-0 z-10 invisible transition-opacity duration-300 opacity-0 cursor-pointer bg-black/50 peer-checked:opacity-100 peer-checked:visible lg:hidden"></label>
  </div>
</nav>