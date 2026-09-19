<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-hero">
	<img class="amfc-en-hero__bg-shape" src="<?= e(asset('images/en/hero-bg-shape.svg')) ?>" alt="" aria-hidden="true" />
	<img class="amfc-en-hero__bg-glow" src="<?= e(asset('images/en/hero-bg-ellipse.png')) ?>" alt="" aria-hidden="true" />
	<div class="container amfc-en-container amfc-en-hero__container">
		<!-- g-4, not g-5 — g-5's 3rem gutter (52.8px on this site, see CLAUDE.md's rem-inflation
		     bug) left the text column just 573.6px wide, 6px short of the 579.7px "AI-driven
		     financial" needs at 64px bold to stay on one line as specified. g-4 frees enough of
		     that gutter without a visible spacing change. -->
		<div class="row align-items-center g-4">
			<div class="col-lg-6">
				<p class="amfc-en-hero__eyebrow">Financial inclusiveness for a better Asia</p>
				<!-- Accessibility floor (CLAUDE.md): exactly one h1 per page — this is it.
				     Explicit <br> line breaks, per feedback — natural wrapping reflowed this
				     into 4 lines at a 16" MacBook's viewport width instead of the specified 3,
				     since that width falls between the 1440px reference and where the
				     font-size clamp caps out, and the two-column split doesn't leave enough
				     room per line at every width in between. Hard breaks make the 3-line
				     shape fixed regardless of viewport, matching the zh-Hant-TW page's own
				     .amfc-hero__headline-line pattern for the same reason. -->
				<h1 class="amfc-en-hero__headline">Powering secure,<br aria-hidden="true" />AI-driven financial<br aria-hidden="true" />ecosystems</h1>
			</div>
			<div class="col-lg-6">
				<div class="amfc-en-hero__photo-wrap">
					<img class="amfc-en-hero__photo" src="<?= e(asset('images/en/hero-photo.png')) ?>" alt="A couple smiling while looking at a smartphone together" width="1672" height="941" />
				</div>
			</div>
		</div>
	</div>
</section>
