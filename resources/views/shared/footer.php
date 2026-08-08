<?php
/**
 * Save Point Footer - 8-bit RPG Style
 * Features larger white social icon boxes (GitHub, LinkedIn, Email) with thick 4px borders
 */
use app\core\View;
$data = View::getData();
$home = $data['home'] ?? [];
$contact = $data['contact'] ?? [];

$fullName = strtoupper(($home['name'] ?? 'CODEWIZARD'));
$github = $contact['github_link'] ?? 'https://github.com/agaseeyyy';
$linkedin = $contact['linkedin_link'] ?? 'https://linkedin.com';
$email = $contact['email'] ?? 'bustargaagassi1018@gmail.com';
?>
<footer id="contacts" class="footer-save-point">
  <!-- Fire Pillar Left (Base Stone + Animated Swaying Flame + Animated Swaying Grass + Rising Embers) -->
  <div class="fire-pillar-wrapper fire-left">
    <img src="<?= base_url('images/fire-pillar-base.png') ?>" alt="" class="fire-base-img">
    <img src="<?= base_url('images/flame-only.png') ?>" alt="" class="flame-tip-img">
    <img src="<?= base_url('images/grass-two.png') ?>" alt="" class="grass-tuft-img">
    
    <!-- Fire Particle Embers Left -->
    <div class="flame-ember ember-l w-1.5 h-1.5" style="left: 18%; top: 15%; animation-delay: 0.1s;"></div>
    <div class="flame-ember ember-r w-1 h-1" style="left: 21%; top: 10%; animation-delay: 0.6s;"></div>
    <div class="flame-ember ember-l w-2 h-2" style="left: 16%; top: 18%; animation-delay: 1.1s;"></div>
    <div class="flame-ember ember-r w-1.5 h-1.5" style="left: 23%; top: 12%; animation-delay: 1.6s;"></div>
    <div class="flame-ember ember-l w-1 h-1" style="left: 19%; top: 22%; animation-delay: 2.1s;"></div>
  </div>

  <!-- Fire Pillar Right (Base Stone + Animated Swaying Flame + Animated Swaying Grass + Rising Embers) -->
  <div class="fire-pillar-wrapper fire-right">
    <img src="<?= base_url('images/fire-pillar-base.png') ?>" alt="" class="fire-base-img">
    <img src="<?= base_url('images/flame-only.png') ?>" alt="" class="flame-tip-img">
    <img src="<?= base_url('images/grass-two.png') ?>" alt="" class="grass-tuft-img">

    <!-- Fire Particle Embers Right -->
    <div class="flame-ember ember-r w-1.5 h-1.5" style="left: 18%; top: 15%; animation-delay: 0.3s;"></div>
    <div class="flame-ember ember-l w-1 h-1" style="left: 22%; top: 10%; animation-delay: 0.8s;"></div>
    <div class="flame-ember ember-r w-2 h-2" style="left: 16%; top: 18%; animation-delay: 1.3s;"></div>
    <div class="flame-ember ember-l w-1.5 h-1.5" style="left: 23%; top: 12%; animation-delay: 1.8s;"></div>
    <div class="flame-ember ember-r w-1 h-1" style="left: 19%; top: 22%; animation-delay: 2.3s;"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto flex flex-col items-center gap-6 px-6">
    
    <!-- Save Point Header with Title Glow -->
    <h3 class="text-[#f0c040] text-sm lg:text-base font-bold tracking-widest uppercase mb-1 rpg-title-glow">
      SAVE POINT
    </h3>

    <!-- Social Link Square Boxes (Enlarged 72px frames & 40px icons - Thick 4px Borders) -->
    <div class="flex items-center justify-center gap-6 my-3">
      <?php if (!empty($github)): ?>
        <a href="<?= htmlspecialchars($github) ?>" target="_blank" class="social-icon-box w-[76px] h-[76px] bg-[#11162a] border-4 border-[#8b7355] flex items-center justify-center text-white no-underline shadow-lg" title="GitHub">
          <svg class="w-10 h-10 fill-current text-white" viewBox="0 0 496 512">
            <path fill="#ffffff" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8z"/>
          </svg>
        </a>
      <?php endif; ?>

      <?php if (!empty($linkedin)): ?>
        <a href="<?= htmlspecialchars($linkedin) ?>" target="_blank" class="social-icon-box w-[76px] h-[76px] bg-[#11162a] border-4 border-[#8b7355] flex items-center justify-center text-white no-underline shadow-lg" title="LinkedIn">
          <svg class="w-10 h-10 fill-current text-white" viewBox="0 0 448 512">
            <path fill="#ffffff" d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
          </svg>
        </a>
      <?php endif; ?>

      <?php if (!empty($email)): ?>
        <a href="mailto:<?= htmlspecialchars($email) ?>" class="social-icon-box w-[76px] h-[76px] bg-[#11162a] border-4 border-[#8b7355] flex items-center justify-center text-white no-underline shadow-lg" title="Email">
          <img src="<?= base_url('icons/mail.png') ?>" alt="Mail Icon" class="w-10 h-10 object-contain image-pixelated">
        </a>
      <?php endif; ?>
    </div>

    <!-- Game Saved Banner Button with Blinking Cursor -->
    <div class="px-8 py-3.5 bg-[#11162a] border-2 border-[#8b7355] text-white text-xs font-bold tracking-wider shadow-md my-2 flex items-center gap-2">
      <span>&gt; GAME SAVED. THANKS FOR VISITING!</span>
      <span class="rpg-cursor-blink text-[#f0c040]">_</span>
    </div>

    <!-- Copyright -->
    <p class="text-[#8a8aa8] text-[9.5px] tracking-wide mt-2">
      © <?= date('Y') ?> <?= htmlspecialchars($fullName) ?>. ALL RIGHTS RESERVED.
    </p>

  </div>
</footer>