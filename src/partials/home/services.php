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
					<img class="amfc-service-card__icon" src="<?= e(asset('images/car-loan.svg')) ?>" alt="<?= e(t('home.services.vehicle.icon_alt')) ?>" />
				</div>
				<div class="amfc-service-card__text">
					<h3 class="amfc-service-card__title"><?= e(t('home.services.vehicle.title')) ?></h3>
					<p class="amfc-service-card__body"><?= e(t('home.services.vehicle.body')) ?></p>
				</div>
				<a href="/product_1" class="btn btn-primary rounded-pill amfc-service-card__cta"><?= e(t('home.services.vehicle.cta')) ?></a>
			</div>
			<div class="amfc-service-card">
				<div class="amfc-service-card__icon-wrap">
					<img class="amfc-service-card__icon" src="<?= e(asset('images/personal-loan.svg')) ?>" alt="<?= e(t('home.services.personal.icon_alt')) ?>" />
				</div>
				<div class="amfc-service-card__text">
					<h3 class="amfc-service-card__title"><?= e(t('home.services.personal.title')) ?></h3>
					<p class="amfc-service-card__body amfc-service-card__body--wide"><?= e(t('home.services.personal.body')) ?></p>
				</div>
				<a href="/product_2" class="btn btn-primary rounded-pill amfc-service-card__cta"><?= e(t('home.services.personal.cta')) ?></a>
			</div>
		</div>
	</div>
</section>
