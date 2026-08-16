<?php
/* PORT THIS — personal-loan illustration, INLINED rather than referenced as
   <img src="personal-loan.svg">, for the same reason as illustration-car-loan.php: CSS in this
   document cannot reach inside an SVG loaded through <img>, so the hover animation (see
   .amfc-illo-personal in amfc-2026.css) would be silently inert.

   Two changes from the original export in public/assets/images/personal-loan.svg, which is
   retained as the source of truth:

   1. Group wrappers (__bag / __sparkle / __coin) around the animated parts. This export is
      completely flat — 27 sibling paths, no <g> at all — so the wrappers are additive and
      preserve paint order.

   2. The Illustrator fill classes .st0-.st11 are renamed to .amfc-illo-personal__stN. An inline
      <svg>'s <style> block is a GLOBAL stylesheet for the whole document, not scoped to the
      SVG — bare .st0-.st11 would collide with AMFC's own custom.css in both directions once
      this ships into their app (see CLAUDE.md). The rules themselves are untouched.

   Every path is otherwise byte-identical. role="img" + aria-label replaces the <img alt> that
   no longer applies once inlined.

   NOTE: no .arm-wave group. The spec assumed one, but the raised arm is not a separable node —
   it is part of the same path as the torso ([11], the whole yellow jacket). Splitting it would
   mean re-authoring the artwork, and nothing in the spec animates it. */
