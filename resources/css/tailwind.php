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
    }
  }
      
  @theme {
    --color-clifford: #da373d;
    --font-sans: Poppins, ui-sans-serif, system-ui, sans-serif;
  }

  @layer utilities {
    .nav{
      @apply relative ml-10 text-white
      tracking-[1px] cursor-pointer
      hover:text-white
    }

    .nav::after{
      @apply content-[''] bg-pink-500 h-[3px] w-[0%] left-0 -bottom-[5px] 
      rounded-xl absolute duration-300
    }

    .nav:hover::after{
      @apply w-[100%]
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
  }
</style>