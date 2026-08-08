/**
 * 8-bit Portfolio Animation System
 * Handles sequential HP/EXP and Skill block bar filling on scroll,
 * typewriter effects, and card reveal animations.
 */

// Initialize IntersectionObserver for block bar sequential filling
function initializeBlockBarAnimations() {
  const blockBars = document.querySelectorAll('.block-bar');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const units = entry.target.querySelectorAll('.block-unit.animate-fill');
        units.forEach((unit, index) => {
          setTimeout(() => {
            unit.classList.add('filled');
          }, index * 80); // Sequential 80ms delay per pixel block unit
        });
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  blockBars.forEach(bar => observer.observe(bar));
}

// Scroll-triggered section header & card animations
function initializeScrollAnimations() {
  const elements = document.querySelectorAll('.header-animate, .fade-in-up');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('header-animate-visible', 'visible');
        }, index * 120);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  
  elements.forEach(el => observer.observe(el));
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
  initializeBlockBarAnimations();
  initializeScrollAnimations();
});