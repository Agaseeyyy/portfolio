<?php
/**
 * Retro Gaming Navigation Bar - 8-bit RPG Style
 * Scaled up header matching mockup proportions
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
<nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0f24]/90 border-b-4 border-[#8b7355] backdrop-blur-md">
  <div class="max-w-7xl mx-auto px-6 py-4.5 flex items-center justify-between">
    <!-- Brand / Player Name & Level with larger me.png icon -->
    <a href="<?= base_url('/') ?>" class="flex items-center gap-4.5 no-underline group">
      <div class="w-16 h-16 border-3 border-[#c8a951] bg-[#11162a] overflow-hidden flex-shrink-0 p-1 shadow-lg">
        <img src="<?= base_url('images/me.png') ?>" alt="Avatar" class="w-full h-full object-cover">
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

    <!-- Nav Links (Desktop) -->
    <div class="hidden md:flex items-center gap-10" id="nav-menu">
      <a href="<?= base_url('/') ?>#home" class="text-[#f0c040] hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">HOME</a>
      <a href="<?= base_url('/') ?>#quest-log" class="text-white hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">QUEST LOG</a>
      <a href="<?= base_url('/') ?>#inventory" class="text-white hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">INVENTORY</a>
      <a href="<?= base_url('/') ?>#contacts" class="text-white hover:text-[#f0c040] text-[12.5px] uppercase tracking-widest no-underline transition-colors font-bold">CONTACT</a>
    </div>

    <!-- Right Side: Moon Icon Box -->
    <div class="flex items-center gap-4">
      <div class="w-14 h-14 border-3 border-[#c8a951] bg-[#11162a] flex items-center justify-center text-xl shadow-md cursor-pointer hover:border-white transition-colors" title="Night Mode">
        🌙
      </div>

      <!-- Mobile Hamburger Button -->
      <button class="md:hidden flex flex-col gap-1.5 p-3 border-2 border-[#8b7355] bg-[#11162a] cursor-pointer" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')">
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
      </button>
    </div>
  </div>

  <!-- Mobile Dropdown Menu -->
  <div id="mobile-nav" class="hidden md:hidden border-t-2 border-[#8b7355] bg-[#0a0f24] px-6 py-5 flex flex-col gap-4">
    <a href="<?= base_url('/') ?>#home" class="text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">HOME</a>
    <a href="<?= base_url('/') ?>#quest-log" class="text-white hover:text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">QUEST LOG</a>
    <a href="<?= base_url('/') ?>#inventory" class="text-white hover:text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">INVENTORY</a>
    <a href="<?= base_url('/') ?>#contacts" class="text-white hover:text-[#f0c040] text-xs uppercase tracking-wider no-underline" onclick="document.getElementById('mobile-nav').classList.add('hidden')">CONTACT</a>
  </div>
</nav>