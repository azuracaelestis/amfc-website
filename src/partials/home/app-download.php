<?php
/* PORT THIS — real lifestyle photo and Google Play badge pulled from the connected Figma file.
   Apple's App Store badge in the real design is a complex multi-layer vector group (node
   87:299) not worth hand-porting to markup — use Apple's official badge asset from their brand
   resources when wiring real store links (see Assets table; never redraw a trademark badge).
   "KingDo" is a confirmed fixed product name — routed through t() like any other string. */
?>
<section id="app" class="amfc-app" data-aos="fade-up">
	<div class="container">
		<img class="amfc-app__photo" src="<?= e(asset('images/app-photo.png')) ?>" alt="<?= e(t('home.app.photo_alt')) ?>" />
		<div class="amfc-app__store-badges">
			<img src="<?= e(asset('images/store-badge-google.svg')) ?>" alt="<?= e(t('home.app.google_play_alt')) ?>" />
			<img src="<?= e(asset('images/placeholder-icon.svg')) ?>" alt="<?= e(t('home.app.app_store_alt')) ?>" />
		</div>
		<h2 class="amfc-app__headline"><?= e(t('home.app.headline')) ?></h2>
		<p class="amfc-app__body"><?= e(t('home.app.body')) ?></p>
		<a href="#" class="btn btn-primary btn-lg rounded-pill px-4"><?= e(t('home.app.cta')) ?></a>
	</div>
</section>
