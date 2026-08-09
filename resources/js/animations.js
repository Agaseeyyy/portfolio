/**
 * 8-bit Portfolio Animation System
 * Handles sequential HP/EXP and Skill block bar filling on scroll & HTMX SPA navigation,
 * typewriter effects, and card reveal animations.
 */

// Initialize IntersectionObserver for sequential 0% -> target block bar filling on scroll
function initializeBlockBarAnimations() {
  const blockBars = document.querySelectorAll('.block-bar:not(#dungeon-loading-segmented-bar)');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const units = entry.target.querySelectorAll('.block-unit[data-target="true"]');
        units.forEach((unit, index) => {
          const fillClass = unit.getAttribute('data-fill-class') || 'filled-skill';
          setTimeout(() => {
            unit.classList.add(fillClass);
          }, index * 55);
        });
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

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