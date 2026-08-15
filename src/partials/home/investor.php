<?php // PORT THIS — real photo asset and corrected copy pulled from the connected Figma file. ?>
<section id="investor" class="amfc-investor" data-aos="fade-up">
	<div class="container">
		<div class="amfc-investor__grid">
			<img class="amfc-investor__photo" src="<?= e(asset('images/investor-photo.png')) ?>" alt="<?= e(t('home.investor.photo_alt')) ?>" />
			<div>
				<h2 class="amfc-investor__heading"><?= e(t('home.investor.headline')) ?></h2>
				<p class="amfc-investor__body"><?= e(t('home.investor.body')) ?></p>
				<a href="/info" class="fw-bold text-decoration-none d-inline-flex align-items-center gap-1">
					<?= e(t('home.investor.cta')) ?>
					<img src="<?= e(asset('images/icon-arrow-right.svg')) ?>" alt="" width="19" height="19" aria-hidden="true" />
				</a>
			</div>
		</div>
	</div>
</section>
