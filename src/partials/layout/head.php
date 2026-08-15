<?php // PORT THIS — adapt into AMFC's existing <head>; keep the CSS load order noted in CLAUDE.md ?>
<meta charset="UTF-8" />
<title><?= e(t('site.name')) ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Audit fix: the live site's meta description is literally the placeholder string
     "亞太普惠金融科技股份有限公司網站描述" — real copy here, sourced via t() like everything else -->
<meta name="description" content="<?= e(t('site.description')) ?>" />
<!-- Audit fix: og:image and internal links on the live site inconsistently mix amfc.com.tw
     and www.amfc.com.tw — canonicalize on the www host everywhere in our markup -->
<link rel="canonical" href="https://www.amfc.com.tw/" />

<!-- Same Bootstrap version/URL already CSP-allowlisted on the live site — do not bump, do not self-host.
     Audit fix: SRI hash added (absent on the live site) — computed from the exact file this URL serves. -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

<!-- AMFC's own stylesheet — develop against the real one; never edit it -->
<link href="https://www.amfc.com.tw/assets/css/custom.css" rel="stylesheet" />

<!-- AOS (scroll reveals) — already loaded on the live site, same CDN/version, CSP-allowlisted -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"
	integrity="sha384-/rJKQnzOkEo+daG0jMjU1IwwY9unxt1NBw3Ef2fmOJ3PW/TfAg2KXVoWwMZQZtw9" crossorigin="anonymous" />

<!-- Fonts: Noto Sans TC (headings/body, matches AMFC's own custom.css @import) + DM Sans
     (hero eyebrow / English subheadline copy, per the Figma source's font assignments) -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Noto+Sans+TC:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

<!-- Ours: strictly additive, loaded after AMFC's own CSS -->
<link href="<?= e(asset('css/amfc-tokens.css')) ?>" rel="stylesheet" />
<link href="<?= e(asset('css/amfc-bootstrap-overrides.css')) ?>" rel="stylesheet" />
<link href="<?= e(asset('css/amfc-2026.css')) ?>" rel="stylesheet" />
