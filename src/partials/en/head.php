<?php // PORT THIS — adapt into AMFC's existing <head>; keep the CSS load order noted in CLAUDE.md ?>
<meta charset="UTF-8" />
<title>AMFC | Institutional Trust Meets AI-Driven Financial Solutions</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="AMFC powers secure, AI-driven financial ecosystems across Asia — consumer financing, investment services, and compliant fintech built on institutional-grade governance." />
<link rel="canonical" href="https://www.amfc.com.tw/en" />

<!-- Same Bootstrap version/URL already CSP-allowlisted on the live site — do not bump, do not self-host. -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

<!-- AMFC's own stylesheet — develop against the real one; never edit it -->
<link href="https://www.amfc.com.tw/assets/css/custom.css" rel="stylesheet" />

<!-- AOS (scroll reveals) — already loaded on the live site, same CDN/version, CSP-allowlisted -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"
	integrity="sha384-/rJKQnzOkEo+daG0jMjU1IwwY9unxt1NBw3Ef2fmOJ3PW/TfAg2KXVoWwMZQZtw9" crossorigin="anonymous" />

<!-- Fonts: DM Sans (this page's primary typeface) + Noto Sans TC (eyebrow labels + the
     footer's bilingual office copy, per the Figma source's font assignments). Weights extended
     to 600/800/900 vs. the zh-Hant-TW page's own head.php — this design uses DM Sans SemiBold
     (nav links), ExtraBold (product card labels) and Black (stat numbers) that page doesn't. -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800;900&family=Noto+Sans+TC:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

<!-- Ours: strictly additive, loaded after AMFC's own CSS. Only amfc-en.css — this page doesn't
     use the zh-Hant-TW homepage's amfc-tokens.css/amfc-bootstrap-overrides.css/amfc-2026.css
     stack (different design system entirely, see that file's own header comment). -->
<link href="<?= e(asset('css/amfc-en.css')) ?>" rel="stylesheet" />
