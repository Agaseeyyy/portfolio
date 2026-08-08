/**
 * 8-bit Portfolio Utility Script
 * Handles mobile nav toggle and smooth scrolling
 */
document.addEventListener('DOMContentLoaded', function() {
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href === '#') return;
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        // Close mobile menu if open
        const navMenu = document.getElementById('nav-menu');
        if (navMenu) navMenu.classList.remove('active');
      }
    });
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', function(e) {
    const navMenu = document.getElementById('nav-menu');
    const hamburger = document.getElementById('hamburger-toggle');
    if (navMenu && navMenu.classList.contains('active')) {
      if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
        navMenu.classList.remove('active');
      }
    }
  });
});