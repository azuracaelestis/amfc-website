# AMFC Website Revamp

## What this repo is

A front-end package for the redesigned AMFC (亞太普惠金融科技) homepage, built to be **ported by AMFC's in-house dev team into their existing PHP application** — not to run as the live site itself. We do not have their PHP source (templates, DB layer, routing). Everything here is written so the port is mechanical rather than interpretive.

**Read this before writing any code.** It exists so a fresh Claude session, or a dev at AMFC who has never seen this conversation, builds the same way.

## What this repo is not

- Not the live site. It has no database, no real routing, no auth.
- Not a place to introduce a new stack. The goal is zero retraining cost for AMFC's team.
- Not a place to build for four languages yet. See **Content & i18n** below.

## The three-zone rule

Every file in this repo falls into exactly one zone. State which zone a new file belongs in when you add it.

| Zone | Rule |
|---|---|
| `public/assets/**` | **Copy verbatim** into AMFC's `assets/` — paths mirror their live convention, so no href rewriting |
| `src/partials/**` | **Port the markup** into their template system |
| `src/bootstrap.php`, `src/helpers.php`, `src/data/`, `tools/`, `dist/` | **Delete** — prototype-only scaffolding, exists so this repo runs standalone |

Mark every file accordingly with a one-line header comment: `PORT THIS` or `PROTOTYPE SCAFFOLDING — DELETE ON INTEGRATION`.

## Stack — pinned to what the live site already serves

Do not deviate from this list. It was read directly off `https://www.amfc.com.tw/`.

- Bootstrap 5.3.3 (via the same `cdn.jsdelivr.net` URL/version already CSP-allowlisted — do not self-host, do not bump the version)
- jQuery 3.7.1, jQuery UI 1.14.0
- AOS 2.3.4 (scroll reveals)
- Font Awesome 6.5.0
- owlCarousel, Fancybox 2.1.5 (legacy — reuse only if a carousel/lightbox is actually needed; do not extend)
- Plain PHP, no framework

## Hard rules

These are constraints, not suggestions. Violating them means the deliverable breaks on AMFC's server even if it works locally.

1. **No build step.** No Composer, no npm, no bundler, no Sass compiler. If stock PHP 7.4+ and `php -S` can't run it, it doesn't ship.
2. **No new CDN origin and no new library.** AMFC's enforced CSP allows `script-src` only from `'self'`, a per-request nonce, `cdn.jsdelivr.net`, `googletagmanager.com`, and `google-analytics.com`. Anything else is silently blocked on their server while appearing to work in local dev — the most likely way this project fails quietly. Vendor or self-host instead.
3. **No inline `<style>` and no inline event handlers (`onclick=`, etc.).** Same CSP reasoning, and it keeps the port clean.
4. **Never edit AMFC's `custom.css` or `custom.js`.** Our stylesheet is strictly additive, loaded *after* theirs, so integration is "add a `<link>`," not "merge a diff."
5. **No business logic, no DB access, no routing beyond one file per page.** Any dynamic data is a hardcoded stub in `src/data/`, clearly commented as a stub.
6. **Develop against AMFC's real `custom.css`.** It's public — fetch it locally so CSS collisions surface in our browser, not theirs.

## CSS architecture

Three layers, loaded in this order, after Bootstrap and after AMFC's own `custom.css`:

1. **`amfc-tokens.css`** — every design decision as an `--amfc-*` custom property. Primitive tier (`--amfc-blue-600`, `--amfc-yellow-400`) feeding a semantic tier that components actually consume (`--amfc-surface-dark`, `--amfc-accent`). Gradients are single tokens, never repeated inline. AMFC's own `custom.css` already defines root-level custom properties (`--primary-color`, `--light-main-color`) — match that existing idiom, don't introduce a foreign one.
2. **`amfc-bootstrap-overrides.css`** — retheme Bootstrap 5.3 by reassigning *its own* CSS variables (`--bs-primary`, `--bs-btn-bg`, etc.), never by writing new selectors against Bootstrap's classes. Two gaps this approach doesn't cover automatically, so handle them explicitly:
   - Utilities like `.text-primary`/`.bg-primary` read `--bs-primary-rgb` — set the `-rgb` twin or they silently stay Bootstrap-default blue.
   - `.btn-primary` hover/active shades are compiled hex values in Bootstrap's distributed CSS, not derived at runtime — override them explicitly.
   - Free win: put `data-bs-theme="dark"` on dark sections (e.g. the stats band, the footer) and Bootstrap 5.3 inverts its component variables automatically.
3. **`amfc-2026.css`** — new component styles, `amfc-` prefixed, BEM-ish (`.amfc-stats__item`). Use Bootstrap's grid and utility classes; don't reinvent spacing or flex helpers that already exist.

