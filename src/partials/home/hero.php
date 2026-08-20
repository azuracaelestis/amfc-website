<?php
/* PORT THIS — hero uses the real supplied photo and real sparkle/icon assets pulled from the
   connected Figma file. Background is a CSS gradient approximating the real illustrated
   background image (see amfc-tokens.css --amfc-grad-hero / --amfc-grad-hero-mobile comments)
   rather than shipping the extra image asset — desktop and mobile use different gradient SHAPES
   (radial vs linear) matching their own Figma frames, same two color stops in both.

   .amfc-hero__cta is a direct grid child, a sibling of .amfc-hero__content/.amfc-hero__photo-wrap
   rather than nested inside .amfc-hero__content, specifically so .amfc-hero__grid can place it
   independently per breakpoint (see amfc-2026.css): mobile stacks content -> photo -> cta (the
   button sits below the photo, per the Figma mobile frame), desktop keeps content and cta
   together in the left column with photo beside them (the original two-column layout). A plain
   DOM-order stack can't reproduce both shapes — only one of the two breakpoints could have the
   button adjacent to the headline in source order — so the grid-area assignment does the
   reordering instead of the markup. */
?>
<section id="hero" class="amfc-hero">
	<div class="amfc-container">
		<div class="amfc-hero__grid">
			<div class="amfc-hero__content">
				<p class="amfc-hero__eyebrow"><?= e(t('home.hero.eyebrow')) ?></p>
				<h1 class="amfc-hero__headline">
					<span class="amfc-hero__headline-line"><span class="amfc-hero__headline-line-inner"><?= e(t('home.hero.headline_1')) ?></span></span>
					<span class="amfc-hero__headline-line"><span class="amfc-hero__headline-line-inner"><?= e(t('home.hero.headline_2')) ?></span></span>
					<span class="amfc-hero__headline-line"><span class="amfc-hero__headline-line-inner"><?= e(t('home.hero.headline_3')) ?></span></span>
				</h1>
			</div>
			<div class="amfc-hero__photo-wrap">
				<img class="amfc-hero__photo" src="<?= e(asset('images/hero-photo.png')) ?>" alt="<?= e(t('home.hero.photo_alt')) ?>" width="627" height="627" />
				<img class="amfc-hero__sparkle amfc-hero__sparkle--a" src="<?= e(asset('images/hero-sparkle-small.svg')) ?>" alt="" aria-hidden="true" />
				<img class="amfc-hero__sparkle amfc-hero__sparkle--c" src="<?= e(asset('images/hero-sparkle-large.svg')) ?>" alt="" aria-hidden="true" />
			</div>
			<a href="#service" class="btn btn-primary rounded-pill amfc-hero__cta amfc-btn">
				<span class="amfc-btn__label"><?= e(t('home.hero.cta')) ?></span>
			</a>
		</div>
	</div>
</section>
