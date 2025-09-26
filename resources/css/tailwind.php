<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style type="text/tailwindcss">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
  @import "tailwindcss";

  /* ========================================
     BASE STYLES & THEME CONFIGURATION
  ======================================== */
  @layer base {
    * {
      @apply box-border;
    }

    html {
      @apply scroll-smooth overflow-x-hidden bg-black;
      overscroll-behavior: none;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-rendering: optimizeSpeed;
    }
    
    body {
      @apply bg-gradient-to-br from-black via-gray-800 to-black min-h-screen relative;
      overscroll-behavior: none;
      -webkit-overflow-scrolling: touch;
      transform: translateZ(0);
      will-change: auto;
    }
  }

  @theme {
    --color-clifford: #da373d;
    --font-sans: Poppins, ui-sans-serif, system-ui, sans-serif;
  }

  /* ========================================
     UTILITY CLASSES & COMPONENTS
  ======================================== */
  @layer utilities {
    
    /* Layout Utilities */
    .max-w-8xl {
      @apply max-w-[96rem] px-5 mx-auto;
    }
    
    section, header {
      @apply scroll-mt-[100px];
    }

    /* ========================================
       GLASS & FROSTED THEMES
    ======================================== */
    .pink-frosted {
      @apply bg-pink-500/10 border border-pink-500/30 backdrop-blur-sm;
      will-change: transform;
    }
    
    .pink-frosted:hover {
      @apply bg-pink-500/15 border-pink-500/40;
    }
    
    .gray-frosted {
      @apply bg-gray-600/15 border border-gray-600/30;
    }
    
    .rose-frosted {
      @apply bg-rose-500/10 border border-rose-500/25;
    }

    /* ========================================
       NAVIGATION STYLES
    ======================================== */
    .nav {
      @apply relative ml-10 text-white tracking-[1px] cursor-pointer hover:text-white;
    }

    .nav::after {
      @apply content-[''] bg-pink-500 h-[3px] w-[0%] left-0 -bottom-[5px] rounded-xl absolute duration-300;
    }

    .nav:hover::after {
      @apply w-[100%];
    }

    /* ========================================
       CUSTOM SCROLLBAR STYLES
    ======================================== */
    .scrollbar-themed {
      scrollbar-width: thin;
      scrollbar-color: rgb(236 72 153 / 0.4) rgb(255 255 255 / 0.1);
    }

    .scrollbar-themed::-webkit-scrollbar {
      width: 8px;
    }

    .scrollbar-themed::-webkit-scrollbar-track {
      background: rgb(255 255 255 / 0.1);
      border-radius: 0.375rem;
    }

    .scrollbar-themed::-webkit-scrollbar-thumb {
      background: rgb(236 72 153 / 0.4);
      border-radius: 0.375rem;
      transition: background 0.3s ease;
    }

    .scrollbar-themed::-webkit-scrollbar-thumb:hover {
      background: rgb(236 72 153 / 0.6);
    }

    /* ========================================
       AVATAR & ORBIT ANIMATIONS
    ======================================== */
    .animate-spin {
      transform-origin: center center;
    }

    .avatar-orbit-container {
      @apply relative flex items-center justify-center;
    }

    .avatar-orbit-container > div {
      @apply absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2;
    }

    .orbit-overflow-container {
      @apply absolute pointer-events-none z-10;
    }

    .orbit-overflow-container > div {
      @apply pointer-events-auto;
    }

    /* ========================================
       KEYFRAME ANIMATIONS
    ======================================== */
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slide-in-left {
      from { opacity: 0; transform: translateX(-100px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes slide-in-right {
      from { opacity: 0; transform: translateX(100px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fade-in-up {
      from { opacity: 0; transform: translateY(50px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes scale-in {
      from { opacity: 0; transform: scale(0.8); }
      to { opacity: 1; transform: scale(1); }
    }

    @keyframes typing {
      from { width: 0; }
      to { width: 100%; }
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: rgba(236, 72, 153, 1); }
    }

    /* ========================================
       ANIMATION CLASSES
    ======================================== */
    .animate-fade-in {
      animation: fade-in 0.6s ease forwards;
    }

    .animate-slide-in-left {
      animation: slide-in-left 0.8s ease-out forwards;
    }

    .animate-slide-in-right {
      animation: slide-in-right 0.8s ease-out forwards;
    }

    .animate-fade-in-up {
      animation: fade-in-up 0.6s ease-out forwards;
    }

    .animate-scale-in {
      animation: scale-in 0.6s ease-out forwards;
    }

    /* ========================================
       TYPING ANIMATION
    ======================================== */
    .typing-container {
      @apply relative inline-block;
    }

    .typing-container::before {
      content: attr(data-text);
      @apply absolute top-0 left-0 w-0 h-full overflow-hidden border-r-2 border-pink-500 whitespace-nowrap;
      animation: typing 2s steps(16, end) 0.5s forwards, blink-caret 1s infinite 2s;
      color: inherit;
      font-size: inherit;
      font-weight: inherit;
      line-height: inherit;
    }

    .typing-container .typing-text {
      @apply mr-1 opacity-0;
    }

    /* ========================================
       PORTFOLIO & PROJECT STYLES
    ======================================== */
    .portfolio-tab-active {
      background: rgb(236 72 153 / 0.2);
      border: 1px solid rgb(236 72 153 / 0.3);
      box-shadow: 0 0 20px rgb(236 72 153 / 0.3);
    }

    .portfolio-section {
      @apply transition-all duration-300 ease-in-out;
    }

    .portfolio-section-hidden {
      @apply opacity-0 translate-y-5;
    }

    .portfolio-section-active {
      @apply opacity-100 translate-y-0;
    }

    .portfolio-card-initial {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .portfolio-card-visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* ========================================
       CARD HOVER EFFECTS
    ======================================== */
    .project-card {
      @apply transition-all duration-300 ease-out;
    }

    .project-card:hover {
      box-shadow: 0 25px 50px -12px rgb(236 72 153 / 0.25);
    }

    .cert-card:hover {
      box-shadow: 0 20px 40px -12px rgb(236 72 153 / 0.2);
    }

    .tech-item {
      @apply transition-all duration-300 ease-in-out;
    }

    .tech-item:hover {
      @apply bg-white/10 translate-x-1;
    }

    /* ========================================
       SCROLL-TRIGGERED ANIMATIONS
    ======================================== */
    .header-animate {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .header-animate-visible {
      opacity: 1;
      transform: translateY(0);
    }

    .button-animate {
      opacity: 0;
      transform: translateY(20px) scale(0.95);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .button-animate-visible {
      opacity: 1;
      transform: translateY(0) scale(1);
    }

    .tab-animate {
      opacity: 0;
      transform: translateY(15px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .tab-animate-visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* ========================================
       ACCESSIBILITY & PERFORMANCE
    ======================================== */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }

  }
</style>