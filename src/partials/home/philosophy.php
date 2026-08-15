<?php
/* PORT THIS — CORRECTED from the first pass: this is 4 overlapping/rotated stat cards
   (confirmed via Figma get_design_context), not the single stat card originally built from
   the screenshot alone. The real design animates these with Framer Motion as a scroll-scrubbed
   reveal (pin the section, reveal one card per scroll increment, each stacking on the last).
   We have no animation library in this stack (CLAUDE.md: no new library), so this is
   reproduced with a plain scroll listener driving inline styles directly off scroll position
   (amfc-2026.js initPhilosophyParallax) — a tall .amfc-philosophy__scroll-track provides the
   scroll distance, a position:sticky inner wrapper pins the content while scrolling through it.
   data-rotate on each card is the single source of truth for its resting rotation, read by JS.
   No AOS on this section — the white block itself is static; only the cards are scroll-linked.
   Stats are hardcoded per the confirmed decision (no CMS for Phase 1). */
?>
<section id="about" class="amfc-curve-top amfc-philosophy">
	<div class="amfc-philosophy__scroll-track">
		<div class="amfc-philosophy__sticky">
			<div class="container">
				<div class="amfc-philosophy__grid">
					<div>
						<p class="amfc-eyebrow"><?= e(t('home.philosophy.eyebrow')) ?></p>
						<h2 class="amfc-philosophy__heading">
							<?= e(t('home.philosophy.headline_line1')) ?><br />
							<?= e(t('home.philosophy.headline_line2')) ?>
						</h2>
					</div>
					<div class="amfc-philosophy__stack">
						<div class="amfc-philosophy__stat-card amfc-philosophy__stat-card--1" data-rotate="2.3">
							<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat1.tag')) ?></span>
							<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-coin.svg')) ?>" alt="<?= e(t('home.philosophy.stat1.icon_alt')) ?>" />
							<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat1.number')) ?></div>
							<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat1.label')) ?></div>
						</div>
						<div class="amfc-philosophy__stat-card amfc-philosophy__stat-card--2" data-rotate="-3">
							<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat2.tag')) ?></span>
							<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-ai-chip.svg')) ?>" alt="<?= e(t('home.philosophy.stat2.icon_alt')) ?>" />
							<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat2.number')) ?></div>
							<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat2.label')) ?></div>
						</div>
						<div class="amfc-philosophy__stat-card amfc-philosophy__stat-card--3" data-rotate="3.4">
							<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat3.tag')) ?></span>
							<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/stat-thumbs-up.svg')) ?>" alt="<?= e(t('home.philosophy.stat3.icon_alt')) ?>" />
							<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat3.number')) ?></div>
							<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat3.label')) ?></div>
						</div>
						<div class="amfc-philosophy__stat-card amfc-philosophy__stat-card--4" data-rotate="-3.2">
							<span class="amfc-philosophy__stat-tag"><?= e(t('home.philosophy.stat4.tag')) ?></span>
							<!-- Real design uses a "flag" icon here — a complex nested/masked vector group not
							     worth hand-porting; placeholder icon until exported flat from Figma -->
							<img class="amfc-philosophy__stat-icon" src="<?= e(asset('images/placeholder-icon.svg')) ?>" alt="<?= e(t('home.philosophy.stat4.icon_alt')) ?>" />
							<div class="amfc-philosophy__stat-number"><?= e(t('home.philosophy.stat4.number')) ?></div>
							<div class="amfc-philosophy__stat-label"><?= e(t('home.philosophy.stat4.label')) ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
