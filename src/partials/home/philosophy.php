<?php
/* PORT THIS — Company philosophy (KSP) section: a scroll-stacking card pile.
   Four stat cards pile up one-by-one as the user scrolls the right column, while the
   heading stays pinned on the left, so each card is read in turn, then the section
   releases into Funds partnership below.

   Mechanism: PURE CSS `position: sticky` (see amfc-2026.css), directly on each card — no JS,
   CSP-safe, and no extra wrapper. Cards share nearly the same `top` (a tiny per-card increment
   for the fanned-peek look) and sit back-to-back with almost no gap, so as soon as one card's
   own height scrolls past the sticky offset and it releases, the next card — already just
   behind it — reaches that same offset and takes over.

   The stacking motion above is the sticky mechanic alone. The separate fade-in on cards 2-4 is
   AOS (already loaded site-wide), triggered at anchor-placement "top-center" so it fires as the
   card climbs the upper half of the viewport toward its pin rather than when it first peeks in
   at the bottom. Card 1 has no fade — it's the resting top of the pile. A scroll-driven
   `animation-timeline: view()` was tried for this first and abandoned; see the long comment on
   .amfc-philosophy__stat-card in amfc-2026.css for why sticky subjects break it.

   Two prior approaches were tried and rejected:
   1. A tall 400vh scroll-track + JS scrubbing every card's opacity from scroll position.
      Scroll progress 0 gave EVERY card (including the first) opacity 0, so the pile was
      blank until scrolled well into the track, and all four cards were absolute/inset:0
      (perfect overlap), never a readable pile to begin with.
   2. Wrapping each card in a tall sticky "slot" (for a longer per-card dwell time) with a
      zero-gap stack. That backfired: once a slot's dwell time ended and it released, the
      UNUSED height below the (much shorter) card inside it scrolled into view as a plain
      blank gap before the next slot's card arrived — worse than the gap this was meant to
      fix. Sticky must directly wrap the visible card, not a tall spacer around it. */
?>
<section id="about" class="amfc-curve-top amfc-philosophy">
	<!-- .amfc-container (not Bootstrap's .container) so this column's left edge lines up
	     exactly with the hero headline above it — same reasoning as hero.php. -->
	<div class="amfc-container">
		<div class="amfc-philosophy__grid">
			<div class="amfc-philosophy__intro" data-aos="fade-up" data-aos-once="true">
				<p class="amfc-eyebrow amfc-philosophy__eyebrow">
					<span class="amfc-philosophy__mask"><span class="amfc-philosophy__mask-inner"><?= e(t('home.philosophy.eyebrow')) ?></span></span>
				</p>
				<h2 class="amfc-philosophy__heading">
					<span class="amfc-philosophy__heading-line"><span class="amfc-philosophy__mask"><span class="amfc-philosophy__mask-inner"><?= e(t('home.philosophy.headline_line1')) ?></span></span></span>
					<span class="amfc-philosophy__heading-line"><span class="amfc-philosophy__mask"><span class="amfc-philosophy__mask-inner"><?= e(t('home.philosophy.headline_line2')) ?></span></span></span>
				</h2>
			</div>
			<div class="amfc-philosophy__stack">
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--1">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat1.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-coin.svg')) ?>" alt="<?= e(t('home.philosophy.stat1.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat1.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat1.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--2"
					data-aos="fade" data-aos-once="true" data-aos-anchor-placement="top-center"
					data-aos-easing="ease-out-cubic" data-aos-duration="600">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat2.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-ai-chip.svg')) ?>" alt="<?= e(t('home.philosophy.stat2.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat2.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat2.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--3"
					data-aos="fade" data-aos-once="true" data-aos-anchor-placement="top-center"
					data-aos-easing="ease-out-cubic" data-aos-duration="600">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat3.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-thumbs-up.svg')) ?>" alt="<?= e(t('home.philosophy.stat3.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat3.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat3.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--4"
					data-aos="fade" data-aos-once="true" data-aos-anchor-placement="top-center"
					data-aos-easing="ease-out-cubic" data-aos-duration="600">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat4.tag')) ?></span>
					<!-- Real design uses a "flag" icon here — placeholder until exported flat from Figma -->
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/placeholder-icon.svg')) ?>" alt="<?= e(t('home.philosophy.stat4.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat4.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat4.label')) ?></div>
				</article>
				<!-- Real sibling element, not container padding — see amfc-2026.css comment on
				     .amfc-philosophy__stack-tail for why this must be an actual element. -->
				<div class="amfc-philosophy__stack-tail" aria-hidden="true"></div>
			</div>
		</div>
	</div>
</section>
