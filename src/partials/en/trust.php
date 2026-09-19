<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-trust">
	<div class="container amfc-en-container">
		<!-- amfc-en-trust__row overrides --bs-gutter-x to 64px, per feedback — the gap between
		     the badges and text columns must be a flat 64px, not g-4's 1.5rem (26.4px on this
		     site, see CLAUDE.md's rem-inflation bug). Bootstrap splits a row's gutter evenly as
		     each column's own left/right padding, so the visual gap between two adjacent columns
		     equals --bs-gutter-x directly (not double it). -->
		<div class="row align-items-center amfc-en-trust__row">
			<div class="col-lg-6">
				<div class="d-flex align-items-center gap-4 amfc-en-trust__badges flex-wrap">
					<img src="<?= e(asset('images/en/badge-tfta.png')) ?>" alt="TFTA member badge" width="1164" height="761" />
					<img src="<?= e(asset('images/en/badge-iso.png')) ?>" alt="ISO 27001 and ISO 27701 certification badge" width="261" height="168" />
					<img class="amfc-en-trust__badges-swiss" src="<?= e(asset('images/en/badge-swiss.png')) ?>" alt="Strategic Swiss Wealth Securities Investment Consulting Co. LTD partnership badge" width="950" height="200" />
				</div>
			</div>
			<div class="col-lg-6">
				<!-- Explicit line break, matching the source Figma node exactly (two separate
				     <p> lines inside one bold 32px block, not one naturally-wrapping string). -->
				<p class="amfc-en-trust__heading">Institutional trust meets<br aria-hidden="true" />AI-driven financial solutions</p>
				<p class="amfc-en-trust__body">Certified ISO 27001 &amp; ISO 27701 | TFTA Member | Strategic Swiss Wealth Securities Investment Consulting Co. LTD Partnership</p>
			</div>
		</div>
	</div>
</section>
