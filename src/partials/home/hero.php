<?php
/* PORT THIS — hero uses the real supplied photo and real sparkle/icon assets pulled from the
   connected Figma file. Background is a CSS radial-gradient approximating the real illustrated
   background image (see amfc-tokens.css --amfc-grad-hero comment) rather than shipping the
   extra image asset. */
?>
<section id="hero" class="amfc-hero">
	<div class="amfc-container">
		<div class="amfc-hero__grid">
			<div class="amfc-hero__content">
				<p class="amfc-hero__eyebrow"><?= e(t('home.hero.eyebrow')) ?></p>
				<h1 class="amfc-hero__headline">
					<?= e(t('home.hero.headline_1')) ?><br />
					<?= e(t('home.hero.headline_2')) ?><br />
					<?= e(t('home.hero.headline_3')) ?>
				</h1>
				<a href="#service" class="btn btn-primary rounded-pill amfc-hero__cta amfc-btn">
					<?= e(t('home.hero.cta')) ?>
				</a>
			</div>
			<div class="amfc-hero__photo-wrap">
				<img class="amfc-hero__photo" src="<?= e(asset('images/hero-photo.png')) ?>" alt="<?= e(t('home.hero.photo_alt')) ?>" width="627" height="627" />
				<img class="amfc-hero__sparkle amfc-hero__sparkle--a" src="<?= e(asset('images/hero-sparkle-small.svg')) ?>" alt="" aria-hidden="true" />
				<img class="amfc-hero__sparkle amfc-hero__sparkle--c" src="<?= e(asset('images/hero-sparkle-large.svg')) ?>" alt="" aria-hidden="true" />
			</div>
		</div>
	</div>
</section>
