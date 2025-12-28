/**
 * Portfolio section functionality
 * Handles tab navigation, project filtering, and animations
 * @fileoverview Portfolio section interactive features
 */

/**
 * Switch between different portfolio sections (projects, tech stack, certifications)
 * Manages tab states and section visibility with animations
 * @param {string} sectionName - Name of the section to display
 */
function showSection(sectionName) {
  // Hide all sections
  const sections = document.querySelectorAll('.portfolio-section');
  sections.forEach(section => {
    section.classList.add('hidden');
    section.classList.remove('portfolio-section-active');
    section.classList.add('portfolio-section-hidden');
  });

  // Remove active class from all tabs
  const tabs = document.querySelectorAll('.portfolio-tab');
  tabs.forEach(tab => {
    tab.classList.remove('portfolio-tab-active');
  });

  // Show selected section
  const targetSection = document.getElementById(sectionName + '-section');
  if (targetSection) {
    targetSection.classList.remove('hidden', 'portfolio-section-hidden');
    targetSection.classList.add('portfolio-section-active');
    
    // Initialize animations for projects section
    if (sectionName === 'projects') {
      setTimeout(() => {
        initializeProjectAnimations();
      }, 100);
    }
  }

  // Add active class to selected tab
  const targetTab = document.getElementById(sectionName + '-tab');
  if (targetTab) {
    targetTab.classList.add('portfolio-tab-active');
  }
}

/**
 * Toggle visibility of additional projects
 * Shows/hides extra project items and updates button text
 * @function toggleProjects
 */
function toggleProjects() {
  const hiddenProjects = document.querySelectorAll('.project-item.hidden');
  const showMoreBtn = document.getElementById('projects-show-more');
  
  if (hiddenProjects.length > 0) {
    hiddenProjects.forEach(project => {
      project.classList.remove('hidden');
    });
    showMoreBtn.innerHTML = `
      <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
      </svg>
      Show Less Projects
    `;
  } else {
    const allProjects = document.querySelectorAll('.project-item');
    allProjects.forEach(project => {
      project.classList.add('hidden');
    });
    showMoreBtn.innerHTML = `
      <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Show More Projects
    `;
  }
}

/**
 * Toggle visibility of additional certifications
 * Shows/hides extra certification items and updates button text
 * @function toggleCertifications
 */
function toggleCertifications() {
  const hiddenCerts = document.querySelectorAll('.cert-item.hidden');
  const showMoreBtn = document.getElementById('certifications-show-more');
  
  if (hiddenCerts.length > 0) {
    hiddenCerts.forEach(cert => {
      cert.classList.remove('hidden');
    });
    showMoreBtn.innerHTML = `
      <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
      </svg>
      Show Less Certifications
    `;
  } else {
    const allCerts = document.querySelectorAll('.cert-item');
    allCerts.forEach(cert => {
      cert.classList.add('hidden');
    });
    showMoreBtn.innerHTML = `
      <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Show More Certifications
    `;
  }
}

/**
 * Initialize animations for project cards
 * Sets up intersection observer for project card entrance animations
 * @function initializeProjectAnimations
 */
function initializeProjectAnimations() {
  const projectCards = document.querySelectorAll('#projects-section .project-card');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const delay = entry.target.getAttribute('data-aos-delay') || 0;
        setTimeout(() => {
          entry.target.classList.remove('portfolio-card-initial');
          entry.target.classList.add('portfolio-card-visible');
        }, delay);
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  projectCards.forEach(card => {
    observer.observe(card);
  });
}

/**
 * Initialize portfolio section functionality
 * Sets up default section, animations, and interactive elements
 * @function initializePortfolio
 */
function initializePortfolio() {
  // Show projects by default
  showSection('projects');
  
  // Initialize animations
  initializeProjectAnimations();
  
  // Initialize tech items animation
  if (window.AnimationUtils) {
    window.AnimationUtils.addStaggerAnimation('.tech-item');
    window.AnimationUtils.addCardHoverEffects('.project-card');
    window.AnimationUtils.initializeCardAnimations('.cert-card');
  }
}

/**
 * Portfolio functionality namespace
 * Global object containing all portfolio-related functions
 * @namespace Portfolio
 */
window.Portfolio = {
  showSection,
  toggleProjects,
  toggleCertifications,
  initializeProjectAnimations,
  initializePortfolio
};