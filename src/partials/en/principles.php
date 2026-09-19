<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-principles">
	<div class="container amfc-en-container py-5">
		<!-- Content-sized flex row (gap: 84px), not a Bootstrap col-lg-4/col-lg-8 grid split —
		     same reasoning as .amfc-en-trust__layout: the card is only 404.89px wide but sits
		     centered (margin-inline: auto) inside a much wider Bootstrap column, so the gutter
		     would be measured from the column's edge, not from where the card visually starts,
		     landing well short of a real 84px gap. 84px itself comes straight from the source
		     Figma node's own layout (intro block ends at x=353, the cards group starts at
		     x=437 — 437-353=84). -->
		<div class="amfc-en-principles__layout">
			<div class="amfc-en-principles__intro">
				<h2 class="amfc-en-principles__heading">Four Principles.<br />One Commitment.</h2>
				<p>These four principles shape every solution we build and every partnership we create.</p>
			</div>
			<div class="amfc-en-principles__stack-wrap">
				<!-- Scroll-stacking pile, same CSS-only position:sticky mechanism as the
				     zh-Hant-TW site's .amfc-philosophy__stack (see amfc-2026.css's own
				     extensive comment on that class) — no JS, no pinned track. Both cards
				     share the same `top`, so card 2 lands directly on top of card 1 as it
				     scrolls into its sticky range, then .amfc-en-principles__stack-tail
				     supplies the scroll runway for card 2 to release before the next
				     section begins. Only two cards here (vs. the zh page's four) — this
				     section only has two principles per the source Figma. -->
				<div class="amfc-en-principles__stack">
					<div class="amfc-en-stat-card amfc-en-stat-card--1">
						<img src="<?= e(asset('images/en/principle-professionalism.png')) ?>" alt="" aria-hidden="true" width="230" height="144" />
						<span class="amfc-en-stat-card__badge">Professionalism</span>
						<span class="amfc-en-stat-card__number">200,000+</span>
						<span class="amfc-en-stat-card__label">Customers Served</span>
					</div>
					<div class="amfc-en-stat-card amfc-en-stat-card--2">
						<img src="<?= e(asset('images/en/principle-integrity.png')) ?>" alt="" aria-hidden="true" width="230" height="144" />
						<span class="amfc-en-stat-card__badge">Integrity</span>
						<span class="amfc-en-stat-card__number">NT$20 Billion+</span>
						<span class="amfc-en-stat-card__label">Assets Under Management</span>
					</div>
				</div>
				<div class="amfc-en-principles__stack-tail"></div>
			</div>
		</div>
	</div>
</section>
