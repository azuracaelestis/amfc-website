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

   The stacking motion above is the sticky mechanic alone. The separate grow-in on cards 2-4 is
   AOS (already loaded site-wide), triggered at anchor-placement "top-center" so it fires as the
   card climbs the upper half of the viewport toward its pin rather than when it first peeks in
   at the bottom. Card 1 has no grow-in — it's the resting top of the pile. A scroll-driven
   `animation-timeline: view()` was tried for this first and abandoned; see the long comment on
   .amfc-philosophy__stat-card in amfc-2026.css for why sticky subjects break it.

   data-aos-once="false" on cards 2-4 (per feedback, reference: bol.com careers page) — the
   grow-in replays every time a card's trigger point is crossed in either scroll direction, not
   just the first time. Verified this doesn't hit the same premature-exit bug documented on
   .amfc-philosophy__intro below: tested a full down-then-up scroll pass with real AOS, and each
   card's aos-animate class only toggles once its OWN pin position genuinely crosses the trigger
   threshold — it stays on the whole time a card is stacked-but-covered by a later one, so a
   covered card never flickers or shrinks while still part of the visible pile.

   Intro text (eyebrow + heading) uses plain data-aos="fade-up" — matches the Funds partnership
   section below (funds.php) and every other below-fold section, per feedback to keep this
   text's motion consistent with theirs rather than the custom masked slide-up it briefly had
   (see amfc-2026.css .amfc-philosophy__mask history in git log for that attempt). data-aos-once
   is still set to "true" here specifically (Funds doesn't need it) because .amfc-philosophy__intro
   is position:sticky — AOS's default (once:false) removes .aos-animate once it judges an element
   has left the viewport, which for a sticky-pinned element can happen well before the reader has
   actually scrolled past it, the same bug already hit and fixed on the stat cards above.

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
				<p class="amfc-eyebrow amfc-philosophy__eyebrow"><?= e(t('home.philosophy.eyebrow')) ?></p>
				<h2 class="amfc-philosophy__heading">
					<span class="amfc-philosophy__heading-line"><?= e(t('home.philosophy.headline_line1_prefix')) ?><span class="amfc-philosophy__heading-highlight"><?= e(t('home.philosophy.headline_line1_highlight')) ?><svg class="amfc-philosophy__heading-underline" viewBox="0 0 300 24" preserveAspectRatio="none" aria-hidden="true"><path d="M4,14 C50,2 90,24 140,13 C180,4 210,22 250,12 C266,8 276,16 292,9" /></svg></span></span>
					<span class="amfc-philosophy__heading-line"><span class="amfc-philosophy__heading-highlight"><?= e(t('home.philosophy.headline_line2_highlight')) ?><svg class="amfc-philosophy__heading-underline" viewBox="0 0 300 24" preserveAspectRatio="none" aria-hidden="true"><path d="M4,14 C50,2 90,24 140,13 C180,4 210,22 250,12 C266,8 276,16 292,9" /></svg></span><?= e(t('home.philosophy.headline_line2_suffix')) ?></span>
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
					data-aos="fade" data-aos-once="false" data-aos-anchor-placement="top-center"
					data-aos-easing="ease-out-cubic" data-aos-duration="600">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat2.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-ai-chip.svg')) ?>" alt="<?= e(t('home.philosophy.stat2.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat2.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat2.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--3"
					data-aos="fade" data-aos-once="false" data-aos-anchor-placement="top-center"
					data-aos-easing="ease-out-cubic" data-aos-duration="600">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat3.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-thumbs-up.svg')) ?>" alt="<?= e(t('home.philosophy.stat3.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat3.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat3.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--4"
					data-aos="fade" data-aos-once="false" data-aos-anchor-placement="top-center"
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
