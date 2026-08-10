<!-- Starry Pixel Night Background (Absolute overlay - zero document flow impact) -->
<div class="starry-bg absolute inset-0 pointer-events-none overflow-hidden z-0">
    <?php
    // Generate random stars
    $starCount = 60;
    for ($i = 0; $i < $starCount; $i++) {
        $x = rand(0, 100);
        $y = rand(0, 100);
        $size = rand(1, 3);
        $delay = rand(0, 5000) / 1000;
        $twinkleClass = $i % 3 === 0 ? 'twinkle' : ($i % 3 === 1 ? 'twinkle-slow' : '');
        echo "<div class=\"star absolute {$twinkleClass}\" style=\"left:{$x}%;top:{$y}%;width:{$size}px;height:{$size}px;animation-delay:{$delay}s;\"></div>";
    }
    ?>
</div>
