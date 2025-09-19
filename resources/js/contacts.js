/**
 * Contacts section functionality
 */

// Mock authentication state (in real app, this would be managed by your auth system)
let isAuthenticated = false;
let currentUser = null;

// Chat Modal Functions (keeping for compatibility)
function openChatModal() {
  const modal = document.getElementById('chatModal');
  if (modal) {
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
}

function closeChatModal() {
  const modal = document.getElementById('chatModal');
  if (modal) {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
}

// GitHub OAuth Login
function loginWithGitHub() {
  // Replace with your actual GitHub OAuth app client ID
  const clientId = 'YOUR_GITHUB_CLIENT_ID';
  const redirectUri = encodeURIComponent(window.location.origin + '/auth/callback');
  const scope = 'user:email';
  
  const authUrl = `https://github.com/login/oauth/authorize?client_id=${clientId}&redirect_uri=${redirectUri}&scope=${scope}`;
  
  // For demo purposes, simulate successful authentication after a delay
  alert('Redirecting to GitHub for authentication...\n\nFor demo purposes, this will simulate a successful login.');
  
  setTimeout(() => {
    simulateSuccessfulAuth();
  }, 2000);
  
  // In production, use: window.location.href = authUrl;
}

// Simulate successful authentication (for demo)
function simulateSuccessfulAuth() {
  isAuthenticated = true;
  currentUser = {
    username: 'visitor' + Math.floor(Math.random() * 1000),
    avatar: 'https://avatars.githubusercontent.com/u/' + Math.floor(Math.random() * 100000000)
  };
  
  updateAuthenticationUI();
  alert('Successfully authenticated with GitHub!\nYou can now chat and leave comments.');
}

// Update UI based on authentication state
function updateAuthenticationUI() {
  const chatAuthRequired = document.getElementById('chatAuthRequired');
  const chatInputArea = document.getElementById('chatInputArea');
  const chatInput = document.getElementById('chatInput');
  const commentsAuthRequired = document.getElementById('commentsAuthRequired');
  const commentForm = document.getElementById('commentForm');
  const commentName = document.getElementById('commentName');
  const commentText = document.getElementById('commentText');
  
  if (isAuthenticated) {
    // Hide auth required messages
    if (chatAuthRequired) chatAuthRequired.style.display = 'none';
    if (commentsAuthRequired) commentsAuthRequired.style.display = 'none';
    
    // Enable chat input
    if (chatInputArea) {
      chatInputArea.classList.remove('opacity-50', 'pointer-events-none');
      chatInput.disabled = false;
      chatInput.placeholder = 'Type a message...';
      
      const chatButton = chatInputArea.querySelector('button');
      if (chatButton) {
        chatButton.disabled = false;
        chatButton.classList.remove('bg-gradient-to-r', 'from-gray-500/90', 'to-gray-600/90');
        chatButton.classList.add('bg-gradient-to-r', 'from-pink-500/90', 'to-rose-600/90', 'hover:from-pink-600', 'hover:to-rose-700', 'hover:scale-105');
        chatButton.onclick = () => window.Contacts.sendMessage();
      }
    }
    
    // Enable comment form
    if (commentForm) {
      commentForm.classList.remove('opacity-50', 'pointer-events-none');
      commentName.disabled = false;
      commentName.placeholder = `@${currentUser.username}`;
      commentName.value = currentUser.username;
      commentText.disabled = false;
      commentText.placeholder = 'Share your thoughts...';
      
      const commentButton = commentForm.querySelector('button');
      if (commentButton) {
        commentButton.disabled = false;
        commentButton.classList.remove('bg-gradient-to-r', 'from-gray-500/90', 'to-gray-600/90');
        commentButton.classList.add('bg-gradient-to-r', 'from-pink-500/90', 'to-rose-600/90', 'hover:from-pink-600', 'hover:to-rose-700', 'hover:scale-105');
        commentButton.onclick = () => window.Contacts.addComment();
      }
    }
  }
}

// Chat functionality
function sendMessage() {
  if (!isAuthenticated) {
    alert('Please login with GitHub first to send messages.');
    return;
  }
  
  const chatInput = document.getElementById('chatInput');
  if (!chatInput || !chatInput.value.trim()) return;
  
  const message = chatInput.value.trim();
  const chatContainer = document.getElementById('chatMessages');
  
  if (chatContainer) {
    // Create new message element
    const messageElement = document.createElement('div');
    messageElement.className = 'flex items-start gap-2';
    messageElement.innerHTML = `
      <div class="w-6 h-6 bg-green-500 rounded-full flex-shrink-0"></div>
      <div class="flex-1">
        <div class="text-xs text-gray-400">@${currentUser.username} • now</div>
        <div class="text-sm text-white">${message}</div>
      </div>
    `;
    
    chatContainer.appendChild(messageElement);
    chatInput.value = '';
    
    // Scroll to bottom
    const scrollContainer = chatContainer.parentElement;
    scrollContainer.scrollTop = scrollContainer.scrollHeight;
    
    // Auto-response simulation
    setTimeout(() => {
      const responseElement = document.createElement('div');
      responseElement.className = 'flex items-start gap-2';
      responseElement.innerHTML = `
        <div class="w-6 h-6 bg-pink-500 rounded-full flex-shrink-0"></div>
        <div class="flex-1">
          <div class="text-xs text-gray-400">Agassi • now</div>
          <div class="text-sm text-white">Thanks for your message! I'll get back to you soon.</div>
        </div>
      `;
      chatContainer.appendChild(responseElement);
      scrollContainer.scrollTop = scrollContainer.scrollHeight;
    }, 1000);
  }
}

// Comments functionality
function addComment() {
  if (!isAuthenticated) {
    alert('Please login with GitHub first to leave comments.');
    return;
  }
  
  const nameInput = document.getElementById('commentName');
  const textInput = document.getElementById('commentText');
  const commentsList = document.getElementById('commentsList');
  
  if (!nameInput || !textInput || !commentsList) return;
  
  const name = nameInput.value.trim() || currentUser.username;
  const text = textInput.value.trim();
  
  if (!text) {
    alert('Please write a comment before posting.');
    return;
  }
  
  // Create new comment element
  const commentElement = document.createElement('div');
  commentElement.className = 'p-3 border rounded-lg bg-white/5 border-white/10';
  commentElement.innerHTML = `
    <div class="flex items-center justify-between mb-1">
      <span class="text-sm font-medium text-white">@${name}</span>
      <span class="text-xs text-gray-400">just now</span>
    </div>
    <p class="text-sm text-gray-300">${text}</p>
  `;
  
  // Insert at the beginning of comments list
  commentsList.insertBefore(commentElement, commentsList.firstChild);
  
  // Clear text input
  textInput.value = '';
  
  // Show success message
  const button = event.target;
  const originalText = button.textContent;
  button.textContent = 'Posted!';
  button.classList.add('bg-green-500/90');
  
  setTimeout(() => {
    button.textContent = originalText;
    button.classList.remove('bg-green-500/90');
  }, 2000);
}

// Initialize contacts animations
function initializeContacts() {
  // Initialize contact form validation
  const contactForm = document.querySelector('#contacts form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;
      
      // Create mailto link with form data
      const mailtoLink = `mailto:bustargaagassi1018@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(`From: ${name} (${email})\n\n${message}`)}`;
      window.location.href = mailtoLink;
      
      e.preventDefault();
    });
  }

  // Add Enter key support for chat
  const chatInput = document.getElementById('chatInput');
  if (chatInput) {
    chatInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        if (isAuthenticated) {
          sendMessage();
        }
      }
    });
  }

  // Add Enter key support for comments (Ctrl+Enter or Shift+Enter)
  const commentText = document.getElementById('commentText');
  if (commentText) {
    commentText.addEventListener('keypress', function(e) {
      if (e.key === 'Enter' && (e.ctrlKey || e.shiftKey)) {
        e.preventDefault();
        if (isAuthenticated) {
          addComment();
        }
      }
    });
  }

  // Initialize contact cards animation
  if (window.AnimationUtils) {
    // Add stagger animation to social media buttons
    window.AnimationUtils.addStaggerAnimation('#contacts .grid a', 'animate-fade-in');
  }
  
  // Check for existing authentication (in real app, check with server)
  // For demo, user starts as unauthenticated
  updateAuthenticationUI();
}

// Export functions for global use
window.Contacts = {
  openChatModal,
  closeChatModal,
  loginWithGitHub,
  sendMessage,
  addComment,
  initializeContacts,
  simulateSuccessfulAuth
};