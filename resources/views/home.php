<?php include 'layout/nav.php'; ?>
<?php include 'layout/background.php'; ?>

<!-- Content Container with relative positioning -->
<div class="relative z-10 min-h-screen">
  <!-- Desktop-first responsive header -->
  <header id="home" class="flex flex-col items-center justify-center min-h-screen gap-8 px-6 lg:flex-row lg:gap-16 xl:gap-20">
    
    <!-- Text Content Section -->
    <div class="relative w-full max-w-xl p-6 border shadow-2xl lg:w-auto lg:max-w-2xl xl:max-w-3xl rounded-2xl backdrop-blur-md bg-white/10 border-white/20">
      <!-- Glass shine effect -->
      <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-60"></div>
      
      <div class="relative z-10 space-y-5">
        <h3 class="text-xl font-semibold text-pink-500">Hi, I'm Agassi Bustarga</h3>
        <h1 class="text-2xl font-bold text-white lg:text-3xl xl:text-4xl drop-shadow-lg">Full-stack Web
          <span class="text-pink-500"><br>Student Developer</span>
        </h1>
        <p class="max-w-2xl text-base text-gray-100 drop-shadow-md">A passionate and dedicated information technology student with a knack for problem-solving and a love for coding. Eager to learn and grow in the tech industry.</p>
        
        <!-- Action buttons -->
        <div class="flex flex-row gap-4 mt-6 max-sm:justify-center lg:gap-6">
          <a href="#projects" class="inline-block px-8 py-3 text-sm text-white transition-all duration-300 border rounded-full shadow-lg bg-gradient-to-r from-pink-500/80 to-rose-600/80 backdrop-blur-sm border-white/20 hover:from-pink-600/90 hover:to-rose-700/90 hover:scale-105 hover:shadow-xl lg:px-10 lg:py-4 lg:text-base">
            Download CV
          </a>

          <a href="#about" class="inline-block px-8 py-3 text-sm text-white transition-all duration-300 border rounded-full shadow-lg border-pink-500/80 backdrop-blur-sm hover:from-pink-600/50 hover:to-rose-700/50 hover:scale-105 hover:shadow-xl bg-gradient-to-r from-pink-500/20 to-rose-600/20 lg:px-10 lg:py-4 lg:text-base">
            More . . . 
          </a>
        </div>

        <!-- Social Media Icons -->
        <div class="flex gap-6 pt-8 mt-8 border-t border-white/20">
          <!-- Github -->
          <a href="https://github.com/agaseeyyy" target="_blank" 
             class="p-3 transition-all duration-200 border rounded-full border-white/20 backdrop-blur-sm bg-white/10 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:rotate-12">
            <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 496 512">
              <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
            </svg>
          </a>
          
          <!-- Linkedin -->
          <a href="https://linkedin.com/in/agassi-bustarga" target="_blank" 
             class="p-3 transition-all duration-200 border rounded-full border-white/20 backdrop-blur-sm bg-white/10 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:-rotate-12">
            <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
              <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
            </svg>
          </a>
          
          <!-- Instagram -->
          <a href="https://instagram.com/_agaseeyyy" target="_blank" 
             class="p-3 transition-all duration-200 border rounded-full border-white/20 backdrop-blur-sm bg-white/10 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:rotate-12">
            <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
              <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
            </svg>
          </a>
          
          <!-- Gmail -->
          <a href="mailto:bustargaagassi1018@gmail.com" target="_blank" 
             class="p-3 transition-all duration-200 border rounded-full border-white/20 backdrop-blur-sm bg-white/10 hover:bg-pink-500/20 hover:border-pink-500/50 hover:scale-110 hover:-rotate-12">
            <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 488 512">
              <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Avatar Section - Much Bigger -->
    <div class="relative flex items-center justify-center">
      <!-- Outer Orbit - Significantly Larger -->
      <div class="absolute border rounded-full w-[32rem] h-[32rem] lg:w-[40rem] lg:h-[40rem] xl:w-[48rem] xl:h-[48rem] border-pink-500/20 animate-spin" style="animation-duration: 20s;">
        <!-- React Icon -->
        <div class="absolute z-30 w-6 h-6 text-blue-400 transform -translate-x-1/2 opacity-20 -top-3 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.41 0-.783.093-1.106.278-1.375.793-1.683 3.264-.973 6.365C1.98 8.917 0 10.42 0 12.004c0 1.59 1.99 3.097 5.043 4.03-.704 3.113-.39 5.588.988 6.38.32.187.69.275 1.102.275 1.345 0 3.107-.96 4.888-2.624 1.78 1.654 3.542 2.603 4.887 2.603.41 0 .783-.09 1.106-.275 1.374-.792 1.683-3.263.973-6.365C22.02 15.096 24 13.59 24 12.004c0-1.59-1.99-3.097-5.043-4.032.704-3.11.39-5.587-.988-6.38-.318-.184-.688-.277-1.092-.278zm-.005 1.09v.006c.225 0 .406.044.558.127.666.382.955 1.835.73 3.704-.054.46-.142.945-.25 1.44-.96-.236-2.006-.417-3.107-.534-.66-.905-1.345-1.727-2.035-2.447 1.592-1.48 3.087-2.292 4.105-2.295zm-9.77.02c1.012 0 2.514.808 4.11 2.28-.686.72-1.37 1.537-2.02 2.442-1.107.117-2.154.298-3.113.538-.112-.49-.195-.964-.254-1.42-.23-1.868.054-3.32.714-3.707.19-.09.4-.127.563-.132zm4.882 3.05c.455.468.91.992 1.36 1.564-.44-.02-.89-.034-1.36-.034-.47 0-.92.014-1.36.034.44-.572.895-1.096 1.36-1.564zM12 8.1c.74 0 1.477.034 2.202.093.406.582.802 1.203 1.183 1.86.372.64.71 1.29 1.018 1.946-.308.655-.646 1.31-1.013 1.95-.38.66-.773 1.288-1.18 1.87-.728.063-1.466.098-2.21.098-.74 0-1.477-.035-2.202-.093-.406-.582-.802-1.204-1.183-1.86-.372-.64-.71-1.29-1.018-1.946.303-.657.646-1.313 1.013-1.954.38-.66.773-1.286 1.18-1.866.728-.064 1.466-.098 2.21-.098zm-3.635.254c-.24.377-.48.763-.704 1.16-.225.39-.435.782-.635 1.174-.265-.656-.49-1.31-.676-1.947.64-.15 1.315-.283 2.015-.386zm7.26 0c.695.103 1.365.23 2.006.387-.18.632-.405 1.282-.66 1.933-.2-.39-.41-.783-.64-1.174-.225-.392-.465-.774-.705-1.146zm3.063.675c.484.15.944.317 1.375.498 1.732.74 2.852 1.708 2.852 2.476-.005.768-1.125 1.74-2.857 2.475-.42.18-.88.342-1.355.493-.28-.958-.646-1.956-1.1-2.98.45-1.017.81-2.01 1.085-2.964zm-13.395.004c.278.96.645 1.957 1.1 2.98-.45 1.017-.812 2.01-1.086 2.964-.484-.15-.944-.318-1.37-.5-1.732-.737-2.852-1.706-2.852-2.474 0-.768 1.12-1.742 2.852-2.476.42-.18.88-.342 1.356-.494zm11.678 4.28c.265.657.49 1.312.676 1.948-.64.157-1.316.29-2.016.39.24-.375.48-.762.705-1.158.225-.39.435-.788.636-1.18zm-9.945.02c.2.392.41.783.64 1.175.23.39.465.772.705 1.143-.695-.102-1.365-.23-2.006-.386.18-.63.406-1.282.66-1.933zM17.92 16.32c.112.493.2.968.254 1.423.23 1.868-.054 3.32-.714 3.708-.147.09-.338.128-.563.128-1.012 0-2.514-.807-4.11-2.28.686-.72 1.37-1.536 2.02-2.44 1.107-.118 2.154-.3 3.113-.54zm-11.83.01c.96.234 2.006.415 3.107.532.66.905 1.345 1.727 2.035 2.446-1.595 1.483-3.092 2.295-4.11 2.295-.22-.005-.406-.05-.553-.132-.666-.38-.955-1.834-.73-3.703.054-.46.142-.944.25-1.438zm4.56.64c.44.02.89.034 1.36.034.47 0 .92-.014 1.36-.034-.44.572-.895 1.095-1.36 1.56-.465-.467-.92-.992-1.36-1.56z"/>
          </svg>
        </div>
        
        <!-- Spring Boot Icon -->
        <div class="absolute z-30 w-6 h-6 text-green-500 transform -translate-y-1/2 opacity-20 top-1/2 -right-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.205 16.392c-2.469 3.289-7.741 2.179-11.122 2.338 0 0-.599.034-1.201.133 0 0 .228-.097.519-.198 2.374-.821 3.496-.986 4.939-1.727 2.71-1.388 5.408-4.413 5.957-7.555-1.032 3.022-4.17 5.623-7.027 6.679-1.955.722-5.492 1.424-5.493 1.424a5.28 5.28 0 0 1-.143-.076c-2.405-1.17-2.475-6.38 1.894-8.059 1.916-.736 3.747-.332 5.818-.825 2.208-.525 4.766-2.18 5.805-4.344 1.165 3.458 2.565 8.866.054 12.21zm.042-13.28a9.212 9.212 0 0 1-1.065 1.89 9.982 9.982 0 0 0-7.167-3.031C6.492 1.971 2 6.463 2 11.985a9.983 9.983 0 0 0 3.205 7.334l.22.194a.856.856 0 1 1 .001.001l.149.132A9.96 9.96 0 0 0 12.015 22c5.487 0 9.935-4.448 9.935-9.935a9.928 9.928 0 0 0-1.703-5.953z"/>
          </svg>
        </div>
        
        <!-- HTML Icon -->
        <div class="absolute z-30 w-6 h-6 text-orange-500 transform -translate-x-1/2 opacity-20 -bottom-3 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm7.031 9.75l-.232-2.718 10.059.003.23-2.622L5.412 4.41l.698 8.01h9.126l-.326 3.426-2.91.804-2.955-.81-.188-2.11H6.248l.33 4.171L12 19.351l5.379-1.443.744-8.157H8.531z"/>
          </svg>
        </div>
        
        <!-- JavaScript Icon -->
        <div class="absolute z-30 w-6 h-6 text-yellow-400 transform -translate-y-1/2 opacity-20 top-1/2 -left-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0zm22.034 18.276c-.175-1.095-.888-2.015-3.003-2.873-.736-.345-1.554-.585-1.797-1.14-.091-.33-.105-.51-.046-.705.15-.646.915-.84 1.515-.66.39.12.75.42.976.9 1.034-.676 1.034-.676 1.755-1.125-.27-.42-.404-.601-.586-.78-.63-.705-1.469-1.065-2.834-1.034l-.705.089c-.676.165-1.32.525-1.71 1.005-1.14 1.291-.811 3.541.569 4.471 1.365 1.02 3.361 1.244 3.616 2.205.24 1.17-.87 1.545-1.966 1.41-.811-.18-1.26-.586-1.755-1.336l-1.83 1.051c.21.48.45.689.81 1.109 1.74 1.756 6.09 1.666 6.871-1.004.029-.09.24-.705.074-1.65l.046.067zm-8.983-7.245h-2.248c0 1.938-.009 3.864-.009 5.805 0 1.232.063 2.363-.138 2.711-.33.689-1.18.601-1.566.48-.396-.196-.597-.466-.83-.855-.063-.105-.11-.196-.127-.196l-1.825 1.125c.305.63.75 1.172 1.324 1.517.855.51 2.004.675 3.207.405.783-.226 1.458-.691 1.811-1.411.51-.93.402-2.07.397-3.346.012-2.054 0-4.109 0-6.179l.004-.056z"/>
          </svg>
        </div>
      </div>
      
      <!-- Inner Orbit - Significantly Larger -->
      <div class="absolute border overscroll-none rounded-full w-[26rem] h-[26rem] lg:w-[32rem] lg:h-[32rem] xl:w-[38rem] xl:h-[38rem] border-rose-400/20 animate-spin" style="animation-duration: 15s; animation-direction: reverse;">
        <!-- Java Icon -->
        <div class="absolute z-30 w-6 h-6 text-red-500 transform -translate-x-1/2 opacity-20 -top-3 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M8.851 18.56s-.917.534.653.714c1.902.218 2.874.187 4.969-.211 0 0 .552.346 1.321.646-4.699 2.013-10.633-.118-6.943-1.149M8.276 15.933s-1.028.761.542.924c2.032.209 3.636.227 6.413-.308 0 0 .384.389.987.602-5.679 1.661-12.007.13-7.942-1.218M13.116 11.475c1.158 1.333-.304 2.533-.304 2.533s2.939-1.518 1.589-3.418c-1.261-1.772-2.228-2.652 3.007-5.688 0-.001-8.216 2.051-4.292 6.573M19.33 20.504s.679.559-.747.991c-2.712.822-11.288 1.069-13.669.033-.856-.373.75-.89 1.254-.998.527-.114.828-.093.828-.093-.953-.671-6.156 1.317-2.643 1.887 9.58 1.553 17.462-.7 14.977-1.82M9.292 13.21s-4.362 1.036-1.544 1.412c1.189.159 3.561.123 5.77-.062 1.806-.152 3.618-.477 3.618-.477s-.637.272-1.098.587c-4.429 1.165-12.986.623-10.522-.568 2.082-1.006 3.776-.892 3.776-.892M17.116 17.584c4.503-2.34 2.421-4.589.968-4.285-.355.074-.515.138-.515.138s.132-.207.385-.297c2.875-1.011 5.086 2.981-.928 4.562 0-.001.07-.062.09-.118M14.401 0s2.494 2.494-2.365 6.33c-3.896 3.077-.888 4.832-.001 6.836-2.274-2.053-3.943-3.858-2.824-5.539 1.644-2.469 6.197-3.665 5.19-7.627M9.734 23.924c4.322.277 10.959-.153 11.116-2.198 0 0-.302.775-3.572 1.391-3.688.694-8.239.613-10.937.168 0-.001.553.457 3.393.639"/>
          </svg>
        </div>
        
        <!-- Tailwind CSS Icon -->
        <div class="absolute z-30 w-6 h-6 transform -translate-y-1/2 opacity-20 text-cyan-400 top-1/2 -right-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
          </svg>
        </div>
        
        <!-- PHP Icon -->
        <div class="absolute z-30 w-6 h-6 text-purple-500 transform -translate-y-1/2 opacity-20 top-1/2 -left-3 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <img src="./public/images/php.svg" alt="php" class="w-full h-full">
        </div>
        
        <!-- Laravel Icon -->
        <div class="absolute z-30 w-6 h-6 text-red-400 transform -translate-x-1/2 -translate-y-1/2 opacity-20 -bottom-8 left-1/2 lg:w-8 lg:h-8 xl:w-10 xl:h-10">
          <svg fill="currentColor" viewBox="0 0 24 24">
            <path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.017c-.008.002-.016.002-.024.002-.008 0-.016 0-.024-.002a.316.316 0 01-.066-.017L.726 18.755a.378.378 0 01-.188-.326V9.584c0-.019.002-.038.005-.056a.355.355 0 01.06-.2c.003-.005.003-.01.007-.014a.344.344 0 01.124-.107L5.044 6.767V2.201a.378.378 0 01.188-.326L14.263.681a.318.318 0 01.32 0l9.031 5.194a.382.382 0 01.028.055zm-6.928 4.891l-4.54-2.637L7.646 10.3l4.54 2.638 4.528-2.618zM1.262 10.142v8.001l8.24 4.738v-8.001l-8.24-4.738zm17.007 0v4.26l4.323-2.49V9.854l-4.323 2.288z"/>
          </svg>
        </div>
      </div>
      
      <!-- Avatar Container with Glowing Border - Much Bigger -->
      <div class="relative z-10 flex items-center justify-center">
        <!-- Glow Effect -->
        <div class="absolute inset-0 rounded-full w-[20rem] h-[20rem] lg:w-[24rem] lg:h-[24rem] xl:w-[28rem] xl:h-[28rem] bg-gradient-to-r from-pink-500/30 via-rose-500/30 to-pink-500/30 blur-xl animate-pulse"></div>
        
        <!-- Main Avatar Frame -->
        <div class="relative flex items-center justify-center rounded-full shadow-2xl border-pink-500/20 border-2 w-[18rem] h-[18rem] lg:w-[22rem] lg:h-[22rem] xl:w-[26rem] xl:h-[26rem] backdrop-blur-sm bg-white/10">
          <!-- Inner glow -->
          <div class="absolute rounded-full inset-4 bg-gradient-to-r from-pink-500/20 via-transparent to-pink-500/20"></div>
          
          <!-- Avatar Image -->
          <div class="relative z-20 flex items-center justify-center w-[16rem] h-[16rem] lg:w-[20rem] lg:h-[20rem] xl:w-[24rem] xl:h-[24rem] overflow-hidden rounded-full">
            <img src="https://avatars.githubusercontent.com/u/153368053?v=4" alt="avatar" class="object-cover w-full h-full">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Additional Content Section with Glass Cards -->
  <section id="about" class="px-6 py-20 lg:px-8 xl:px-12">
    <div class="max-w-6xl mx-auto">
      <!-- Sample glass cards for portfolio sections -->
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:gap-8">
        <!-- About Card -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/20 hover:scale-105 lg:p-8">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-3 text-xl font-semibold text-white lg:text-2xl">About Me</h3>
            <p class="text-base text-gray-200 lg:text-lg">Learn more about my journey and passion for technology.</p>
          </div>
        </div>

        <!-- Projects Card -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/20 hover:scale-105 lg:p-8">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-3 text-xl font-semibold text-white lg:text-2xl">Projects</h3>
            <p class="text-base text-gray-200 lg:text-lg">Explore my latest work and coding projects.</p>
          </div>
        </div>

        <!-- Contact Card -->
        <div class="relative p-6 transition-all duration-300 border shadow-xl rounded-xl backdrop-blur-md bg-white/10 border-white/20 hover:bg-white/20 hover:scale-105 lg:p-8">
          <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-40"></div>
          <div class="relative z-10">
            <h3 class="mb-3 text-xl font-semibold text-white lg:text-2xl">Get in Touch</h3>
            <p class="text-base text-gray-200 lg:text-lg">Let's connect and collaborate on exciting projects.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Add more content sections here as needed -->
  <section id="projects" class="px-6 py-16 lg:px-8 xl:px-12">
    <div class="max-w-6xl mx-auto">
      <div class="relative p-8 border shadow-2xl rounded-2xl backdrop-blur-md bg-white/10 border-white/20 lg:p-10">
        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-60"></div>
        <div class="relative z-10">
          <h2 class="mb-6 text-3xl font-bold text-white lg:text-4xl xl:text-5xl">More Content</h2>
          <p class="text-lg text-gray-200 lg:text-xl">Add more sections here to test the scrolling effect with fixed background.</p>
        </div>
      </div>
    </div>
  </section>
</div>