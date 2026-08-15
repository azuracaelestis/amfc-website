<?php
/* PORT THIS — Company philosophy (KSP) section: a scroll-stacking card pile.
   Four stat cards pile up one-by-one as the user scrolls the right column, while the
   heading stays pinned on the left, so each card is read in turn.

   Mechanism: PURE CSS `position: sticky` (see amfc-2026.css), the same pattern as the
   portfolio reference. No JS, no animation library — CSP-safe (CLAUDE.md: no new library).

   Prior approach (removed) pinned a 400vh track and used a JS scroll listener to scrub each
   card's opacity 0->1. That blanked the entire stack: at scroll progress 0 the first card's
   computed opacity was also 0, and all four cards were absolute/inset:0 (perfect overlap, not
   a readable pile). Resting rotation is now owned by the CSS card modifiers, not data-rotate. */
?>
<section id="about" class="amfc-curve-top amfc-philosophy">
	<div class="container">
		<div class="amfc-philosophy__grid">
			<div class="amfc-philosophy__intro">
				<p class="amfc-eyebrow"><?= e(t('home.philosophy.eyebrow')) ?></p>
				<h2 class="amfc-philosophy__heading">
					<?= e(t('home.philosophy.headline_line1')) ?><br />
					<?= e(t('home.philosophy.headline_line2')) ?>
				</h2>
			</div>
			<div class="amfc-philosophy__stack">
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--1">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat1.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-coin.svg')) ?>" alt="<?= e(t('home.philosophy.stat1.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat1.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat1.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--2">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat2.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-ai-chip.svg')) ?>" alt="<?= e(t('home.philosophy.stat2.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat2.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat2.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--3">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat3.tag')) ?></span>
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-thumbs-up.svg')) ?>" alt="<?= e(t('home.philosophy.stat3.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat3.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat3.label')) ?></div>
				</article>
				<article class="amfc-philosophy__stat-card amfc-philosophy__stat-card--4">
					<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat4.tag')) ?></span>
					<!-- Real design uses a "flag" icon here — placeholder until exported flat from Figma -->
					<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/placeholder-icon.svg')) ?>" alt="<?= e(t('home.philosophy.stat4.icon_alt')) ?>" width="72" height="72" />
					<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat4.number')) ?></div>
					<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat4.label')) ?></div>
				</article>
			</div>
		</div>
	</div>
</section>
