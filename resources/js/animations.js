/**
 * 8-bit Portfolio Animation System
 * Handles sequential HP/EXP and Skill block bar filling on scroll & HTMX SPA navigation,
 * typewriter effects, and card reveal animations.
 */

// Initialize IntersectionObserver for block bar sequential filling
function initializeBlockBarAnimations() {
  const blockBars = document.querySelectorAll('.block-bar');

  blockBars.forEach(bar => {
    // If elements are already visible in viewport (or swapped via HTMX/back button), fill immediately
    const units = bar.querySelectorAll('.block-unit');
    units.forEach((unit, index) => {
      if (unit.classList.contains('filled-hp') || unit.classList.contains('filled-exp') || unit.classList.contains('filled-skill')) {
        setTimeout(() => {
          unit.classList.add('filled');
          unit.style.opacity = '1';
        }, index * 40);
      }
    });
  });
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const units = entry.target.querySelectorAll('.block-unit');
        units.forEach((unit, index) => {
          if (unit.classList.contains('filled-hp') || unit.classList.contains('filled-exp') || unit.classList.contains('filled-skill')) {
            setTimeout(() => {
              unit.classList.add('filled');
              unit.style.opacity = '1';
            }, index * 40);
          }
        });
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

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
        }, index * 80);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  
  elements.forEach(el => observer.observe(el));
}

// Global initialization function
function runPortfolioAnimations() {
  initializeBlockBarAnimations();
  initializeScrollAnimations();
}

// Listen for HTMX SPA swaps & browser back/forward navigation
document.addEventListener('htmx:afterSwap', runPortfolioAnimations);
window.addEventListener('popstate', runPortfolioAnimations);
window.addEventListener('pageshow', runPortfolioAnimations);

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', runPortfolioAnimations);