?>
<?xml version="1.0" encoding="UTF-8"?>
<svg class="amfc-service-card__icon amfc-illo-personal" xmlns="http://www.w3.org/2000/svg"
     version="1.1" viewBox="0 0 323 197" role="img"
     aria-label="<?= e(t('home.services.personal.icon_alt')) ?>">
  <!-- Generator: Adobe Illustrator 30.2.1, SVG Export Plug-In . SVG Version: 2.1.1 Build 1)  -->
  <defs>
    <style>
      .amfc-illo-personal__st0 {
        fill: #ebefff;
      }
      .amfc-illo-personal__st1 {
        fill: #fdcdc8;
      }
      .amfc-illo-personal__st2 {
        fill: #fff;
      }
      .amfc-illo-personal__st3, .amfc-illo-personal__st4 {
        fill: none;
        stroke: #1a2f86;
        stroke-linecap: round;
        stroke-miterlimit: 10;
      }
      .amfc-illo-personal__st4 {
        stroke-width: 2px;
      }
      .amfc-illo-personal__st5 {
        fill: #cc7872;
      }
      .amfc-illo-personal__st6 {
        fill: #e88a89;
      }
      .amfc-illo-personal__st7 {
        fill: #fff8d9;
      }
      .amfc-illo-personal__st8 {
        fill: #f7bdb9;
      }
      .amfc-illo-personal__st9 {
        fill: #f7bf4f;
      }
      .amfc-illo-personal__st10 {
        fill: #eab43f;
      }
      .amfc-illo-personal__st11 {
        fill: #1a2f86;
      }
    </style>
  </defs>
  <path class="amfc-illo-personal__st11" d="M217.2,73.8c0-6.9-5.6-12.5-12.5-12.5s-1.7,0-2.6.3c-1-5-.1-11.2.1-14.9.6-8.6.3-19.8-7.2-26-4.4-3.6-11.1-4.6-16.5-2.6-6.1,2.2-9.9,7.9-11.6,13.6-1.1,3.6-1.5,7.4-2.5,11-.7-.3-1.4-.5-2.2-.5-2.5,0-4.6,1.7-5.1,4.1-.5,0-1.1-.1-1.7-.1-7.2,0-13,5.8-13,13s.3,3,.8,4.4c-3.5,2.1-5.9,6-5.9,10.4s4.5,11.1,10.4,12c1.3,5.6,6.3,9.8,12.3,9.8s.5,0,.8,0c2,5.1,7,8.7,12.8,8.7s10-3,12.3-7.5c2.2,1.5,4.9,2.4,7.8,2.4,7.5,0,13.5-5.9,13.8-13.3,5.6-1.2,9.8-6.2,9.8-12.2h0Z"/>
  <path class="amfc-illo-personal__st1" d="M193.3,69c-1,.6-2.2.8-3.4.9-1.4.2-2.8.3-4.3.2-2.8-.1-5.3-1.1-8-2,0-1.6,0-3.2.1-4.8,0-2,.1-4,0-6,0-.6-.1-1.2-.2-1.8-.2-1.5-.5-3-.7-4.5-.2-1.2-.4-2.5-.7-3.7.7.7,1.4,1.1,2.3,1.5,3.7,2,7.5,3.9,11.3,5.8,1.1.6,2.3,1.1,3.5,1.4v7s0,6,0,6h0Z"/>
  <path class="amfc-illo-personal__st8" d="M193.3,63c-4.3-1.1-8.4-2.8-12.1-5.1-1.2-.7-2.4-1.5-3.6-2.4-.2-1.5-.5-3-.7-4.5-.2-1.2-.4-2.5-.7-3.7.7.7,1.4,1.1,2.3,1.5,3.7,2,7.5,3.9,11.3,5.8,1.1.6,2.3,1.1,3.5,1.4v7s0,0,0,0Z"/>
  <path class="amfc-illo-personal__st1" d="M200.6,36.1c-.2-1-.5-2-.8-3-1-3.1-3-5.9-5.6-7.9-5.1-3.7-12.5-3.1-16.9,1.5-1,1.1-1.9,2.3-2.5,3.7-1.5,3.3-1.7,6.9-1.1,10.4.6,3.1,1.8,6.1,3.4,8.7,1,1.6,2.1,3.2,3.5,4.5.8.8,1.6,1.5,2.6,2.1,1.9,1.2,4,2,6.2,2.1,2,.1,4.1-.3,5.8-1.3,1.9-1.1,3.2-2.9,4.1-4.9,2.2-4.9,2.5-10.6,1.4-15.8h0Z"/>
  <path class="amfc-illo-personal__st1" d="M178,48.4c-1.9.9-4.4.7-6.1-.6-1.5-1.1-2.4-2.8-2.5-4.6,0-.3,0-.7,0-1,0-.6.2-1.1.5-1.6.7-1.2,2.2-1.9,3.6-1.8,1.4.2,2.7,1.1,3.3,2.4l.4,2.8.6,4.4h0Z"/>
  <path class="amfc-illo-personal__st11" d="M194.9,23.5c-1.7,4.7-5.1,8.7-9.4,11.4-4.3,2.7-9.2,4-14.3,4.3-.4,0,.7-6.6.9-7.2,1-3.4,3.2-6.4,6.1-8.3.4-.3.9-.6,1.4-.8,2.9-1.5,6.3-2.1,9.5-1.6,1.3.2,2.6.5,3.8,1.2.2.1,2.1.9,2,1.2h0Z"/>
  <path class="amfc-illo-personal__st5" d="M196.1,47.9c-.5,1.4-1.6,2.4-2.8,2.5-1.2,0-2.3-.6-3.1-1.9-.5-.8-.9-1.9-1-3.1h.2s6.8-.6,6.8-.6h.3c0,1.1,0,2.2-.4,3.1h0Z"/>
  <path class="amfc-illo-personal__st2" d="M196.3,44.8c-.8,1.1-1.9,1.9-3.3,2-1.4.1-2.6-.5-3.6-1.5l6.8-.6Z"/>
  <path class="amfc-illo-personal__st6" d="M196.1,47.9c-.5,1.4-1.6,2.4-2.8,2.5-1.2,0-2.3-.6-3.1-1.9.3-.2.7-.4,1-.6,1.1-.5,2.2-.7,3.4-.5.5,0,1,.2,1.4.4h0Z"/>
  <path class="amfc-illo-personal__st11" d="M189,39.7c0,.9-.5,1.7-1.1,1.7-.7,0-1.2-.7-1.2-1.6,0-.9.5-1.7,1.1-1.7.7,0,1.2.7,1.2,1.6Z"/>
  <path class="amfc-illo-personal__st11" d="M195.3,39.5c0,.9.6,1.7,1.2,1.6.7,0,1.2-.8,1.1-1.7,0-.9-.6-1.7-1.2-1.6-.7,0-1.2.8-1.1,1.7Z"/>
  <path class="amfc-illo-personal__st9" d="M274.5,54.3c-10.3,4.5-17.4,16.6-42.3,14.9-24.9-1.7-39.6-3.1-39.6-3.1,0,0-6,6.3-15.2-.2,0,0,0,0-.1,0-1.5-.2-15.2-.7-24.7,40.7,0,0-17.4,50.1,0,54.2,17.4,4.1,47.5,7.6,55.1,0,8-8,8.5-38.9,7.9-59.7,0,0,15,3,34.9-7.8,19.9-10.8,34.7-15.8,34.4-26.7,0-3.5-7.5-13.5-10.3-12.3Z"/>
  <path class="amfc-illo-personal__st5" d="M193.3,41.6c-.4-.3-1-.3-1.4,0l1.1,1.8c.3,0,.5-.3.6-.5.2-.5,0-1-.3-1.3h0Z"/>
  <path class="amfc-illo-personal__st8" d="M187.3,44.5c0,1.4-1.2,2.7-3,2.8-1.7.1-3.2-.9-3.3-2.4,0-1.4,1.2-2.7,3-2.8,1.7-.1,3.2.9,3.3,2.4Z"/>
  <path class="amfc-illo-personal__st8" d="M200.8,43c0,.8-.7,1.5-1.7,1.6-1,0-1.8-.5-1.9-1.3,0-.8.7-1.5,1.7-1.6,1,0,1.8.5,1.9,1.3Z"/>
