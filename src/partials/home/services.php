<?php
/* PORT THIS — icons are placeholders: the real icons are complex nested/masked vector groups
   in Figma (node 87:160 and 87:218), not worth hand-porting to markup — export flat from Figma
   for the real build. The two .ai files found locally under Homepage/Illustration/ were checked
   earlier and are NOT the real icons either (one is an unrelated Freepik stock scene, the other
   carries a Freepik watermark). Body copy corrected against the connected Figma file — the
   original screenshot-transcribed copy had OCR-level errors. */
?>
<section id="service" class="amfc-services" data-aos="fade-up">
	<div class="container">
		<p class="amfc-eyebrow"><?= e(t('home.services.eyebrow')) ?></p>
		<h2 class="amfc-services__heading"><?= e(t('home.services.headline')) ?></h2>
		<div class="amfc-services__grid">
			<div class="amfc-service-card">
				<img class="amfc-service-card__icon" src="<?= e(asset('images/placeholder-icon.svg')) ?>" alt="<?= e(t('home.services.vehicle.icon_alt')) ?>" />
				<h3 class="amfc-service-card__title"><?= e(t('home.services.vehicle.title')) ?></h3>
				<p class="amfc-service-card__body"><?= e(t('home.services.vehicle.body')) ?></p>
				<a href="/product_1" class="btn btn-primary rounded-pill px-4"><?= e(t('home.services.vehicle.cta')) ?></a>
			</div>
			<div class="amfc-service-card">
				<img class="amfc-service-card__icon" src="<?= e(asset('images/placeholder-icon.svg')) ?>" alt="<?= e(t('home.services.personal.icon_alt')) ?>" />
				<h3 class="amfc-service-card__title"><?= e(t('home.services.personal.title')) ?></h3>
				<p class="amfc-service-card__body"><?= e(t('home.services.personal.body')) ?></p>
				<a href="/product_2" class="btn btn-primary rounded-pill px-4"><?= e(t('home.services.personal.cta')) ?></a>
			</div>
		</div>
	</div>
</section>
