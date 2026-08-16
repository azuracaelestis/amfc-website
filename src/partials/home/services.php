<?php
/* PORT THIS — Services section, verified against the connected Figma file (node 87:153).
   Real flattened illustrations (car-loan.svg / personal-loan.svg) replace what were, in Figma,
   deeply nested/masked vector groups (node 87:160 and 87:218) not worth hand-porting as markup. */
?>
<section id="service" class="amfc-services" data-aos="fade-up">
	<div class="amfc-container">
		<div class="amfc-services__header">
			<p class="amfc-eyebrow amfc-services__eyebrow"><?= e(t('home.services.eyebrow')) ?></p>
			<h2 class="amfc-services__heading"><?= e(t('home.services.headline')) ?></h2>
		</div>
		<div class="amfc-services__grid">
			<div class="amfc-service-card">
				<!-- Fixed-height wrapper: car-loan.svg and personal-loan.svg have different
				     aspect ratios (342x188 vs 323x197), so without this the title/body/button
				     below would land at different heights between the two cards. -->
				<div class="amfc-service-card__icon-wrap">
					<?php /* Inlined, not <img> — its parts are animated on hover and CSS can't reach
					         inside an <img>-loaded SVG. See the partial's own header. */ ?>
					<?php require __DIR__ . '/illustration-car-loan.php'; ?>
				</div>
				<div class="amfc-service-card__text">
					<h3 class="amfc-service-card__title"><?= e(t('home.services.vehicle.title')) ?></h3>
					<p class="amfc-service-card__body"><?= e(t('home.services.vehicle.body')) ?></p>
				</div>
				<a href="/product_1" class="btn btn-primary rounded-pill amfc-service-card__cta amfc-btn"><span class="amfc-btn__label"><?= e(t('home.services.vehicle.cta')) ?></span></a>
			</div>
			<div class="amfc-service-card">
				<div class="amfc-service-card__icon-wrap">
					<?php /* Inlined for the same reason as the car card's — see the partial's header. */ ?>
					<?php require __DIR__ . '/illustration-personal-loan.php'; ?>
				</div>
				<div class="amfc-service-card__text">
					<h3 class="amfc-service-card__title"><?= e(t('home.services.personal.title')) ?></h3>
					<p class="amfc-service-card__body"><?= e(t('home.services.personal.body')) ?></p>
				</div>
				<a href="/product_2" class="btn btn-primary rounded-pill amfc-service-card__cta amfc-btn"><span class="amfc-btn__label"><?= e(t('home.services.personal.cta')) ?></span></a>
			</div>
		</div>
	</div>
</section>
