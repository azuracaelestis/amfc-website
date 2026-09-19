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
				<!-- Decorative AMFC wordmark watermark, per feedback — reuses the same grey
				     logomark asset the zh-Hant-TW site's KSP section already uses for the same
				     purpose (this page's own Figma frame doesn't have a dedicated watermark node
				     for this section, unlike the hero's brand stamp — the request pointed at the
				     page's general Figma URL, not a specific new node). Static placement under
				     the intro text, not the zh page's fixed-position/scroll-fade behavior —
				     that's tightly coupled to that page's own multi-card scroll timing and JS,
				     well beyond a "place a watermark logo" placement request here. -->
				<img class="amfc-en-principles__watermark" src="<?= e(asset('images/amfc-logo-grey.svg')) ?>" alt="" aria-hidden="true" />
			</div>
			<div class="amfc-en-principles__stack-wrap">
				<!-- Scroll-stacking pile, same CSS-only position:sticky mechanism as the
				     zh-Hant-TW site's .amfc-philosophy__stack (see amfc-2026.css's own
				     extensive comment on that class) — no JS, no pinned track. All four cards
				     share the same `top`, so each releases from flow and immediately pins at
				     that same offset, landing directly on top of the one before it; then
				     .amfc-en-principles__stack-tail supplies the scroll runway for the last
				     card to release before the next section begins.

				     Stack order is Efficiency, Innovation, Integrity, Professionalism, per
				     feedback — each card carries a CONTENT-based modifier class (its own
				     color/tilt, matching its own Figma node) rather than a position-based one
				     (--1/--2/etc.), specifically so this order can be changed by moving markup
				     alone: z-index (stacking depth) is assigned by :nth-child in
				     amfc-en.css, not baked into these classes, so reordering these divs is
				     enough on its own — no CSS to touch. Innovation/Professionalism (Figma
				     nodes 333:1315/333:1324) didn't specify a tilt angle themselves, so they
				     use the zh-Hant-TW KSP set's own tilt pattern instead. -->
				<div class="amfc-en-principles__stack">
					<div class="amfc-en-stat-card amfc-en-stat-card--efficiency">
						<img src="<?= e(asset('images/en/principle-professionalism.png')) ?>" alt="" aria-hidden="true" width="230" height="144" />
						<span class="amfc-en-stat-card__badge">Efficiency</span>
						<span class="amfc-en-stat-card__number">200,000+</span>
						<span class="amfc-en-stat-card__label">Customers Served</span>
					</div>
					<div class="amfc-en-stat-card amfc-en-stat-card--innovation">
						<img src="<?= e(asset('images/en/principle-innovation.png')) ?>" alt="" aria-hidden="true" width="230" height="144" />
						<span class="amfc-en-stat-card__badge">Innovation</span>
						<span class="amfc-en-stat-card__number">AI-Powered</span>
						<span class="amfc-en-stat-card__label">Intelligent Risk Management</span>
					</div>
					<div class="amfc-en-stat-card amfc-en-stat-card--integrity">
						<img src="<?= e(asset('images/en/principle-integrity.png')) ?>" alt="" aria-hidden="true" width="230" height="144" />
						<span class="amfc-en-stat-card__badge">Integrity</span>
						<span class="amfc-en-stat-card__number">NT$20 Billion+</span>
						<span class="amfc-en-stat-card__label">Assets Under Management</span>
					</div>
					<div class="amfc-en-stat-card amfc-en-stat-card--professionalism">
						<img src="<?= e(asset('images/en/principle-financial-expertise.png')) ?>" alt="" aria-hidden="true" width="230" height="144" />
						<span class="amfc-en-stat-card__badge">Professionalism</span>
						<span class="amfc-en-stat-card__number">20+ years</span>
						<span class="amfc-en-stat-card__label">Financial Expertise</span>
					</div>
				</div>
				<div class="amfc-en-principles__stack-tail"></div>
			</div>
		</div>
	</div>
</section>
