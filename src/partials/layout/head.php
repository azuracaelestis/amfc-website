<?php // PORT THIS — adapt into AMFC's existing <head>; keep the CSS load order noted in CLAUDE.md ?>
<meta charset="UTF-8" />
<title><?= e(t('site.name')) ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Same Bootstrap version/URL already CSP-allowlisted on the live site — do not bump, do not self-host -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- AMFC's own stylesheet — develop against the real one; never edit it -->
<link href="https://www.amfc.com.tw/assets/css/custom.css" rel="stylesheet" />

<!-- AOS (scroll reveals) — already loaded on the live site, same CDN/version, CSP-allowlisted -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

<!-- Fonts: Noto Sans TC (headings/body, matches AMFC's own custom.css @import) + DM Sans
     (hero eyebrow / English subheadline copy, per the Figma source's font assignments) -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Noto+Sans+TC:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

<!-- Ours: strictly additive, loaded after AMFC's own CSS -->
<link href="<?= e(asset('css/amfc-tokens.css')) ?>" rel="stylesheet" />
<link href="<?= e(asset('css/amfc-bootstrap-overrides.css')) ?>" rel="stylesheet" />
<link href="<?= e(asset('css/amfc-2026.css')) ?>" rel="stylesheet" />