<g class="amfc-illo-personal__bag">
  <path class="amfc-illo-personal__st9" d="M65.5,73.3l-8,42.8-51.6-7.6,8.4-44.6,51.2,9.5Z"/>
  <path class="amfc-illo-personal__st4" d="M59.5,105.8c0,0,.2,0,.3,0,7.4,1.3,11.8-2.9,12.8-8.8,1-5.9-1.6-11.3-9-12.6"/>
</g>
  <path class="amfc-illo-personal__st1" d="M297.2,55.4c-4.4,5.7-8.7,10.5-12.6,14.5-5.9.7-9.1-2.1-10.8-6.7,9-8.5,19.4-18.8,19.4-18.8,0,0,3.8-7.5,2.5-10.7.4-.3,1.3-.4,1.8.2,1.8,2,1.4,4.9,1.4,4.9,0,0,9.1-8.6,9.5-7.5.5,1.1-3.8,6.1-3.8,6.1,0,0,7.2-6.8,7.3-5.6,0,.5,0,0-5.3,6.9,0,0,6.4-4.4,5.9-3.1-.6,1.7-4.7,5.8-4.7,5.8,0,0,5-3.4,4.6-2.3-.5,1.1-12.1,11.8-12.1,11.8l-3.1,4.3h0Z"/>
  <path class="amfc-illo-personal__st1" d="M69.6,99.6s-.5,0-1.9-1.3c-1.1-1,1.6-1.7,1.6-1.7-1.4-.9-1-1.5-.8-1.9,1.1-1.6,2.4-.6,2.4-.6,0,0-.9-1.3,0-2.5.7-.9,3.2.6,3.2.6,0,0-.6.2,0-2.4.2-.7,1.2-1.4,1.5-1,.3.6.8,1.1,1.2,1.6,2.1,2.4,5,4.1,8.1,4.9,2.6.7,6.6,1.9,11,3.1-.2,4.1-.4,8.1-.6,12.2-3.7-1.3-7.6-2.8-11.8-4.7h0c-3-1.5-6.2-2.6-9.4-3.3-2.6-.6-5.5-1.3-6-1.7-.9-.8,1.5-1.4,1.5-1.4h0Z"/>
  <path class="amfc-illo-personal__st0" d="M173.1,144.4c-.1,0-.3,0-.4,0-.8-.2-1.3-1.1-1.1-1.9,14.2-50.7,5.1-75,5.1-75.3-.3-.8,0-1.7.9-2,.8-.3,1.7,0,2,.9.4,1,9.5,25.6-5,77.2-.2.7-.8,1.1-1.5,1.1h0Z"/>
  <path class="amfc-illo-personal__st0" d="M147.9,122.6s5.2,5.4,27.6,14.9c6.2,2.6-10.2,63.5-25.2,56.2s-13-13.2-33.6-24.4c-20.6-11.1,31.2-46.7,31.2-46.7Z"/>
  <path class="amfc-illo-personal__st3" d="M186.2,36.8s1.2-1.4,2.9-.3"/>
  <path class="amfc-illo-personal__st3" d="M194.4,35.8s1.1-1.5,2.9-.4"/>
