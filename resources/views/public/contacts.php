<?php
/**
 * Contact Section - 8-bit RPG Style
 * 
 * @var array $contact - Contact data from database
 */
$email = $contact['email'] ?? 'bustargaagassi1018@gmail.com';
?>
<section id="contacts" class="max-w-5xl mx-auto px-4 py-8">
    <div class="rpg-header">
        <span>✉️</span>
        <span>CONTACT</span>
        <span class="sub-text">(SEND MESSAGE)</span>
    </div>

    <div class="nes-container is-dark" style="padding: 1.5rem;">
        <form action="mailto:<?= htmlspecialchars($email) ?>" method="post" enctype="text/plain" class="max-w-2xl mx-auto flex flex-col gap-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label class="text-[#f0c040] text-[8px]">YOUR NAME</label>
                    <input type="text" name="name" required class="bg-[#0d0f18] border-2 border-[#8b7355] text-white text-[8px] p-2 focus:border-[#f0c040] outline-none">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[#f0c040] text-[8px]">YOUR EMAIL</label>
                    <input type="email" name="email" required class="bg-[#0d0f18] border-2 border-[#8b7355] text-white text-[8px] p-2 focus:border-[#f0c040] outline-none">
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[#f0c040] text-[8px]">MESSAGE</label>
                <textarea name="message" rows="3" required class="bg-[#0d0f18] border-2 border-[#8b7355] text-white text-[8px] p-2 focus:border-[#f0c040] outline-none resize-none"></textarea>
            </div>

            <button type="submit" class="golden-btn self-center mt-2">
                &gt; TRANSMIT MESSAGE
            </button>
        </form>
    </div>
</section>