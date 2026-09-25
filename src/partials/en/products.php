<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<section class="amfc-en-products">
	<div class="container text-center">
		<p class="amfc-en-eyebrow" data-aos="fade-up">Our Product</p>
		<h2 class="fw-bold mt-3 mb-3" style="font-size: clamp(1.5rem, calc(32 / 1440 * 100vw), 2rem);" data-aos="fade-up">Financial Products &amp; Services</h2>
		<p class="amfc-en-products__intro mx-auto mb-5" data-aos="fade-up">Alongside our regional fintech initiatives, we provide consumer financing and investment services in Taiwan through compliant, technology-enabled financial products.</p>

		<!-- The wrapper only matters on phones (see amfc-en.css): it anchors the swipe-hint arrows. -->
		<div class="amfc-en-products__carousel">
		<div class="amfc-en-products__grid">
			<div class="amfc-en-product-card" data-aos="fade-up" data-aos-delay="0">
				<img class="amfc-en-product-card__img--large" src="<?= e(asset('images/en/product-vehicle-loan.png')) ?>" alt="Vehicle loan illustration" width="950" height="850" />
				<p class="amfc-en-product-card__label">Vehicle Loan</p>
			</div>
			<div class="amfc-en-product-card" data-aos="fade-up" data-aos-delay="100">
				<img class="amfc-en-product-card__img--portrait" src="<?= e(asset('images/en/product-personal-loan.png')) ?>" alt="Personal loan illustration" width="1024" height="1475" />
				<p class="amfc-en-product-card__label">Personal Loan</p>
			</div>
			<div class="amfc-en-product-card" data-aos="fade-up" data-aos-delay="200">
				<img class="amfc-en-product-card__img--small" src="<?= e(asset('images/en/product-buddyloan.png')) ?>" alt="BuddyLoan illustration" width="871" height="532" />
				<p class="amfc-en-product-card__label">BuddyLoan</p>
			</div>
			<div class="amfc-en-product-card" data-aos="fade-up" data-aos-delay="300">
				<img class="amfc-en-product-card__img--bond" src="<?= e(asset('images/en/product-corporate-bond.png')) ?>" alt="Corporate bond illustration" width="986" height="1337" />
				<p class="amfc-en-product-card__label">Corporate Bond</p>
			</div>
		</div>
		<!-- Phone only (hidden >=768px in CSS): appear while the user swipes, only in the directions
		     that can still be scrolled; also tappable (initProductsCarouselDots()). -->
		<button type="button" class="amfc-en-products__arrow amfc-en-products__arrow--prev" aria-label="Previous product"><img src="<?= e(asset('images/en/icon-chevron-right.svg')) ?>" alt="" aria-hidden="true" width="24" height="24" /></button>
		<button type="button" class="amfc-en-products__arrow amfc-en-products__arrow--next" aria-label="Next product"><img src="<?= e(asset('images/en/icon-chevron-right.svg')) ?>" alt="" aria-hidden="true" width="24" height="24" /></button>
		</div>
		<!-- Phone only (hidden >=768px in CSS): the four cards become a horizontal scroller and
		     these dots track which card is in view (updated by initProductsCarouselDots()). -->
		<div class="amfc-en-products__dots" aria-hidden="true"><span></span><span></span><span></span><span></span></div>
	</div>
</section>
