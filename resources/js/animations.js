/**
 * Animation utilities and scroll animations for portfolio website
 * Provides intersection observer-based animations and UI effects
 * @fileoverview Animation system for portfolio components
 */

/**
 * Initialize scroll-triggered animations for headers and buttons
 * Uses IntersectionObserver to trigger animations when elements enter viewport
 * @function initializeScrollAnimations
 */
function initializeScrollAnimations() {
  const animatedElements = document.querySelectorAll('.header-animate, .button-animate, .tab-animate');
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          if (entry.target.classList.contains('header-animate')) {
            entry.target.classList.add('header-animate-visible');
          } else if (entry.target.classList.contains('button-animate')) {
            entry.target.classList.add('button-animate-visible');
          } else if (entry.target.classList.contains('tab-animate')) {
            entry.target.classList.add('tab-animate-visible');
          }
        }, index * 100);
      }
    });
  }, observerOptions);
  
  animatedElements.forEach(element => {
    observer.observe(element);
  });
}

/**
 * Initialize card animations with intersection observer
 * Animates cards when they enter the viewport with staggered delays
 * @param {string} selector - CSS selector for cards to animate
 * @param {number} [delay=100] - Delay between card animations in milliseconds
 */
function initializeCardAnimations(selector, delay = 100) {
  const cards = document.querySelectorAll(selector);
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          if (entry.target.style.opacity !== undefined) {
            // For inline style animations
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          } else {
            // For CSS class animations
            entry.target.classList.remove('portfolio-card-initial');
            entry.target.classList.add('portfolio-card-visible');
          }
        }, index * delay);
      }
    });
  }, observerOptions);
  
  cards.forEach(card => {
    if (selector.includes('service')) {
      // Services cards use inline styles
      card.style.opacity = '0';
      card.style.transform = 'translateY(30px)';
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    } else {
      // Portfolio cards use CSS classes
      card.classList.add('portfolio-card-initial');
    }
    observer.observe(card);
  });
}

/**
 * Add staggered animation delays to elements
 * Applies incremental animation delays to create a wave effect
 * @param {string} selector - CSS selector for elements to animate
 * @param {string} [animationClass='animate-fade-in'] - CSS class to add for animation
 */
function addStaggerAnimation(selector, animationClass = 'animate-fade-in') {
  const elements = document.querySelectorAll(selector);
  
  elements.forEach((element, index) => {
    element.style.animationDelay = `${index * 0.1}s`;
    element.classList.add(animationClass);
  });
}

/**
 * Add interactive hover effects to card elements
 * Applies transform effects on mouse enter/leave events
 * @param {string} selector - CSS selector for cards to add hover effects
 */
function addCardHoverEffects(selector) {
  const cards = document.querySelectorAll(selector);
  
  cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-5px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });
}

/**
 * Animation utilities namespace
 * Global object containing all animation-related functions
 * @namespace AnimationUtils
 */
window.AnimationUtils = {
  initializeScrollAnimations,
  initializeCardAnimations,
  addStaggerAnimation,
  addCardHoverEffects
};