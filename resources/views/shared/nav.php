<?php
/**
 * Retro Gaming Navigation Bar - 8-bit RPG Style
 * Enclosed Solid Dark Navy Header Bar Frame with Top & Bottom Gold-Brown Borders and 4 Corner Brackets
 * Includes Custom 8-Bit Speaker Icon (speaker.png) for Audio Sound Effects Toggle
 */
use app\core\View;
$data = View::getData();
$firstName = $data['firstName'] ?? 'Agassi';
$lastName = $data['lastName'] ?? 'Bustarga';
$contact = $data['contact'] ?? [];
$home = $data['home'] ?? [];

$fullName = strtoupper(($home['name'] ?? ($firstName . ' ' . $lastName)));
$roleName = strtoupper(($home['role'] ?? 'DEVELOPER'));
?>
<nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0f24] border-t-2 border-b-2 border-[#8b7355] shadow-lg">
  <!-- 4 Corner Pixel Accents matching mockup header frame -->
  <div class="absolute top-1 left-2 text-[#c8a951] text-[10px] pointer-events-none select-none z-10">┌</div>
  <div class="absolute top-1 right-2 text-[#c8a951] text-[10px] pointer-events-none select-none z-10">┐</div>
  <div class="absolute bottom-1 left-2 text-[#c8a951] text-[10px] pointer-events-none select-none z-10">└</div>
  <div class="absolute bottom-1 right-2 text-[#c8a951] text-[10px] pointer-events-none select-none z-10">┘</div>
  
  <div class="max-w-7xl mx-auto px-6 py-3.5 flex items-center justify-between">
    <!-- Brand / Player Name & Level with RPG double border frame -->
    <a href="<?= base_url('/') ?>" class="flex items-center gap-4.5 no-underline group" hx-boost="true" hx-target="#main-content" hx-swap="innerHTML transition:true" hx-push-url="true">
      <div class="w-16 h-16 rpg-pixel-frame overflow-hidden flex-shrink-0 p-0.5 shadow-lg">
        <img src="<?= base_url('images/me.webp') ?>" alt="Avatar" class="w-full h-full object-cover">
      </div>
      <div class="flex flex-col">
        <span class="text-[#f0c040] text-sm lg:text-[15px] font-bold tracking-wider group-hover:text-white transition-colors">
          <?= htmlspecialchars($fullName) ?>
        </span>
        <span class="text-[#a0a0c0] text-[11px] tracking-tight mt-1 font-normal">
          LVL 5 <?= htmlspecialchars($roleName) ?>
        </span>
      </div>
    </a>

    <!-- Nav Links (Desktop) with HTMX SPA attributes -->
    <div class="hidden md:flex items-center gap-10" id="nav-menu" hx-boost="true" hx-target="#main-content" hx-swap="innerHTML transition:true" hx-push-url="true">
      <a href="<?= base_url('/') ?>#home" class="text-[#f0c040] hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">HOME</a>
      <a href="<?= base_url('/') ?>#quest-log" class="text-white hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">QUEST LOG</a>
      <a href="<?= base_url('/') ?>#inventory" class="text-white hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">INVENTORY</a>
      <a href="<?= base_url('/') ?>#contacts" class="text-white hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">CONTACT</a>
    </div>

    <!-- Right Side: Audio Sound Toggle with Custom speaker.png Icon -->
    <div class="flex items-center gap-3">
      <!-- 8-Bit Audio SFX Toggle Button -->
      <div id="audio-toggle-btn" onclick="toggleRPGAudio()" class="w-14 h-14 rpg-pixel-frame flex items-center justify-center shadow-md cursor-pointer hover:border-white transition-colors p-2.5" title="Toggle 8-Bit Audio SFX">
        <img id="speaker-icon-img" src="<?= base_url('icons/speaker.webp') ?>" alt="Audio Toggle" class="w-full h-full object-contain image-rendering-pixelated">
      </div>

      <!-- Mobile Hamburger Button -->
      <button class="md:hidden flex flex-col gap-1.5 p-3 rpg-pixel-frame cursor-pointer" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')">
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
      </button>
    </div>
  </div>

  <!-- Mobile Dropdown Menu -->
  <div id="mobile-nav" class="hidden md:hidden border-t-2 border-[#8b7355] bg-[#0a0f24] px-6 py-5 flex flex-col gap-4" hx-boost="true" hx-target="#main-content" hx-swap="innerHTML transition:true" hx-push-url="true">
    <a href="<?= base_url('/') ?>#home" class="text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">HOME</a>
    <a href="<?= base_url('/') ?>#quest-log" class="text-white hover:text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">QUEST LOG</a>
    <a href="<?= base_url('/') ?>#inventory" class="text-white hover:text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">INVENTORY</a>
    <a href="<?= base_url('/') ?>#contacts" class="text-white hover:text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">CONTACT</a>
  </div>
</nav>