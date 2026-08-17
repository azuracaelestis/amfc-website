<?php
/* PORT THIS — KSP card 2 (創新/AI) lightbulb icon, INLINED rather than referenced as
   <img src="stat-icon-lightbulb.svg">, for the same reason as illustration-car-loan.php: CSS in
   this document cannot reach inside an SVG loaded through <img>, so the entrance-bounce
   animation (see .bulb-group in amfc-2026.css) would be silently inert.

   The only addition vs. public/assets/images/stat-icon-lightbulb.svg (retained as the source of
   truth) is the <g class="bulb-group"> wrapper around all four paths (glass + the three base
   rings) — every path is otherwise byte-identical. Bare "bulb-group" rather than an amfc-
   prefixed name, matching the equally-bare .coin-zone/.coin-disc used for card 1's coin flip —
   confirmed neither collides with anything already in this codebase.

   Purely decorative (matches the coin/thumbsup/stars icons on the other three cards), so
   aria-hidden="true" goes directly on the inlined <svg> root — inline SVGs are otherwise
   exposed to the accessibility tree by default in some browsers, unlike an <img alt="">. */
?>
<svg class="amfc-philosophy__stat-icon amfc-philosophy__stat-icon--lightbulb bulb-zone" viewBox="294 52 116 171" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<g class="bulb-group">
<path d="M335.479 186.37C333.632 186.37 332.087 184.945 331.963 183.102C331.106 170.496 325.325 158.699 315.873 150.183C304.899 140.294 298 125.966 298 110.026C298 80.3733 321.876 56.3011 351.443 56.0018C381.537 55.6977 405.975 79.8685 406 109.98C406.013 125.928 399.12 140.265 388.147 150.163C378.693 158.692 372.895 170.489 372.037 183.102C371.912 184.945 370.368 186.37 368.521 186.37L335.479 186.37Z" fill="#EAB43F"/>
<path d="M371.003 189.432L332.996 189.432C330.904 189.432 329.209 191.128 329.209 193.22C329.209 195.312 330.904 197.008 332.996 197.008L371.003 197.008C373.094 197.008 374.79 195.312 374.79 193.22C374.79 191.128 373.094 189.432 371.003 189.432Z" fill="#2441B5"/>
<path d="M371.003 200.068L332.996 200.068C330.904 200.068 329.209 201.763 329.209 203.855C329.209 205.947 330.904 207.643 332.996 207.643L371.003 207.643C373.094 207.643 374.79 205.947 374.79 203.855C374.79 201.763 373.094 200.068 371.003 200.068Z" fill="#2441B5"/>
<path d="M333.54 210.704L370.46 210.704C370.46 214.885 367.067 218.279 362.888 218.279L341.111 218.279C336.932 218.279 333.54 214.885 333.54 210.704Z" fill="#2441B5"/>
</g>
</svg>
