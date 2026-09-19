<?php
/* PORT THIS — real header logo asset, pulled from the connected Figma file (node 321:1075).
   Language control is UI-only — wiring it to AMFC's existing set_lang()/cookie mechanism is
   integration work, out of scope here (see CLAUDE.md "Content & i18n"). */
?>
<header>
	<nav class="navbar navbar-expand-lg amfc-en-nav">
		<div class="container-fluid px-0">
			<a class="navbar-brand" href="/en"><img src="<?= e(asset('images/en/nav-logo.svg')) ?>" alt="AMFC" height="53" /></a>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#amfcEnNavCollapse" aria-controls="amfcEnNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="amfcEnNavCollapse">
				<ul class="navbar-nav align-items-lg-center gap-lg-4">
					<li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="#news">Latest News</a></li>
					<li class="nav-item dropdown">
						<!-- TODO (AMFC integration): wire selection to the existing
						     AMFC_2025_WEBSITE_lang cookie / set_lang() already in their custom.js -->
						<button class="nav-link dropdown-toggle border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Language
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="/" data-lang="zh-TW">繁體中文</a></li>
							<li><a class="dropdown-item" href="#" data-lang="en-US">English</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
