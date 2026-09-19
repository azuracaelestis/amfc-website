<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-principles">
	<div class="container py-5">
		<div class="row align-items-start g-5">
			<div class="col-lg-4">
				<h2 class="amfc-en-principles__heading">Four Principles.<br />One Commitment.</h2>
				<p>These four principles shape every solution we build and every partnership we create.</p>
			</div>
			<div class="col-lg-8">
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
						<img src="<?= e(asset('images/en/principle-professionalism.png')) ?>" alt="" aria-hidden="true" width="200" height="200" />
						<span class="amfc-en-stat-card__badge">Professionalism</span>
						<span class="amfc-en-stat-card__number">200,000+</span>
						<span class="amfc-en-stat-card__label">Customers Served</span>
					</div>
					<div class="amfc-en-stat-card amfc-en-stat-card--2">
						<img src="<?= e(asset('images/en/principle-integrity.png')) ?>" alt="" aria-hidden="true" width="200" height="200" />
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