**Scoping:** everything new lives under a `.theme-2026` class on `<body>`. This homepage is new while AMFC's inner pages stay on the old design during rollout, and both load the same global `custom.css` — scoping prevents leakage in either direction and makes the whole redesign reversible by removing one class.

**No `@layer`.** It's tempting for cascade control, but an unlayered stylesheet always beats a layered one in specificity — so AMFC's existing unlayered `custom.css` would win every conflict against a layered one of ours. Rely on load order + the `.theme-2026` scope instead.

**Gotcha: AMFC's `custom.css` sets `*, html, body { font-size: 1.1rem }`.** This is actually two separate bugs, both from that one rule:

1. **The universal selector wins over inheritance.** `*` *directly* matches every element, including any bare `<span>`/`<div>` we add — and a property's specified value from a directly-matching rule always wins over inheritance, regardless of how low that rule's specificity is. So any of our elements that don't set their own `font-size`/`font-family` will silently render in AMFC's size/font rather than inheriting what we intended from a parent. Symptom: a font-size or font-family change you just made appears to do nothing. Fix: add an explicit value on the affected element (`font-size: inherit` is *not* enough by itself — see #2) — don't assume plain inheritance will work for text anywhere in this codebase. If you need one rule to fix a whole subtree at once, target every descendant directly: `.your-scope, .your-scope * { font-family: ...; font-size: ...; }` — specificity `(0,1,0)` beats AMFC's plain `*` `(0,0,0)`, and since it's a direct match on each descendant too, inheritance order doesn't matter.
2. **`html { font-size: 1.1rem }` changes what `rem` means for the *entire page*, not just elements it directly matches.** `rem` is always relative to the root element's font-size, and that root is now `17.6px` (1.1 × the standard `16px`), not `16px`. So even *our own* CSS, when written in `rem`, is silently ~10% larger than intended everywhere on the site (e.g. `20.5rem` meant to be `328px` actually computes to `360.8px`). This is easy to miss because most of our fluid sizing already uses `clamp(Xrem, calc(N/1440*100vw), Npx)` — the `px` ceiling dominates at desktop widths, which is where visual checks usually happen, so the inflated `rem` floor goes unnoticed. But any **plain `rem` value** (paddings, gaps, `max-width`, non-fluid font-sizes) is affected. **Prefer raw `px` over `rem` for exact pixel values going forward** — it's immune to this. If you must use `rem`, verify the actual computed pixel value via `getComputedStyle`, don't trust the arithmetic (`16px` × `1rem` ≠ `16px` on this site).

## Naming conventions

- Design tokens: `--amfc-<category>-<name>`, e.g. `--amfc-blue-600`, `--amfc-radius-lg`, `--amfc-grad-hero`
- Component classes: `amfc-<block>__<element>`, e.g. `amfc-stats__item`, `amfc-news-card__title`
- Scope class: `.theme-2026` on `<body>`
- Asset cache-busting: `?v=<filemtime>`, matching the shape AMFC already uses (`custom.css?v=<unix-timestamp>`) so it slots into whatever helper they already have — implement as an `asset()` helper, don't hardcode version strings.

## Content & i18n — deliberately minimal right now

**Build zh-Hant-TW only.** AMFC has confirmed the page structure will differ per language, and English copy will be provided in a later phase. Do **not** build a shared-structure 4-locale abstraction (no key-parity checker, no pseudo-localization tooling, no per-locale layout testing) — that machinery would be solving a problem we don't have yet and would need to be re-architected once real per-language structures arrive.

Still do this much, because it's nearly free and keeps the door open:

- Externalize visible strings into a single `src/lang/zh-Hant-TW.php` returning a flat `key => string` array (structural keys, e.g. `home.hero.headline` — never English text as the key).
- Access strings only through a `t()` helper, never hardcode Chinese copy directly in a partial.
- When English (or another locale) is ready, it becomes its own file/partial set — not a parallel key in this same array. Don't pre-guess its shape.

When multi-language work resumes, preserve AMFC's existing contract exactly: cookie name `AMFC_2025_WEBSITE_lang`, locale codes `en-US` / `zh-TW` / `zh-CN` (or as clarified), and the client-side `set_lang()` entry point already in their `custom.js`. Also note for later: their language auto-detect currently only recognizes `['en-US','zh-TW','zh-CN']` even though the nav switcher offers `ja-JP` and `id-ID` — flag this as a bug to fix, not a pattern to copy.

## Accessibility floor — non-negotiable

- Exactly one `<h1>` per page. (The live homepage currently has zero — this is a real regression to fix, not a nice-to-have.)
- `alt` text on every `<img>`, written as real copy, not filenames.
- A visible `:focus-visible` outline on every interactive element. **AMFC's `custom.css` currently sets `*:focus { outline: none }` and repeats it for `*:focus-visible`, removing keyboard focus indicators across their entire site.** Our `.theme-2026` scope must reinstate a visible focus ring — do not inherit or replicate that rule.
- Respect `prefers-reduced-motion` for AOS scroll animations.
- Explicit `width`/`height` (or `aspect-ratio`) on every image to prevent layout shift.

## JavaScript

- Vanilla JS in an IIFE under a single `AMFC` namespace (`window.AMFC = (function(){ ... })()`), even though jQuery is available — this keeps the port independent of whichever jQuery version (or absence of it) AMFC's templates end up using.
- Reuse libraries already loaded (AOS for reveals, owlCarousel if something needs to scroll) rather than reaching for a new one.
- Leave `data-*` hooks on primary CTAs (e.g. `data-track="hero-cta"`) since GTM/GA event bindings will need to be reconnected at integration — do not assume which selectors their analytics currently depend on.

## Testing limits & escalation — read this before iterating on scroll/animation-timing bugs

- **Headless rAF can silently fail.** `requestAnimationFrame` has been suppressed by Chromium
  for backgrounded/occluded pages since 2011, and in this repo's headless test harness it has
  been observed not firing *at all* over 2+ seconds of wall-clock/virtual time — reproduced with
  both `--dump-dom` and `--screenshot`, on a page that had nothing else going on. This directly
  broke naive verification of the nav-pill auto-hide feature (`initNavAutoHide` in
  `amfc-2026.js`): every `window.dispatchEvent(new Event('scroll'))` looked like it did nothing,
  because the rAF-throttled handler never got a callback to run in. If a scroll- or rAF-driven
  feature (nav auto-hide, scroll-stacking cards, entrance animations, etc.) looks broken *only*
  under headless automation:
  1. Retry the headless launch with `--disable-backgrounding-occluded-windows
     --disable-renderer-backgrounding` — resolves it in many cases.
  2. If still unreliable, verify the decision logic directly instead of chasing the real event
     loop: reproduce the function's actual conditional branches (not a reimplementation you
     trust from memory — copy the real logic) and drive it synchronously with mocked inputs
     against the real shipped CSS. This is how the KSP card entrance and the nav auto-hide
     logic were both confirmed correct in this project after their rAF/scroll-event paths
     wouldn't cooperate headlessly — see git log on `amfc-2026.css`/`amfc-2026.js` for the
     specific verification harnesses used.
  3. This is NOT deterministic — don't assume headless always breaks rAF, and don't assume a
     single failing run proves the code is broken. `prefers-reduced-motion` in particular has
     been observed reporting `true` on some headless invocations and `false` on others with
     *identical* flags in this same environment.
  4. Static, spec-defined things (CSS specificity, selector matching) do NOT need runtime
     verification the way timing-dependent things do — work those out by hand and trust the
     math. But don't keep rewriting code on the strength of a failed headless *timing* check
     alone — flag it for a real-browser check instead of guessing at further code changes.

