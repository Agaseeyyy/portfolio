<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style type="text/tailwindcss">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
  @import "tailwindcss";

  @layer base {
    * {
      @apply box-border;
    }

    html {
      @apply scroll-smooth overflow-x-hidden;
      background: #000000;
      overscroll-behavior: none;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-rendering: optimizeSpeed;
    }
    
    body {
      background: linear-gradient(to bottom right, #000000, #1f2937, #000000);
      min-height: 100vh;
      overscroll-behavior: none;
      -webkit-overflow-scrolling: touch;
      position: relative;
      transform: translateZ(0);
      will-change: auto;
    }
  }
      
  @theme {
    --color-clifford: #da373d;
    --font-sans: Poppins, ui-sans-serif, system-ui, sans-serif;
  }

  @layer utilities {

    .max-w-8xl{
      @apply max-w-[96rem] px-5 mx-auto
    } 
    
    /* Add scroll margin for sections and headers - reduced for sticky nav */
    section, header {
      scroll-margin-top: 100px;
    }
    
    /* Pink Frosted theme - Better color harmony */
    .pink-frosted {
      background: rgba(236, 72, 153, 0.1);
      border: 1px solid rgba(236, 72, 153, 0.3);
      will-change: transform;
    }
    
    .pink-frosted:hover {
      background: rgba(236, 72, 153, 0.15);
      border-color: rgba(236, 72, 153, 0.4);
    }
    
    /* Gray frosted for subtle elements */
    .gray-frosted {
      background: rgba(75, 85, 99, 0.15);
      border: 1px solid rgba(75, 85, 99, 0.3);
    }
    
    /* Rose frosted for accents */
    .rose-frosted {
      background: rgba(244, 63, 94, 0.1);
      border: 1px solid rgba(244, 63, 94, 0.25);
    }
    
    /* Disable animations for users who prefer reduced motion */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }
    
    .nav{
      @apply relative ml-10 text-white
      tracking-[1px] cursor-pointer
      hover:text-white
    }

    .nav::after{
      @apply content-[''] bg-pink-500 h-[3px] w-[0%] left-0 -bottom-[5px] 
      rounded-xl absolute duration-300
    }

    /* Custom Scrollbar Styles */
    .scrollbar-thin {
      scrollbar-width: thin;
    }
    
    .scrollbar-thumb-pink-500\/50::-webkit-scrollbar-thumb {
      background-color: rgba(236, 72, 153, 0.5);
      border-radius: 4px;
    }
    
    .scrollbar-track-white\/10::-webkit-scrollbar-track {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
    }
    
    .scrollbar-thin::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb {
      background-color: rgba(236, 72, 153, 0.5);
      border-radius: 4px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-track {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
    }

    .scrollbar-themed {
      scrollbar-width: thin;
      scrollbar-color: rgba(236, 72, 153, 0.4) rgba(255, 255, 255, 0.1);
    }

    .scrollbar-themed::-webkit-scrollbar {
      width: 8px;
    }

    .scrollbar-themed::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
    }

    .scrollbar-themed::-webkit-scrollbar-thumb {
      background: rgba(236, 72, 153, 0.4);
      border-radius: 4px;
      transition: background 0.3s ease;
    }

    .scrollbar-themed::-webkit-scrollbar-thumb:hover {
      background: rgba(236, 72, 153, 0.6);
    }

    .nav:hover::after{
      @apply w-[100%]
    }

    /* Orbit Animation Containment */
    .animate-spin {
      transform-origin: center center;
    }

    /* Avatar section specific positioning */
    .avatar-orbit-container {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .avatar-orbit-container > div {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    /* Orbit overflow container */
    .orbit-overflow-container {
      position: absolute;
      pointer-events: none;
      z-index: 1;
    }

    .orbit-overflow-container > div {
      pointer-events: auto;
    }

    /* Animation Delays */
    .animation-delay-500 {
      animation-delay: 0.5s;
    }
    
    .animation-delay-1000 {
      animation-delay: 1s;
    }
    
    .animation-delay-1500 {
      animation-delay: 1.5s;
    }
    
    .animation-delay-2000 {
      animation-delay: 2s;
    }

    /* Portfolio Custom Animations */
    @keyframes fade-in {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-in {
      animation: fade-in 0.6s ease forwards;
    }

    /* Homepage entrance animations */
    @keyframes slide-in-left {
      from {
        opacity: 0;
        transform: translateX(-100px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slide-in-right {
      from {
        opacity: 0;
        transform: translateX(100px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fade-in-up {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes scale-in {
      from {
        opacity: 0;
        transform: scale(0.8);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
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

    /* Typing animation */
    @keyframes typing {
      from {
        width: 0;
      }
      to {
        width: 100%;
      }
    }

    @keyframes blink-caret {
      from, to {
        border-color: transparent;
      }
      50% {
        border-color: rgba(236, 72, 153, 1);
      }
    }

    .typing-container {
      position: relative;
      display: inline-block;
    }

    .typing-container::before {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 100%;
      overflow: hidden;
      border-right: 2px solid rgba(236, 72, 153, 1);
      white-space: nowrap;
      animation: typing 2s steps(16, end) 0.5s forwards, blink-caret 1s infinite 2s;
      color: inherit;
      font-size: inherit;
      font-weight: inherit;
      line-height: inherit;
    }

    .typing-container .typing-text {
      margin-right: 5px;
      opacity: 0;
    }

    /* Portfolio tab active state */
    .portfolio-tab-active {
      background: rgba(236, 72, 153, 0.2);
      border: 1px solid rgba(236, 72, 153, 0.3);
      box-shadow: 0 0 20px rgba(236, 72, 153, 0.3);
    }

    /* Portfolio section transitions */
    .portfolio-section {
      transition: all 0.3s ease;
    }

    .portfolio-section-hidden {
      opacity: 0;
      transform: translateY(20px);
    }

    .portfolio-section-active {
      opacity: 1;
      transform: translateY(0);
    }

    /* Tech item hover effects */
    .tech-item {
      transition: all 0.3s ease;
    }

    .tech-item:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }

    /* Project card effects */
    .project-card {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .project-card:hover {
      box-shadow: 0 25px 50px -12px rgba(236, 72, 153, 0.25);
    }

    /* Certification card effects */
    .cert-card:hover {
      box-shadow: 0 20px 40px -12px rgba(236, 72, 153, 0.2);
    }

    /* Portfolio card initial state for animations */
    .portfolio-card-initial {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .portfolio-card-visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Header and button animations */
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
  }

  
</style>