<g class="amfc-illo-personal__sparkle">
  <path class="amfc-illo-personal__st10" d="M261.5,2.3l2.1,5.8c.4,1,1.2,1.9,2.2,2.2l5.6,2.1c2.3.9,2.3,4.2,0,5.1l-5.6,2.1c-1,.4-1.8,1.2-2.2,2.2l-2.1,5.8c-.9,2.4-4.1,2.4-5,0l-2.1-5.8c-.4-1-1.2-1.9-2.2-2.2l-5.6-2.1c-2.3-.9-2.3-4.2,0-5.1l5.6-2.1c1-.4,1.8-1.2,2.2-2.2l2.1-5.8c.9-2.4,4.1-2.4,5,0Z"/>
</g>
<g class="amfc-illo-personal__coin">
  <circle class="amfc-illo-personal__st10" cx="69.4" cy="160.2" r="14.7"/>
  <path class="amfc-illo-personal__st7" d="M71.2,165c-.7.3-1.3.5-1.8.7-.6.1-1.1.2-1.6.3l-1-2c.5,0,1.1,0,1.8-.2.7-.1,1.3-.3,1.8-.5l-1.2-2.3c-.7,0-1.3,0-1.8,0-.5,0-1,0-1.3-.2-.4-.1-.7-.3-.9-.5-.3-.2-.5-.5-.7-.9-.3-.5-.3-1-.3-1.5,0-.5.3-1,.7-1.5.4-.5.9-.9,1.5-1.2l-.6-1.1,1-.5.6,1.1c.6-.3,1.1-.5,1.7-.6.6-.1,1.1-.2,1.7-.3l.2,2.1c-.5,0-1,.1-1.4.2-.4.1-.9.2-1.2.4l1.1,2.2c.6,0,1.3-.1,1.9-.1.6,0,1.2,0,1.6.3.5.2.9.6,1.2,1.2.4.7.4,1.5.1,2.3-.3.8-.9,1.5-2,2.1l.8,1.5-1,.5-.8-1.5ZM71.3,162.7c.3-.2.5-.5.6-.7,0-.2,0-.5,0-.7,0-.1-.2-.2-.3-.3-.1,0-.3-.1-.5-.1-.2,0-.4,0-.7,0l.9,1.9ZM67.2,157c-.2.1-.3.3-.4.4-.1.1-.2.3-.2.4,0,.1,0,.3,0,.4,0,.1.2.3.3.3.1,0,.3.1.5.1.2,0,.4,0,.7,0l-.9-1.8Z"/>
</g>
  <path class="amfc-illo-personal__st9" d="M173.9,66.9c-6.8,1.7-15.7,5.7-24.8,14.8-19.1,19.1-55.6,14.9-55.6,14.9,0,0-12.4,15.8-6.6,19.1,5.8,3.3,38.2,4.9,58.3,0,41.6-10.3,33.5-37.2,28.7-48.8Z"/>
</svg>