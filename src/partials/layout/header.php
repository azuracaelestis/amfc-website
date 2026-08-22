<?php
/* PORT THIS — real header logo asset, pulled from the connected Figma file (node 87:55).
   Language dropdown is UI-only — wiring it to AMFC's existing set_lang()/cookie mechanism
   is integration work, out of scope here (see CLAUDE.md "Content & i18n"). */
?>
<header class="amfc-nav-pill">
	<nav class="navbar navbar-expand-lg py-2">
		<a class="navbar-brand amfc-nav__brand" href="/"><img src="<?= e(asset('images/header-logo.svg')) ?>" alt="<?= e(t('site.logo_alt')) ?>" height="47" /></a>
		<!-- Mobile menu toggle, per the Figma mobile frame (AMFC - Homepage (Mobile) Final1).
		     navbar-expand-lg was already collapsing the nav below 992px by Bootstrap's own rules,
		     but with no toggler present the collapsed items had no way to be revealed — they were
		     just rendering wrapped/cramped inside the pill instead of hidden behind a button. This
		     completes the standard Bootstrap 5 collapse pattern rather than introducing a new one;
		     the Figma frame's own two-bar icon isn't reproduced here — Bootstrap's built-in toggler
		     icon (already shipped in the CDN bundle, no new asset) covers the same job. -->
		<button class="navbar-toggler amfc-nav__toggler" type="button" data-bs-toggle="collapse" data-bs-target="#amfcNavCollapse" aria-controls="amfcNavCollapse" aria-expanded="false" aria-label="<?= e(t('nav.toggle')) ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse amfc-nav__collapse" id="amfcNavCollapse">
			<ul class="navbar-nav ms-auto flex-column flex-lg-row align-items-start align-items-lg-center amfc-nav__items">
				<li class="nav-item"><a class="nav-link" href="#about"><?= e(t('nav.about')) ?></a></li>
				<li class="nav-item"><a class="nav-link" href="#service"><?= e(t('nav.services')) ?></a></li>
				<li class="nav-item"><a class="nav-link" href="#news"><?= e(t('nav.news')) ?></a></li>
				<li class="nav-item"><a class="nav-link" href="#investor"><?= e(t('nav.investor')) ?></a></li>
				<!-- Desktop-only — unchanged. Hidden on mobile (amfc-2026.css); the mobile menu
				     panel uses its own inline segmented toggle below instead (per feedback: "no
				     nested dropdown inside the already-open menu"). -->
				<li class="nav-item dropdown amfc-nav__lang-dropdown">
					<!-- TODO (AMFC integration): wire selection to the existing AMFC_2025_WEBSITE_lang
					     cookie / set_lang() already in their custom.js, per CLAUDE.md -->
					<button class="nav-link dropdown-toggle amfc-nav__lang-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<?= e(t('nav.language')) ?>
						<img src="<?= e(asset('images/icon-chevron-down.svg')) ?>" alt="" width="12" height="12" aria-hidden="true" />
					</button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li><a class="dropdown-item" href="#" data-lang="en-US"><?= e(t('nav.lang.en')) ?></a></li>
						<li><a class="dropdown-item" href="#" data-lang="ja-JP"><?= e(t('nav.lang.ja')) ?></a></li>
						<li><a class="dropdown-item" href="#" data-lang="id-ID"><?= e(t('nav.lang.id')) ?></a></li>
					</ul>
				</li>
				<!-- Mobile-only — hidden on desktop (amfc-2026.css). Inline segmented toggle, per
				     feedback: all three languages visible at once, no second overlay to open
				     inside the mobile menu panel. role="radiogroup"/"radio" + aria-checked, not a
				     <select> or Bootstrap dropdown, so it's a single always-visible control rather
				     than a second collapsible layer. JS (initLangToggle in amfc-2026.js) owns
				     selection state and the indicator's slide; this is UI-only, same integration
				     boundary as the desktop dropdown above (TODO comment there applies here too). -->
				<li class="nav-item amfc-nav__lang-toggle-mobile" role="presentation">
					<div class="amfc-lang-toggle" role="radiogroup" aria-label="<?= e(t('nav.language')) ?>">
						<span class="amfc-lang-toggle__indicator" aria-hidden="true"></span>
						<button type="button" class="amfc-lang-toggle__option" role="radio" aria-checked="true" data-lang="en-US"><?= e(t('nav.lang.en')) ?></button>
						<button type="button" class="amfc-lang-toggle__option" role="radio" aria-checked="false" data-lang="ja-JP"><?= e(t('nav.lang.ja')) ?></button>
						<button type="button" class="amfc-lang-toggle__option" role="radio" aria-checked="false" data-lang="id-ID"><?= e(t('nav.lang.id')) ?></button>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>
<?php /* No spacer div: the pill is translucent and floats over the hero's gradient background
         rather than pushing content down like a solid bar — the hero section's own top padding
         (amfc-hero, amfc-2026.css) provides clearance instead. PORT THIS accordingly. */ ?>