- **Stop-and-escalate, don't loop.** If you can't get a reliable pass/fail signal for an
  interaction after ~2 distinct verification attempts, stop modifying code for that task.
  Summarize what you tried, why it can't be verified here, and ask for a real-browser check or
  more input. Burning further attempts rewriting already-correct code because headless couldn't
  confirm it wastes effort and risks introducing a real regression to "fix" a test artifact.

## How to run

```
php -S localhost:8000 -t public
```

No other setup. If a change requires more than this to preview, it has violated a hard rule above.

## Known audit findings to fix in our markup

- Zero `<h1>` on the current homepage
- Placeholder meta description (currently literally "亞太普惠金融科技股份有限公司網站描述")
- No canonical tag; `og:image` and internal links inconsistently mix `amfc.com.tw` and `www.amfc.com.tw` — use `https://www.amfc.com.tw/` everywhere
- No Subresource Integrity on third-party CDN assets — add `integrity`/`crossorigin` where the CDN supports it

## Known issues that are AMFC's to fix (document, don't attempt to fix here)

- `PHPSESSID` cookie missing `Secure`/`HttpOnly`/`SameSite`
- No `Strict-Transport-Security` header
- Enforced CSP restricts only `script-src`; a separate `default-src 'self'` exists only as `Content-Security-Policy-Report-Only` and was seemingly never promoted
- Missing `X-Content-Type-Options`, `Referrer-Policy`; Apache version banner exposed in `Server` header
- `robots.txt` and `sitemap.xml` both 302-redirect to `index.php` instead of returning real files
- Unknown URLs return a 302 to the homepage instead of a 404 (soft-404, hides broken links from crawlers and from AMFC)
- Contradictory cache headers: `Cache-Control: public, max-age=31536000` alongside an already-expired `Expires: Thu, 19 Nov 1981` and `Pragma: no-cache`

## Assets

- Getty preview images currently in the design folder (filenames ending `-170667a`) are **not licensed for production and are too low-resolution to ship** — flag any use of them rather than shipping them, and ask for licensed originals.
- Derive color/type tokens from AMFC's brand guideline PDFs, not by eyedropping values off comps.
