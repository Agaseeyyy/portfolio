/**
 * 8-Bit Web Audio Synthesizer & RPG FX System with Custom Speaker PNG Toggle
 * Pure browser Web Audio API - Zero external audio assets required.
 */

class RPGAudioSystem {
  constructor() {
    this.audioCtx = null;
    this.muted = false;
    this.init();
  }

  init() {
    const savedMute = localStorage.getItem('rpg_audio_muted');
    this.muted = savedMute === 'true';
  }

  getAudioContext() {
    if (!this.audioCtx) {
      const AudioCtx = window.AudioContext || window.webkitAudioContext;
      if (AudioCtx) {
        this.audioCtx = new AudioCtx();
      }
    }
    if (this.audioCtx && this.audioCtx.state === 'suspended') {
      this.audioCtx.resume();
    }
    return this.audioCtx;
  }

  toggleMute() {
    this.muted = !this.muted;
    localStorage.setItem('rpg_audio_muted', this.muted);
    return this.muted;
  }

  // Play a simple 8-bit square wave tone
  playTone(freq, type = 'square', duration = 0.08, volume = 0.15) {
    if (this.muted) return;
    try {
      const ctx = this.getAudioContext();
      if (!ctx) return;

      const osc = ctx.createOscillator();
      const gain = ctx.createGain();

      osc.type = type;
      osc.frequency.setValueAtTime(freq, ctx.currentTime);

      gain.gain.setValueAtTime(volume, ctx.currentTime);
      gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + duration);

      osc.connect(gain);
      gain.connect(ctx.destination);

      osc.start();
      osc.stop(ctx.currentTime + duration);
    } catch (e) {
      // Audio context error fallback
    }
  }

  // 8-Bit Hover Blip (Short high click)
  playHoverBlip() {
    this.playTone(520, 'square', 0.04, 0.08);
  }

  // 8-Bit Click / Select Sound (Ascending 2-tone)
  playSelectSound() {
    if (this.muted) return;
    this.playTone(600, 'square', 0.05, 0.12);
    setTimeout(() => this.playTone(850, 'square', 0.06, 0.12), 40);
  }

  // 8-Bit Quest Start Fanfare (4-note arpeggio)
  playQuestFanfare() {
    if (this.muted) return;
    const notes = [523.25, 659.25, 783.99, 1046.50]; // C5, E5, G5, C6
    notes.forEach((freq, idx) => {
      setTimeout(() => this.playTone(freq, 'square', 0.12, 0.18), idx * 80);
    });
  }

  // 8-Bit Level Up / EXP Chime
  playLevelUpSound() {
    if (this.muted) return;
    const notes = [440, 554.37, 659.25, 880]; // A4, C#5, E5, A5
    notes.forEach((freq, idx) => {
      setTimeout(() => this.playTone(freq, 'triangle', 0.1, 0.15), idx * 60);
    });
  }
}

// Global RPG Audio Instance
window.rpgAudio = new RPGAudioSystem();

// Interactive RPG Effects System (Popups, Particles, Toasts)
function initializeRPGFX() {
  const audio = window.rpgAudio;

  // Run 8-Bit Loading Progress Sequence
  runDungeonLoadingAnimation();

  // Sync speaker icon mute state on load
  const img = document.getElementById('speaker-icon-img');
  if (img && audio.muted) {
    img.style.filter = 'grayscale(1) opacity(0.35)';
  }

  // 1. Audio Hover & Click Listeners
  document.querySelectorAll('a, button, .nes-btn, .golden-btn, .quest-card-item, .stat-row-item, .social-icon-box').forEach(el => {
    el.addEventListener('mouseenter', () => audio.playHoverBlip());
    el.addEventListener('click', (e) => {
      if (el.classList.contains('golden-btn')) {
        audio.playQuestFanfare();
      } else {
        audio.playSelectSound();
      }
    });
  });

  // 2. Floating RPG Text Popups on clicking stats & skills
  const expTexts = ['+100 EXP!', 'LEVEL UP!', 'CRITICAL HIT!', 'SKILL MASTERED!', 'ITEM EQUIPPED!'];
  document.querySelectorAll('.stat-row-item, .block-bar, #about img').forEach(el => {
    el.style.cursor = 'pointer';
    el.addEventListener('click', (e) => {
      audio.playLevelUpSound();
      const text = expTexts[Math.floor(Math.random() * expTexts.length)];
      spawnRPGFloatingText(e.pageX, e.pageY, text);
    });
  });

  // 3. Interactive Pixel Star Cursor Trail
  let lastParticleTime = 0;
  document.addEventListener('mousemove', (e) => {
    const now = Date.now();
    if (now - lastParticleTime > 65) {
      lastParticleTime = now;
      spawnPixelTrailParticle(e.pageX, e.pageY);
    }
  });

  // 4. RPG Quest Toast Notification
  document.querySelectorAll('.quest-card-item').forEach(card => {
    card.addEventListener('click', (e) => {
      const titleEl = card.querySelector('h3 span');
      const title = titleEl ? titleEl.textContent.trim() : 'QUEST';
      showRPGToast(`[ 📜 QUEST ACCEPTED: ${title} ]`);
    });
  });
}

