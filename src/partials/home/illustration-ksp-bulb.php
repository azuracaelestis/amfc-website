<?php
/* PORT THIS — KSP card 2 (創新/AI) lightbulb icon, INLINED rather than referenced as
   <img src="stat-icon-lightbulb.svg">, for the same reason as illustration-ksp-thumbsup.php:
   CSS in this document cannot reach inside an SVG loaded through <img>, so the ambient sparkle
   twinkle (see .sparkle-a/.sparkle-b in amfc-2026.css) would be silently inert.

   Bulb paths (glass + 3 base stripes) are byte-identical to
   public/assets/images/stat-icon-lightbulb.svg (retained as the source of truth), just wrapped
   in <g class="bulb"> — per spec, the bulb itself stays completely static, no motion of any
   kind, so this group carries no animation hooks at all.

   The two sparkles are NOT in any supplied source export — the AI card's own flattened design
   file (public/assets/images/ksp cards/02.svg) turned out to contain duplicated star-rating
   paths from the 專業/20年+ card instead of real sparkle art for this one (same class of
   source-export mismatch already documented elsewhere, e.g. 04.svg's wrong label). Built instead
   by reusing the sparkle path shapes already established in this codebase for the car-loan/
   personal-loan card illustrations (.amfc-illo-car__sparkle in illustration-car-loan.php) —
   same two path `d` values verbatim, just repositioned near this icon via a plain (non-animated)
   wrapping <g transform="translate(...)">, so the visual sparkle motif stays consistent across
   every card that has one.

   Positioning: each sparkle sits in its own OUTER <g transform="translate(...)"> (a plain SVG
   attribute) with the animated <g class="sparkle-a|sparkle-b"> nested INSIDE it. This split
   matters — CSS `transform` on an element REPLACES an SVG `transform` attribute rather than
   composing with it, so putting the animation's CSS transform directly on the same element that
   carries the positioning attribute would silently discard the position the moment the
   twinkle's scale() kicks in. Keeping them on separate, nested elements avoids that entirely. */
?>
<svg class="amfc-philosophy__stat-icon amfc-philosophy__stat-icon--lightbulb" viewBox="294 52 116 171" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<g class="bulb">
<path d="M335.479 186.37C333.632 186.37 332.087 184.945 331.963 183.102C331.106 170.496 325.325 158.699 315.873 150.183C304.899 140.294 298 125.966 298 110.026C298 80.3733 321.876 56.3011 351.443 56.0018C381.537 55.6977 405.975 79.8685 406 109.98C406.013 125.928 399.12 140.265 388.147 150.163C378.693 158.692 372.895 170.489 372.037 183.102C371.912 184.945 370.368 186.37 368.521 186.37L335.479 186.37Z" fill="#EAB43F"/>
<path d="M371.003 189.432L332.996 189.432C330.904 189.432 329.209 191.128 329.209 193.22C329.209 195.312 330.904 197.008 332.996 197.008L371.003 197.008C373.094 197.008 374.79 195.312 374.79 193.22C374.79 191.128 373.094 189.432 371.003 189.432Z" fill="#2441B5"/>
<path d="M371.003 200.068L332.996 200.068C330.904 200.068 329.209 201.763 329.209 203.855C329.209 205.947 330.904 207.643 332.996 207.643L371.003 207.643C373.094 207.643 374.79 205.947 374.79 203.855C374.79 201.763 373.094 200.068 371.003 200.068Z" fill="#2441B5"/>
<path d="M333.54 210.704L370.46 210.704C370.46 214.885 367.067 218.279 362.888 218.279L341.111 218.279C336.932 218.279 333.54 214.885 333.54 210.704Z" fill="#2441B5"/>
</g>
<g transform="translate(110 19.3)">
<g class="sparkle-a">
<path d="M284.477 36.0231L286.541 41.7968C286.912 42.8346 287.7 43.651 288.702 44.035L294.277 46.1729C296.574 47.055 296.574 50.421 294.277 51.3032L288.702 53.4411C287.7 53.8251 286.912 54.6415 286.541 55.6793L284.477 61.453C283.625 63.8331 280.375 63.8331 279.523 61.453L277.459 55.6793C277.088 54.6415 276.3 53.8251 275.298 53.4411L269.723 51.3032C267.426 50.421 267.426 47.055 269.723 46.1729L275.298 44.035C276.3 43.651 277.088 42.8346 277.459 41.7968L279.523 36.0231C280.375 33.643 283.625 33.643 284.477 36.0231Z" fill="#EBC84F"/>
</g>
</g>
<g transform="translate(62 113.3)">
<g class="sparkle-b">
<path d="M329.592 83.4075L330.919 87.1903C331.157 87.8703 331.664 88.4052 332.308 88.6567L335.892 90.0574C337.369 90.6354 337.369 92.8407 335.892 93.4186L332.308 94.8193C331.664 95.0709 331.157 95.6058 330.919 96.2858L329.592 100.069C329.045 101.628 326.955 101.628 326.408 100.069L325.081 96.2858C324.843 95.6058 324.336 95.0709 323.692 94.8193L320.108 93.4186C318.631 92.8407 318.631 90.6354 320.108 90.0574L323.692 88.6567C324.336 88.4052 324.843 87.8703 325.081 87.1903L326.408 83.4075C326.955 81.8482 329.045 81.8482 329.592 83.4075Z" fill="#EAB43F"/>
</g>
</g>
</svg>
