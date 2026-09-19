<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-products">
	<div class="container text-center">
		<p class="amfc-en-eyebrow">Our Product</p>
		<h2 class="fw-bold mt-3 mb-3" style="font-size: clamp(1.5rem, calc(32 / 1440 * 100vw), 2rem);">Financial Products &amp; Services</h2>
		<p class="amfc-en-products__intro mx-auto mb-5">Alongside our regional fintech initiatives, we provide consumer financing and investment services in Taiwan through compliant, technology-enabled financial products.</p>

		<div class="amfc-en-products__grid">
			<div class="amfc-en-product-card">
				<img class="amfc-en-product-card__img--large" src="<?= e(asset('images/en/product-vehicle-loan.png')) ?>" alt="Vehicle loan illustration" width="1024" height="1536" />
				<p class="amfc-en-product-card__label">Vehicle Loan</p>
			</div>
			<div class="amfc-en-product-card">
				<img class="amfc-en-product-card__img--large" src="<?= e(asset('images/en/product-personal-loan.png')) ?>" alt="Personal loan illustration" width="1024" height="1536" />
				<p class="amfc-en-product-card__label">Personal Loan</p>
			</div>
			<div class="amfc-en-product-card">
				<img class="amfc-en-product-card__img--small" src="<?= e(asset('images/en/product-buddyloan.png')) ?>" alt="BuddyLoan illustration" width="930" height="532" />
				<p class="amfc-en-product-card__label">BuddyLoan</p>
			</div>
			<div class="amfc-en-product-card">
				<img class="amfc-en-product-card__img--large" src="<?= e(asset('images/en/product-corporate-bond.png')) ?>" alt="Corporate bond illustration" width="1024" height="1536" />
				<p class="amfc-en-product-card__label">Corporate Bond</p>
			</div>
		</div>
	</div>
</section>