// Run 8-Bit Dungeon Loading Progress Bar Animation
function runDungeonLoadingAnimation() {
  const loadingOverlay = document.getElementById('dungeon-loading-overlay');
  const entranceModal = document.getElementById('dungeon-entrance-modal');
  const fillBar = document.getElementById('dungeon-loading-bar-fill');
  const subtext = document.getElementById('dungeon-loading-subtext');

  if (!loadingOverlay) return;

  const entered = sessionStorage.getItem('dungeon_entered');
  if (entered === 'true') {
    loadingOverlay.style.display = 'none';
    if (entranceModal) entranceModal.style.display = 'none';
    return;
  }

  const steps = [
    { pct: 25, text: 'INITIALIZING 8-BIT SYNTHESIZERS...' },
    { pct: 50, text: 'EQUIPPING WEAPONS & MAGIC...' },
    { pct: 80, text: 'SUMMONING PIXEL SKYLINE...' },
    { pct: 100, text: 'DUNGEON READY!' }
  ];

  let currentStep = 0;
  const interval = setInterval(() => {
    if (currentStep < steps.length) {
      const step = steps[currentStep];
      if (fillBar) fillBar.style.width = `${step.pct}%`;
      if (subtext) subtext.textContent = step.text;
      if (window.rpgAudio) window.rpgAudio.playHoverBlip();
      currentStep++;
    } else {
      clearInterval(interval);
      setTimeout(() => {
        loadingOverlay.classList.add('fade-out');
        setTimeout(() => {
          loadingOverlay.style.display = 'none';
          if (entranceModal) {
            entranceModal.style.display = 'flex';
          }
        }, 450);
      }, 250);
    }
  }, 300);
}

// Enter Dungeon Trigger Function
function enterDungeon() {
  const overlay = document.getElementById('dungeon-entrance-modal');
  if (overlay) {
    if (window.rpgAudio) {
      window.rpgAudio.playQuestFanfare();
    }
    spawnRPGFloatingText(window.innerWidth / 2, window.innerHeight / 2, '+100 EXP! DUNGEON ENTERED!');
    overlay.classList.add('fade-out');
    sessionStorage.setItem('dungeon_entered', 'true');
    setTimeout(() => {
      overlay.style.display = 'none';
    }, 600);
  }
}

// Spawn floating RPG text popup (+100 EXP!)
function spawnRPGFloatingText(x, y, text) {
  const popup = document.createElement('div');
  popup.className = 'rpg-floating-text';
  popup.textContent = text;
  popup.style.left = `${x - 40}px`;
  popup.style.top = `${y - 20}px`;
  document.body.appendChild(popup);

  setTimeout(() => {
    if (popup.parentNode) popup.parentNode.removeChild(popup);
  }, 1000);
}

// Spawn pixel star particle trail
function spawnPixelTrailParticle(x, y) {
  const p = document.createElement('div');
  p.className = 'pixel-cursor-particle';
  const size = Math.random() > 0.5 ? 4 : 3;
  const colors = ['#f0c040', '#ffffff', '#ffaa00', '#55ffff'];
  const color = colors[Math.floor(Math.random() * colors.length)];

  p.style.width = `${size}px`;
  p.style.height = `${size}px`;
  p.style.left = `${x + (Math.random() * 12 - 6)}px`;
  p.style.top = `${y + (Math.random() * 12 - 6)}px`;
  p.style.backgroundColor = color;
  p.style.boxShadow = `0 0 6px ${color}`;

  document.body.appendChild(p);

  setTimeout(() => {
    if (p.parentNode) p.parentNode.removeChild(p);
  }, 500);
}

// Show retro RPG NES Toast Notification
function showRPGToast(message) {
  let toast = document.getElementById('rpg-toast-notification');
  if (!toast) {
    toast = document.createElement('div');
    toast.id = 'rpg-toast-notification';
    toast.className = 'rpg-toast-box';
    document.body.appendChild(toast);
  }

  toast.textContent = message;
  toast.classList.add('show');

  if (window.toastTimer) clearTimeout(window.toastTimer);
  window.toastTimer = setTimeout(() => {
    toast.classList.remove('show');
  }, 2400);
}

// Toggle Audio Function for HTML Button with Custom Speaker PNG Icon
function toggleRPGAudio() {
  const isMuted = window.rpgAudio.toggleMute();
  const img = document.getElementById('speaker-icon-img');
  if (img) {
    if (isMuted) {
      img.style.filter = 'grayscale(1) opacity(0.35)';
      img.title = 'Enable Audio';
    } else {
      img.style.filter = 'none';
      img.title = 'Mute Audio';
    }
  }
}

// HTMX SPA Re-initialization Listener
document.addEventListener('htmx:afterSwap', function() {
  initializeRPGFX();
  if (window.rpgAudio) window.rpgAudio.playSelectSound();
});

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
  initializeRPGFX();
});
