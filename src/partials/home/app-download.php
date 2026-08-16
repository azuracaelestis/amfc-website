<?php
/* PORT THIS — App download ("KingDo") section, verified against the connected Figma file
   (node 87:269). Real lifestyle photo, and now both real store badges (googleplay.svg and
   appstore.svg supplied directly — the App Store badge was previously a placeholder since its
   Figma source is a complex multi-layer vector group not worth hand-porting).
   "KingDo" is a confirmed fixed product name — routed through t() like any other string. */
?>
<section id="app" class="amfc-app" data-aos="fade-up">
	<div class="amfc-container">
		<img class="amfc-app__photo" src="<?= e(asset('images/app-photo.png')) ?>" alt="<?= e(t('home.app.photo_alt')) ?>" />
		<div class="amfc-app__store-badges">
			<img src="<?= e(asset('images/googleplay.svg')) ?>" alt="<?= e(t('home.app.google_play_alt')) ?>" />
			<img src="<?= e(asset('images/appstore.svg')) ?>" alt="<?= e(t('home.app.app_store_alt')) ?>" />
		</div>
		<h2 class="amfc-app__headline"><?= e(t('home.app.headline')) ?></h2>
		<p class="amfc-app__body"><?= e(t('home.app.body')) ?></p>
		<a href="#" class="btn btn-primary rounded-pill amfc-btn"><?= e(t('home.app.cta')) ?></a>
	</div>
</section>
