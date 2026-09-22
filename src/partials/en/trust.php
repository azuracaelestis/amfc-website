<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-trust">
	<div class="container amfc-en-container">
		<!-- A content-sized flex row, NOT a Bootstrap col-lg-6 50/50 split. The 50/50 split was
		     why the 64px gutter never showed up as a 64px gap: the badges only fill ~285px of
		     their ~569px column, so ~283px of dead column space sat between the logos and the
		     gutter (measured: badge images ended at x=404, text started at x=751 — a 346.6px
		     visual gap despite --bs-gutter-x being a correct 64px). Sizing each block to its own
		     content makes the 64px gap real, and matches the source Figma node, which is itself
		     a flex row with gap-[64px], not a half/half grid. -->
		<div class="amfc-en-trust__layout">
			<div class="amfc-en-trust__badges" data-aos="fade-right">
				<!-- The two rows are explicit now rather than relying on flex-wrap inside a
				     fixed-width column — once this block shrinks to its content, all three
				     badges would otherwise fit on one line and the wrap would disappear. -->
				<div class="amfc-en-trust__badges-row">
					<img src="<?= e(asset('images/en/badge-tfta.png')) ?>" alt="TFTA member badge" width="1164" height="761" />
					<img src="<?= e(asset('images/en/badge-iso.png')) ?>" alt="ISO 27001 and ISO 27701 certification badge" width="261" height="168" />
				</div>
				<img class="amfc-en-trust__badges-swiss" src="<?= e(asset('images/en/badge-swiss.png')) ?>" alt="Strategic Swiss Wealth Securities Investment Consulting Co. LTD partnership badge" width="950" height="200" />
			</div>
			<div class="amfc-en-trust__copy" data-aos="fade-left" data-aos-delay="100">
				<!-- Explicit line break, matching the source Figma node exactly (two separate
				     <p> lines inside one bold 32px block, not one naturally-wrapping string). -->
				<p class="amfc-en-trust__heading">Institutional trust meets<br aria-hidden="true" />AI-driven financial solutions</p>
				<p class="amfc-en-trust__body">Certified ISO 27001 &amp; ISO 27701 | TFTA Member | Strategic Swiss Wealth Securities Investment Consulting Co. LTD Partnership</p>
			</div>
		</div>
	</div>
</section>
