/**
 * Main application initialization
 */

// Initialize the entire application
document.addEventListener('DOMContentLoaded', function() {
  // Initialize global scroll animations
  if (window.AnimationUtils) {
    window.AnimationUtils.initializeScrollAnimations();
  }
  
  // Initialize portfolio section
  if (window.Portfolio) {
    window.Portfolio.initializePortfolio();
  }
  
  // Initialize services section
  if (window.Services) {
    window.Services.initializeServices();
  }
  
  // Initialize contacts section
  if (window.Contacts) {
    window.Contacts.initializeContacts();
  }
  
  console.log('Portfolio application initialized successfully!');
});