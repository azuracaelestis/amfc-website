<?php // PORT THIS — About hero (Figma 474:31-34): Taipei skyline photo, eyebrow + the page's only <h1>. ?>
<section class="amfc-about-hero">
	<img class="amfc-about-hero__photo" src="<?= e(asset('images/about/about-hero.jpg')) ?>" alt="" aria-hidden="true" width="3124" height="2064" fetchpriority="high" />
	<div class="amfc-container amfc-about-hero__content">
		<p class="amfc-about-hero__eyebrow"><?= e(t('about.hero.eyebrow')) ?></p>
		<h1 class="amfc-about-hero__headline">
			<?= e(t('about.hero.headline_line1')) ?><br />
			<?= e(t('about.hero.headline_line2')) ?>
		</h1>
	</div>
</section>
