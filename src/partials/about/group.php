<?php
/* PORT THIS — 我們集團 (Figma 474:36 band + 474:183-203): two alternating photo/text rows.
   CTA hrefs are intentionally empty placeholders until real destinations are confirmed. */
?>
<section class="amfc-about-group">
	<div class="amfc-container">
		<h2 class="amfc-about__section-title"><?= e(t('about.group.title')) ?></h2>
		<div class="amfc-about-group__rows">
			<div class="amfc-about-group__row">
				<img class="amfc-about-group__photo amfc-about-group__photo--funds" src="<?= e(asset('images/about/about-group-funds.jpg')) ?>" alt="<?= e(t('about.group.funds.photo_alt')) ?>" width="2172" height="724" loading="lazy" />
				<div class="amfc-about-group__text">
					<img class="amfc-about-group__logo" src="<?= e(asset('images/funds-logo.svg')) ?>" alt="<?= e(t('about.group.funds.logo_alt')) ?>" width="244" height="53" />
					<p class="amfc-about-group__body"><?= e(t('about.group.funds.body')) ?></p>
					<a href="" class="btn btn-primary rounded-pill amfc-btn amfc-about__cta" data-track="about-group-funds-cta"><span class="amfc-btn__label"><?= e(t('about.cta')) ?></span></a>
				</div>
			</div>
			<div class="amfc-about-group__row amfc-about-group__row--reverse">
				<img class="amfc-about-group__photo amfc-about-group__photo--japan" src="<?= e(asset('images/about/about-group-japan.jpg')) ?>" alt="<?= e(t('about.group.japan.photo_alt')) ?>" width="1916" height="821" loading="lazy" />
				<div class="amfc-about-group__text">
					<h3 class="amfc-about-group__name"><?= e(t('about.group.japan.title')) ?></h3>
					<p class="amfc-about-group__body"><?= e(t('about.group.japan.body')) ?></p>
					<a href="" class="btn btn-primary rounded-pill amfc-btn amfc-about__cta" data-track="about-group-japan-cta"><span class="amfc-btn__label"><?= e(t('about.cta')) ?></span></a>
				</div>
			</div>
		</div>
	</div>
</section>
