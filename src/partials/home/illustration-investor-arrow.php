<?php
/* PORT THIS — investor CTA arrow icon, INLINED rather than referenced as
   <img src="icon-arrow-right.svg">, for the same reason as illustration-ksp-bulb.php: CSS in
   this document cannot reach inside an SVG loaded through <img>, so the hover color change to
   #647EEB (see .amfc-investor__cta:hover in amfc-2026.css) would be silently inert.

   The only change vs. public/assets/images/icon-arrow-right.svg (retained as the source of
   truth) is stroke="currentColor" in place of the hardcoded stroke="#1A2F86" — the path data is
   otherwise byte-identical. currentColor lets the arrow track the link's own `color` (both the
   resting #1A2F86 and the #647EEB hover state) with no separate hover rule needed for the icon.

   Purely decorative (matches the arrow's previous alt=""), so aria-hidden="true" goes directly
   on the inlined <svg> root — inline SVGs are otherwise exposed to the accessibility tree by
   default in some browsers, unlike an <img alt="">. */
?>
<svg class="amfc-investor__cta-arrow" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<path d="M7 3.9585L12.5417 9.50016L7 15.0418" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
