<?php
/* PORT THIS — real header logo asset, pulled from the connected Figma file (node 87:55).
   Language dropdown is UI-only — wiring it to AMFC's existing set_lang()/cookie mechanism
   is integration work, out of scope here (see CLAUDE.md "Content & i18n"). */
?>
<header class="amfc-nav-pill">
	<nav class="navbar navbar-expand-lg py-2">
		<a class="navbar-brand amfc-nav__brand" href="/"><img src="<?= e(asset('images/header-logo.svg')) ?>" alt="<?= e(t('site.logo_alt')) ?>" height="47" /></a>
		<ul class="navbar-nav ms-auto flex-row align-items-center amfc-nav__items">
			<li class="nav-item"><a class="nav-link" href="#about"><?= e(t('nav.about')) ?></a></li>
			<li class="nav-item"><a class="nav-link" href="#service"><?= e(t('nav.services')) ?></a></li>
			<li class="nav-item"><a class="nav-link" href="#news"><?= e(t('nav.news')) ?></a></li>
			<li class="nav-item"><a class="nav-link" href="#investor"><?= e(t('nav.investor')) ?></a></li>
			<li class="nav-item dropdown">
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
		</ul>
	</nav>
</header>
<?php /* No spacer div: the pill is translucent and floats over the hero's gradient background
         rather than pushing content down like a solid bar — the hero section's own top padding
         (amfc-hero, amfc-2026.css) provides clearance instead. PORT THIS accordingly. */ ?>
