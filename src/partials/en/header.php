<?php
/* PORT THIS — real header logo asset, pulled from the connected Figma file (node 321:1075).
   Language control is UI-only — wiring it to AMFC's existing set_lang()/cookie mechanism is
   integration work, out of scope here (see CLAUDE.md "Content & i18n"). */
?>
<header>
	<nav class="navbar navbar-expand-lg amfc-en-nav">
		<div class="container-fluid px-0">
			<a class="navbar-brand" href="<?= e(page_url('en')) ?>"><img src="<?= e(asset('images/en/nav-logo.svg')) ?>" alt="AMFC" height="53" /></a>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#amfcEnNavCollapse" aria-controls="amfcEnNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="amfcEnNavCollapse">
				<ul class="navbar-nav align-items-lg-center gap-lg-4">
					<li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="#news">Latest News</a></li>
					<!-- Desktop only (hidden below 992px in amfc-en.css): a Bootstrap dropdown. Phones get the
					     inline-expand disclosure below instead, same pattern as the Chinese page's nav. -->
					<li class="nav-item dropdown amfc-en-nav__lang-dropdown">
						<!-- TODO (AMFC integration): wire selection to the existing
						     AMFC_2025_WEBSITE_lang cookie / set_lang() already in their custom.js -->
						<button class="nav-link dropdown-toggle border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Language
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="<?= e(page_url('zh')) ?>" hreflang="zh-Hant-TW" lang="zh-Hant-TW" data-lang="zh-TW">繁體中文</a></li>
							<li><a class="dropdown-item" href="#" data-lang="en-US">English</a></li>
						</ul>
					</li>
					<!-- Phones only. Class names match what initLangToggle() (amfc-2026.js) looks for --
					     it owns the expand/collapse (aria-expanded + the list's `hidden`) and each
					     option's aria-pressed. UI-only, same integration boundary as the dropdown above. -->
					<li class="nav-item amfc-nav__lang-toggle-mobile" role="presentation">
						<button type="button" class="nav-link amfc-nav__lang-toggle" aria-expanded="false" aria-controls="amfcEnLangList">
							Language
							<img class="amfc-nav__lang-chevron" src="<?= e(asset('images/icon-chevron-down.svg')) ?>" alt="" aria-hidden="true" />
						</button>
						<ul id="amfcEnLangList" class="amfc-lang-list" hidden>
							<li><button type="button" class="amfc-lang-list__option" data-lang="zh-TW" data-href="<?= e(page_url('zh')) ?>" aria-pressed="false">繁體中文<span class="amfc-lang-list__check" aria-hidden="true"></span></button></li>
							<li><button type="button" class="amfc-lang-list__option" data-lang="en-US" aria-pressed="true">English<span class="amfc-lang-list__check" aria-hidden="true"></span></button></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
