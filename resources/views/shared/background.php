<!-- Starry Pixel Night Background & Dark 8-Bit Tree Shadow Silhouettes -->
<div class="starry-bg absolute inset-0 pointer-events-none overflow-hidden z-0">
  <?php
  // Generate random stars
  $starCount = 65;
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

<!-- 8-Bit Pixel Art Dark Tree Shadow Silhouette Horizon (Fixed Bottom Layer) -->
<div class="pointer-events-none absolute bottom-0 left-0 right-0 z-0 overflow-hidden opacity-90">
  <!-- Layer 1: Distant Tall Dark Pine Tree Shadows -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 140" preserveAspectRatio="none" class="w-full h-32 lg:h-44 fill-[#040714] opacity-80 translate-y-3">
    <path d="
      M 0,140 L 0,80 L 15,40 L 30,80 L 30,60 L 45,25 L 60,60 L 60,45 L 75,10 L 90,45 L 90,60 L 105,30 L 120,60 L 120,80 L 135,45 L 150,80
      L 150,65 L 165,30 L 180,65 L 180,50 L 195,15 L 210,50 L 210,65 L 225,35 L 240,65 L 240,85 L 255,50 L 270,85 L 270,70 L 285,35
      L 300,70 L 300,55 L 315,20 L 330,55 L 330,70 L 345,40 L 360,70 L 360,90 L 375,55 L 390,90 L 390,70 L 405,35 L 420,70
      L 420,50 L 435,18 L 450,50 L 450,70 L 465,35 L 480,70 L 480,90 L 495,55 L 510,90 L 510,70 L 525,38 L 540,70 L 540,52 L 555,22
      L 570,52 L 570,70 L 585,40 L 600,70 L 600,90 L 615,55 L 630,90 L 630,70 L 645,35 L 660,70 L 660,50 L 675,18 L 690,50
      L 690,70 L 705,38 L 720,70 L 720,90 L 735,55 L 750,90 L 750,70 L 765,35 L 780,70 L 780,52 L 795,22 L 810,52 L 810,70
      L 825,40 L 840,70 L 840,90 L 855,55 L 870,90 L 870,70 L 885,35 L 900,70 L 900,50 L 915,18 L 930,50 L 930,70 L 945,38
      L 960,70 L 960,90 L 975,55 L 990,90 L 990,70 L 1005,35 L 1020,70 L 1020,52 L 1035,22 L 1050,52 L 1050,70 L 1065,40 L 1080,70
      L 1080,90 L 1095,55 L 1110,90 L 1110,70 L 1125,35 L 1140,70 L 1140,50 L 1155,18 L 1170,50 L 1170,80 L 1185,45 L 1200,80 L 1200,140 Z
    " shape-rendering="crispEdges"/>
  </svg>
</div>
