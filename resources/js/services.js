/**
 * Services section functionality
 * Handles service cards animations and scroll effects
 * @fileoverview Services section interactive features
 */

/**
 * Initialize services section animations and interactions
 * Sets up card animations and scroll-triggered effects
 * @function initializeServices
 */
function initializeServices() {
  // Initialize service cards animation
  if (window.AnimationUtils) {
    window.AnimationUtils.initializeCardAnimations('#services .group', 100);
  }
  
  // Initialize scroll animations for headers and buttons in services section
  const animatedElements = document.querySelectorAll('#services .header-animate, #services .button-animate');
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const headerObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          if (entry.target.classList.contains('header-animate')) {
            entry.target.classList.add('header-animate-visible');
          } else if (entry.target.classList.contains('button-animate')) {
            entry.target.classList.add('button-animate-visible');
          }
        }, index * 200);
      }
    });
  }, observerOptions);
  
  animatedElements.forEach(element => {
    headerObserver.observe(element);
  });
}

/**
 * Services functionality namespace
 * Global object containing all service-related functions
 * @namespace Services
 */
window.Services = {
  initializeServices
};