/**
 * Services section functionality
 */

// Initialize services animations
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

// Export functions for global use
window.Services = {
  initializeServices
};