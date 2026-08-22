<?php
/* PORT THIS — App download ("KingDo") section, verified against the connected Figma file
   (node 87:269). Real lifestyle photo, and now both real store badges (googleplay.svg and
   appstore.svg supplied directly — the App Store badge was previously a placeholder since its
   Figma source is a complex multi-layer vector group not worth hand-porting).
   "KingDo" is a confirmed fixed product name — routed through t() like any other string.

   Photo sits OUTSIDE .amfc-container (unlike every other element in this section) so it can
   bleed full-width edge-to-edge, per Figma (node 87:270: `w-full` inside its own 1443px-wide
   section frame, not the narrower 1264px content container) — see the .amfc-app__photo
   comment in amfc-2026.css. */
?>
<section id="app" class="amfc-app" data-aos="fade-up">
	<!-- <picture>, not a duplicated <img> pair shown/hidden via CSS, per feedback ("replace the
	     image... only apply this for mobile version"): the <source media> below only exists at
	     mobile widths, so a mobile browser downloads app-photo-mobile.png and never fetches the
	     desktop photo at all (and vice versa) — CSS display:none on a second <img> would still
	     download both. -->
	<picture>
		<source media="(max-width: 991.98px)" srcset="<?= e(asset('images/app-photo-mobile.png')) ?>" />
		<img class="amfc-app__photo" src="<?= e(asset('images/app-photo.png')) ?>" alt="<?= e(t('home.app.photo_alt')) ?>" />
	</picture>
	<div class="amfc-container">
		<div class="amfc-app__store-badges">
			<img src="<?= e(asset('images/googleplay.svg')) ?>" alt="<?= e(t('home.app.google_play_alt')) ?>" />
			<img src="<?= e(asset('images/appstore.svg')) ?>" alt="<?= e(t('home.app.app_store_alt')) ?>" />
		</div>
		<h2 class="amfc-app__headline"><?= e(t('home.app.headline')) ?></h2>
		<p class="amfc-app__body"><?= e(t('home.app.body')) ?></p>
		<a href="#" class="btn btn-primary rounded-pill amfc-btn amfc-app__cta"><span class="amfc-btn__label"><?= e(t('home.app.cta')) ?></span></a>
	</div>
</section>
