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
				<!-- Mobile-only — hidden on desktop (amfc-2026.css). Inline-expand disclosure, per
				     feedback: the previous segmented toggle's tap targets were too small for a11y,
				     and the wanted pattern is "tap Language, the list expands inline below it"
				     (pushing the panel taller, not a floating overlay) rather than all three
				     languages always visible side by side. aria-expanded/aria-controls + the native
				     `hidden` attribute is the standard disclosure-widget pattern — hidden removes the
				     list from the accessibility tree and tab order when collapsed, not just visually.
				     JS (initLangToggle in amfc-2026.js) owns the expand/collapse state and each
				     option's aria-pressed; this is UI-only, same integration boundary as the desktop
				     dropdown above (TODO comment there applies here too). -->
				<li class="nav-item amfc-nav__lang-toggle-mobile" role="presentation">
					<button type="button" class="nav-link amfc-nav__lang-toggle" aria-expanded="false" aria-controls="amfcLangList">
						<?= e(t('nav.language')) ?>
						<img class="amfc-nav__lang-chevron" src="<?= e(asset('images/icon-chevron-down.svg')) ?>" alt="" aria-hidden="true" />
					</button>
					<ul id="amfcLangList" class="amfc-lang-list" hidden>
						<!-- 中文 first and selected by default, per feedback — this site's actual
						     current/only built content language (zh-Hant-TW, see CLAUDE.md "Content
						     & i18n"), so it's the real starting selection, not a placeholder. -->
						<li><button type="button" class="amfc-lang-list__option" data-lang="zh-TW" aria-pressed="true"><?= e(t('nav.lang.zh')) ?><span class="amfc-lang-list__check" aria-hidden="true"></span></button></li>
						<li><button type="button" class="amfc-lang-list__option" data-lang="en-US" aria-pressed="false"><?= e(t('nav.lang.en')) ?><span class="amfc-lang-list__check" aria-hidden="true"></span></button></li>
						<li><button type="button" class="amfc-lang-list__option" data-lang="ja-JP" aria-pressed="false"><?= e(t('nav.lang.ja')) ?><span class="amfc-lang-list__check" aria-hidden="true"></span></button></li>
						<li><button type="button" class="amfc-lang-list__option" data-lang="id-ID" aria-pressed="false"><?= e(t('nav.lang.id')) ?><span class="amfc-lang-list__check" aria-hidden="true"></span></button></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
<?php /* No spacer div: the pill is translucent and floats over the hero's gradient background
         rather than pushing content down like a solid bar — the hero section's own top padding
         (amfc-hero, amfc-2026.css) provides clearance instead. PORT THIS accordingly. */ ?>
