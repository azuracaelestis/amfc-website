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
			<!-- Watermark lives here, OUTSIDE the centered intro/cards group, per feedback
			     ("it supposed to be left aligned... with the nav bar left margin"): anything
			     inside that group inherits the group's own centering offset (measured: the
			     watermark sat at x=298 rather than the nav's own 119 alignment line). This
			     overlay is position: absolute against .amfc-en-principles__layout, whose box
			     already spans the full container content width starting at exactly that 119
			     line — so the watermark inside it lands there at every viewport, with no
			     hardcoded offset that would need keeping in sync with the centering math.

			     Two elements rather than one, matching the zh-Hant-TW site's own
			     .amfc-philosophy__watermark-overlay/slot pattern: the absolute overlay adds no
			     flow height (so it can't push the section taller) while the sticky element
			     inside it still travels with the pinned intro through the whole stacking
			     sequence, which a bare absolutely-positioned element wouldn't do. -->
			<div class="amfc-en-principles__watermark-overlay">
				<!-- The slot deliberately mirrors .amfc-en-principles__intro's own geometry
				     (same sticky top, same card-height box) so the two pin AND release at
				     identical scroll positions — the mark itself is absolutely positioned
				     inside it, so it can sit lower and overflow without changing the slot's
				     height and desyncing that. Without this the watermark pinned 360px of
				     scroll earlier than the intro and released earlier too, visibly drifting
				     into the body copy at both ends of the section. -->
				<div class="amfc-en-principles__watermark-slot">
					<span class="amfc-en-principles__watermark" role="presentation" aria-hidden="true"></span>
				</div>
			</div>
			<!-- Two nested wrappers, same pattern as the zh-Hant-TW site's own
			     .amfc-philosophy__intro-slot: a sticky element's RELEASE point (when it stops
			     being pinned) is governed by its own normal-flow box height, not by how long
			     its sibling's content runs — .amfc-en-principles__intro on its own is only as
			     tall as one card (via its min-height), so it was releasing and scrolling away
			     almost immediately, long before the four-card stack even finished, per
			     feedback ("the headline and body copy is left behind"). This outer slot has no
			     sizing of its own — align-items: stretch on .amfc-en-principles__layout
			     stretches it to match .amfc-en-principles__stack-wrap's own (much taller)
			     height, giving the inner sticky intro that same tall box to travel within, so
			     it keeps pace with the cards for the whole stacking sequence and only releases
			     once the stack-wrap's real bottom (after the scroll-runway tail) scrolls past. -->
			<div class="amfc-en-principles__intro-slot">
				<div class="amfc-en-principles__intro">
					<h2 class="amfc-en-principles__heading">Four Principles.<br />One Commitment.</h2>
					<p>These four principles shape every solution we build and every partnership we create.</p>
				</div>
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
