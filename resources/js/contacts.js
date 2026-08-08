/**
 * Contacts / Message Board functionality
 * Simplified for the 8-bit retro RPG theme
 * @fileoverview Contact form interactions
 */

function initializeContacts() {
  const contactForm = document.querySelector('#contacts form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      const name = contactForm.querySelector('[name="name"]');
      const email = contactForm.querySelector('[name="email"]');
      const subject = contactForm.querySelector('[name="subject"]');
      const message = contactForm.querySelector('[name="message"]');
      
      if (name && email && subject && message) {
        const mailtoLink = `mailto:${contactForm.action.replace('mailto:', '')}?subject=${encodeURIComponent(subject.value)}&body=${encodeURIComponent(`From: ${name.value} (${email.value})\n\n${message.value}`)}`;
        window.location.href = mailtoLink;
        e.preventDefault();
      }
    });
  }
}

window.Contacts = {
  initializeContacts
};

document.addEventListener('DOMContentLoaded', initializeContacts);