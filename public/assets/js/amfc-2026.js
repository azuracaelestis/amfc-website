/* PORT THIS — vanilla JS in a single AMFC namespace, no jQuery dependency (CLAUDE.md).

   NOTE: the company-philosophy card stack is now a pure-CSS `position: sticky` effect
   (see amfc-2026.css) and needs no JavaScript. The previous initPhilosophyParallax()
   scroll listener was removed: it scrubbed each card's opacity from scroll position and
   set every card — including the first — to opacity 0 at the top of the section, which
   blanked the whole stack until you scrolled into it. Deleting it fixes that; the CSS
   approach is also CSP-safe and honors prefers-reduced-motion via a media query. */
window.AMFC = (function () {
	'use strict';

	/* Hide the floating nav pill on scroll-down, reveal it on scroll-up — per feedback. The
	   actual slide is a CSS transition on .amfc-nav-pill (amfc-2026.css); this just tracks
	   scroll direction and toggles .amfc-nav-pill--hidden. rAF-throttled so the listener never
	   runs more than once per frame regardless of how many scroll events fire. */
	function initNavAutoHide() {
		var nav = document.querySelector('.amfc-nav-pill');
		if (!nav) return;
		// Accessibility floor (CLAUDE.md): don't attach scroll-driven show/hide behavior for
		// reduced-motion users — nav stays put. The CSS has its own belt-and-suspenders
		// fallback for the same reason (see amfc-2026.css), but not attaching the listener at
		// all here means there's no direction-tracking overhead for those users either.
		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

		var lastY = Math.max(0, window.scrollY);
		var ticking = false;
		// Below this, the pill always stays visible regardless of direction — avoids it
		// hiding from a tiny scroll right at the top of the page, and matches its own
		// top:1.5rem resting offset (see amfc-2026.css .amfc-nav-pill).
		var TOP_THRESHOLD = 80;
		// Ignores sub-pixel/momentum-scroll jitter (common on trackpads and iOS bounce
		// scrolling) so the pill doesn't flicker between states on a near-zero delta.
		var DIRECTION_DEADZONE = 5;

		function onScroll() {
			var currentY = Math.max(0, window.scrollY);
			if (currentY <= TOP_THRESHOLD) {
				nav.classList.remove('amfc-nav-pill--hidden');
			} else if (currentY - lastY > DIRECTION_DEADZONE) {
				nav.classList.add('amfc-nav-pill--hidden'); // scrolling down
			} else if (lastY - currentY > DIRECTION_DEADZONE) {
				nav.classList.remove('amfc-nav-pill--hidden'); // scrolling up
			}
			lastY = currentY;
			ticking = false;
		}

		window.addEventListener('scroll', function () {
			if (!ticking) {
				window.requestAnimationFrame(onScroll);
				ticking = true;
			}
		}, { passive: true });
	}

	/* Fades the KSP section's decorative watermark (.amfc-philosophy__watermark) out as the
	   whole section finishes scrolling past — i.e. as it hands off to the Funds partnership
	   section below, not tied to any single card. Sets --amfc-philosophy-watermark-fade (0-1)
	   on the section; the opacity itself stays in CSS (see amfc-2026.css), same division of
	   responsibility as --amfc-nav-shift-y above. rAF-throttled and continuously scroll-
	   scrubbed, same skeleton as initNavAutoHide but driving a numeric value instead of
	   toggling a class. */
	function initPhilosophyWatermarkFade() {
		var section = document.querySelector('.amfc-philosophy');
		if (!section) return;
		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

		// Mobile has its own copy of the mark (.amfc-philosophy__watermark-mobile, sticky-pinned
		// inside the card stack — see amfc-2026.css) alongside desktop's original
		// position: fixed .amfc-philosophy__watermark; only one is ever display:block at a time.
		// Checked once at init, same level of rigor as the rest of this file's breakpoint
		// handling (no resize listener anywhere here) — a mid-session resize across the 992px
		// breakpoint is not a case this project's other scroll-driven effects handle either.
		var isMobile = window.matchMedia('(max-width: 991.98px)').matches;
		var mark = section.querySelector(
			isMobile ? '.amfc-philosophy__watermark-mobile' : '.amfc-philosophy__watermark'
		);
		var intro = section.querySelector('.amfc-philosophy__intro');

		// Fade IN as the intro heading clears the mark's fixed position, which in practice is
		// the moment the heading finishes pinning and the first stat card takes its place at
		// the top of the pile — i.e. "when the first card appears", per feedback.
		//
		// Derived from the two elements' live rects rather than a scroll offset. Keying it off
		// the card's own position was tried first and revealed the mark ~800px too early: while
		// the section is still scrolling in, the heading has not pinned yet and sits low enough
		// to land inside the mark's box, so the two overlapped at full opacity (152px, measured)
		// even though the card was legitimately on screen. Measuring the actual gap encodes the
		// real constraint instead of a proxy for it, and self-corrects across viewport heights
		// without hardcoding the heading's sticky offset or height.
		//
		// Desktop only: on mobile the mark already starts hidden behind card 1 (same
		// --amfc-stack-top offset, lower z-index — see .amfc-philosophy__watermark-slot) rather
		// than sitting in open space waiting to be covered, so there's no equivalent "intro
		// hasn't cleared yet" state to fade in from; mobile's mark is always fadeIn: 1 and only
		// the fade-out ramp below applies to it.
		var IN_DISTANCE = 120; // px of clearance before the mark reaches full opacity

		// Fade OUT as the section hands off to the next one below. Two different pairs of
		// thresholds, because desktop and mobile hand off completely differently:
		//
		// Desktop: FADE_END is 800, not 0, so the mark is gone before the section's tail brings
		// it near the intro heading: the heading pins at clamp(7rem, 20vh, 12rem) and runs
		// ~183px tall, and finishing by 800 clears that on every viewport height. Don't lower it
		// without re-running the overlap check.
		//
		// Mobile: found via feedback (a screenshot showing the mark overlapping Funds
		// partnership's own logo) that leaving mobile's mark permanently opaque (this rule's own
		// prior version pinned it to 1, reasoning the clip-path on
		// .amfc-philosophy__watermark-overlay already contained it) doesn't actually stop it
		// bleeding into the next section — a sticky element holds a FIXED viewport position for
		// a real scroll distance while pinned, and even after release it's still on screen at
		// wherever it was pinned, taking that same distance again (moving normally) to scroll off
		// — confirmed via a sweep: the mark's pinned position stayed constant from well before
		// Funds became visible until well after Funds had scrolled completely past. Fading
		// opacity to 0 sidesteps needing the box to physically clear at all: it's invisible
		// regardless of its remaining bounding-box position. 500/150 were measured against this
		// section's own real .getBoundingClientRect().bottom at a 900px-tall test viewport: 500
		// keeps the mark fully opaque through card 4 settling and the cards' own release starting
		// (~sectionBottom 469-675 across that window), completing the fade to 0 by
		// sectionBottom 150 — well before this section's box fully leaves the viewport
		// (sectionBottom 0) and well before Funds' own content is on screen at all.
		//
		// Bug fix, per feedback (mark missing under the card stack in real Chrome, but present in
		// a taller preview environment): those 500/150 were literal pixel constants, not scaled to
		// the viewport they were measured against — so on any real window SHORTER than 900px
		// (the vast majority of actual phones/browser chrome), --amfc-stack-top and the cards'
		// other vh-relative pin points settle at a smaller on-screen position than they did in
		// that 900px test, while these two thresholds stayed fixed — the fade-out could complete
		// well before card 4 actually finishes settling. Scaled by window.innerHeight (read once,
		// same "no resize listener" convention as the rest of this file) using the ORIGINAL
		// numbers' own ratio to 900px, so behavior at exactly 900px is unchanged and other heights
		// now scale proportionally instead of using a mismatched fixed offset.
		var FADE_START = isMobile ? (window.innerHeight * (500 / 900)) : 1600;
		var FADE_END = isMobile ? (window.innerHeight * (150 / 900)) : 800;
		var ticking = false;

		function onScroll() {
			var fadeIn = 1;
			if (!isMobile && mark && intro) {
				// Negative while the heading still sits inside the mark's box; grows as the
				// heading pins and the pile scrolls up past it.
				var clearance = mark.getBoundingClientRect().top - intro.getBoundingClientRect().bottom;
				fadeIn = clearance / IN_DISTANCE;
				fadeIn = Math.max(0, Math.min(1, fadeIn));
			}

			var bottom = section.getBoundingClientRect().bottom;
			var fadeOut = (bottom - FADE_END) / (FADE_START - FADE_END);
			fadeOut = Math.max(0, Math.min(1, fadeOut));

			// Multiplied, not min(): either end can independently damp the mark, and the
			// product stays smooth where the two ramps overlap on a short viewport.
			section.style.setProperty('--amfc-philosophy-watermark-fade', fadeIn * fadeOut);
			ticking = false;
		}

		window.addEventListener('scroll', function () {
			if (!ticking) {
				window.requestAnimationFrame(onScroll);
				ticking = true;
			}
		}, { passive: true });

		onScroll(); // set the initial value — don't wait for the first scroll event
	}

	/* KSP card 1 only, per feedback: number count-up (0 -> data-count-to, ease-out-cubic,
	   1200ms) and coin flip (see .coin-disc in amfc-2026.css) fire together, once, the moment
	   the card scrolls into view. IntersectionObserver rather than the scroll-listener pattern
	   above — this is a one-shot trigger, not something that needs continuous scroll position,
	   so there's no reason to hand-roll that with rAF-throttled scroll math. */
	function initPhilosophyStat1Reveal() {
		var card = document.querySelector('.amfc-philosophy__stat-card--1');
		if (!card) return;
		var valueEl = card.querySelector('.amfc-philosophy__stat-number-value');
		var target = valueEl ? parseInt(valueEl.getAttribute('data-count-to'), 10) : NaN;

		// Reduced motion: show the final state immediately, no count-up, no coin flip. Skip the
		// observer entirely rather than attach-then-immediately-fire — there's nothing for it
		// to watch for.
		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			if (valueEl && !isNaN(target)) valueEl.textContent = target;
			return;
		}

		if (!('IntersectionObserver' in window)) {
			// No graceful-degradation path worth building for a browser this old — just land
			// on the final state, same as reduced motion above.
			if (valueEl && !isNaN(target)) valueEl.textContent = target;
			return;
		}

		var COUNT_DURATION = 1200;

		// Cubic ease-out: fast start, decelerating finish — 1 - (1-t)^3.
		function easeOutCubic(t) {
			return 1 - Math.pow(1 - t, 3);
		}

		function runCountUp() {
			if (!valueEl || isNaN(target)) return;
			var start = null;
			function frame(now) {
				if (start === null) start = now;
				var t = Math.min(1, (now - start) / COUNT_DURATION);
				var eased = easeOutCubic(t);
				valueEl.textContent = Math.round(eased * target);
				if (t < 1) {
					window.requestAnimationFrame(frame);
				} else {
					valueEl.textContent = target; // guarantees an exact landing, not a rounding-off-by-one
				}
			}
			window.requestAnimationFrame(frame);
		}

		var observer = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) return;
				// Both animations start at the same moment: the coin flip is a plain CSS
				// animation gated on this class (see amfc-2026.css), and the count-up starts
				// in the very same tick.
				card.classList.add('amfc-philosophy__stat-card--revealed');
				runCountUp();
				obs.unobserve(card); // once, no replay on repeated scroll in/out
			});
		}, { threshold: 0.5 });

		observer.observe(card);
	}

	/* KSP cards 3 and 4 only, per feedback: the thumb's entrance nod (.thumb-group) and the
	   bubble-drop + star-cascade (.bubble-shape/.stars-row/.star) each fire once, the moment
	   their card becomes visible, reusing the shared .amfc-philosophy__stat-card--revealed class
	   name — cards 3 and 4 don't cross-talk since each only ever touches its own card element.
	   (Card 2's lightbulb had the same entrance treatment; removed per feedback — card 2 is now a
	   plain static icon and no longer calls this.)

	   BUGFIX: this used to be a plain IntersectionObserver(threshold: 0.5) on the card, same
	   shape as initPhilosophyStat1Reveal below — but cards 2-4 (unlike card 1) carry
	   data-aos="fade" (see philosophy.php), which starts them at opacity: 0 and fades them in on
	   AOS's OWN trigger (anchor-placement "top-center" — a different geometry than a plain
	   50%-of-area check). Geometric intersection crosses 50% well before AOS's trigger fires, so
	   the one-shot bounce/nod was starting — and, being a fast single-shot animation (550-900ms),
	   often finishing and settling back to rest — while the card was still opacity: 0 or barely
	   past it. Measured on a 900px viewport: the old trigger fired at scrollY 650, AOS's
	   .aos-animate (the point the card starts actually fading in) didn't land until scrollY 950,
	   and the card wasn't fully opaque until scrollY 1400 — so the whole animation played out
	   invisibly, well before the user could see the card at all. Card 1 has no data-aos (it's
	   always opaque, "the resting top of the pile"), which is why its own count-up/coin-flip
	   trigger below was never affected by this.

	   Fix: watch the card's own class attribute for AOS's .aos-animate — the actual signal for
	   "this card is visually appearing" — instead of raw viewport geometry, and fire the reveal
	   the first time that happens. AOS re-toggles .aos-animate on repeated scroll in/out
	   (data-aos-once="false" on these cards), but disconnecting the observer after the first hit
	   means the entrance animation itself still only ever plays once, same guarantee as before. */
	function initPhilosophyCardAosReveal(cardSelector) {
		var card = document.querySelector(cardSelector);
		if (!card) return;
		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
		if (!('MutationObserver' in window)) return;

		function reveal(obs) {
			card.classList.add('amfc-philosophy__stat-card--revealed');
			obs.disconnect(); // once, no replay — even though AOS itself keeps toggling aos-animate
		}

		// Covers the (unlikely but possible) case where AOS has already marked the card animated
		// in by the time this runs, e.g. a page load that starts already scrolled.
		if (card.classList.contains('aos-animate')) {
			reveal({ disconnect: function () {} });
			return;
		}

		var observer = new MutationObserver(function () {
			if (card.classList.contains('aos-animate')) reveal(observer);
		});
		observer.observe(card, { attributes: true, attributeFilter: ['class'] });
	}

	/* Touch-only counterpart to the service cards' desktop :hover delight (see amfc-2026.css,
	   ".amfc-service-card:hover .amfc-illo-*"). Two independent behaviors, both gated on the
	   SAME device capability check as the CSS they drive:

	   1. A one-shot illustration animation, played once per card the first time that specific
	      card scrolls ~25% into view (adds .amfc-service-card--played, which the CSS above turns
	      into a ~4.2-4.8s run of that card's own hover keyframes, at their own desktop pace).
	   2. Tap press feedback (.amfc-service-card--pressed) on every touchstart/touchend, available
	      on every tap regardless of whether that card's one-shot has already played.

	   (hover: none) and (pointer: coarse) — not a width breakpoint — is what actually answers
	   "is there a cursor to hover with": a narrow desktop window stays on the :hover path above,
	   a wide touch tablet gets this one, matching the same query the CSS gates on. Generic over
	   however many .amfc-service-card elements exist (currently two — car-loan and
	   personal-loan), each wired up identically and triggered independently, so a future card
	   added to this section picks up both behaviors with no JS change. */
	function initServiceCardTouchDelight() {
		if (!window.matchMedia('(hover: none) and (pointer: coarse)').matches) return;

		var cards = document.querySelectorAll('.amfc-service-card');
		if (!cards.length) return;

		var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		var canObserve = 'IntersectionObserver' in window;

		cards.forEach(function (card) {
			// Press feedback: independent of the one-shot below and unaffected by
			// prefers-reduced-motion — this is direct feedback for a touch already in progress,
			// not decorative motion. touchcancel is covered alongside touchend so a scroll that
			// interrupts the touch still releases the dip instead of leaving it stuck down.
			card.addEventListener('touchstart', function () {
				card.classList.add('amfc-service-card--pressed');
			}, { passive: true });

			['touchend', 'touchcancel'].forEach(function (type) {
				card.addEventListener(type, function () {
					card.classList.remove('amfc-service-card--pressed');
				}, { passive: true });
			});

			// One-shot illustration delight: skipped entirely under reduced motion (per
			// feedback, "skip the auto-play entirely and render the card static") rather than
			// attached and left inert — there's nothing for it to watch for once the CSS side
			// won't animate anyway.
			if (reduceMotion || !canObserve) return;

			var observer = new IntersectionObserver(function (entries, obs) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting) return;
					card.classList.add('amfc-service-card--played');
					obs.unobserve(card); // once — scrolling this card out and back in doesn't replay it
				});
			}, { threshold: 0.25 });

			observer.observe(card);
		});
	}

	/* Touch tap affordance for the "最新消息" news cards — per feedback, these have no button and
	   rely on desktop's hover-float to signal tappability, which doesn't exist on touch. Only the
	   press-down dip needs JS (the chevron is pure CSS, always visible under the same media
	   query — see .amfc-news-card__chevron in amfc-2026.css); this mirrors
	   initServiceCardTouchDelight's press-feedback half exactly, since it's the same interaction
	   pattern (finger-down dip, finger-up/cancel release, one card's press never affecting its
	   siblings). No IntersectionObserver/one-shot half here — these cards have no auto-play
	   motion to trigger, only the always-present chevron plus this per-touch dip. */
	function initNewsCardTouchAffordance() {
		if (!window.matchMedia('(hover: none)').matches) return;

		var cards = document.querySelectorAll('.amfc-news-card');
		if (!cards.length) return;

		cards.forEach(function (card) {
			card.addEventListener('touchstart', function () {
				card.classList.add('amfc-news-card--pressed');
			}, { passive: true });

			['touchend', 'touchcancel'].forEach(function (type) {
				card.addEventListener(type, function () {
					card.classList.remove('amfc-news-card--pressed');
				}, { passive: true });
			});
		});
	}

	/* Mobile menu's inline-expand language disclosure — per feedback, replaces the previous
	   segmented toggle (tap targets too small for a11y) with a standard disclosure-widget
	   pattern: a button (.amfc-nav__lang-toggle) that expands a list (.amfc-lang-list) inline
	   below it, matching the reference screenshots. Owns two things: the expand/collapse state
	   (aria-expanded on the button + the list's own `hidden` attribute) and each option's
	   selection state (aria-pressed). Desktop's dropdown (.amfc-nav__lang-dropdown) is untouched,
	   real Bootstrap markup, no JS of its own needed beyond what Bootstrap already provides —
	   this function only ever touches .amfc-lang-list, which doesn't exist on desktop
	   (.amfc-nav__lang-toggle-mobile is display: none there, see amfc-2026.css), so it's a no-op
	   there regardless of viewport checks. */
	function initLangToggle() {
		var list = document.querySelector('.amfc-lang-list');
		if (!list) return;

		var toggle = document.querySelector('.amfc-nav__lang-toggle-mobile .amfc-nav__lang-toggle');
		if (toggle) {
			toggle.addEventListener('click', function () {
				var expanded = toggle.getAttribute('aria-expanded') === 'true';
				toggle.setAttribute('aria-expanded', String(!expanded));
				list.hidden = expanded;
			});
		}

		var options = Array.prototype.slice.call(list.querySelectorAll('.amfc-lang-list__option'));
		options.forEach(function (option) {
			option.addEventListener('click', function () {
				if (option.getAttribute('aria-pressed') === 'true') return;

				options.forEach(function (opt) {
					opt.setAttribute('aria-pressed', 'false');
				});
				option.setAttribute('aria-pressed', 'true');

				// TODO (AMFC integration): wire selection to the existing
				// AMFC_2025_WEBSITE_lang cookie / set_lang() in their custom.js, per CLAUDE.md —
				// same integration boundary as the desktop dropdown's own identical TODO.
			});
		});
	}

	/* Dissolves each KSP card in as it rises to settle in the stack, per feedback ("each card
	   has the effect of dissolve and appear when goes up").

	   Continuous and scroll-scrubbed, same rAF-throttled skeleton as
	   initPhilosophyWatermarkFade() above, driving a per-card --amfc-en-card-fade custom
	   property that amfc-en.css turns into opacity (default 1, so this degrades correctly
	   without JS or under reduced motion -- neither ever sets the property, so there's no
	   hidden base state to reconcile, unlike a class-toggle approach would need). Bidirectional
	   by construction: scrolling back up naturally un-settles a card and fades it back out,
	   since the value is recomputed from live scroll position every frame rather than fired
	   once like the icon flourishes in initKspSettledAnimations() below -- intentional, since
	   this is meant to track the physical rising motion itself, not mark a one-time arrival.

	   Efficiency's own staggered person entrance is triggered from right here too (see the
	   EFFICIENCY_FADE_TRIGGER block inside onScroll below), not from a separate
	   IntersectionObserver -- a first attempt at "trigger as soon as it appears fully" used
	   threshold:1.0 on IntersectionObserver, which fires purely on GEOMETRY (the card's box
	   entering the viewport), with no idea this card's own opacity is being scrubbed by the
	   fade above. That let the person entrance fire while the card was still almost fully
	   transparent, wasting the whole flourish before anyone could see it play (caught via CDP:
	   is-inview was true while the card's own computed opacity was still near 0). Reusing this
   	   function's own fade calculation guarantees the two are always in sync. */
	function initKspStackFade() {
		var cards = document.querySelectorAll('.amfc-en-principles__stack .amfc-en-stat-card');
		if (!cards.length) return;

		var efficiencyCard = document.querySelector('.amfc-en-stat-card--efficiency');
		// EFFICIENCY_FADE_TRIGGER threshold -- per feedback ("triggered automatically when it
		// appears fully, does not need the user to scroll down"): fires a little before the
		// card is pixel-perfect settled (fade reaches exactly 1 only at that point, same timing
		// as the other three cards' own settle-triggered flourishes), since by ~85% opacity a
		// card already reads as "fully there" to the eye -- shaves off some of the extra scroll
		// this card used to need without playing the flourish while still visibly fading in.
		var EFFICIENCY_TRIGGER_FADE = 0.85;

		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			// No fade tracking happens at all under reduced motion (cards stay at their default
			// opacity:1 the whole time -- see the CSS default), so there's nothing to wait on;
			// mark Efficiency in-view immediately. The actual flourish is still neutered by
			// amfc-en.css's own prefers-reduced-motion block regardless of this class.
			if (efficiencyCard) efficiencyCard.classList.add('is-inview');
			return;
		}

		var FADE_DISTANCE = 200; // px of scroll the dissolve happens over, before the card settles
		var ticking = false;

		function onScroll() {
			cards.forEach(function (card) {
				var stickyTop = parseFloat(getComputedStyle(card).top) || 0;
				var clearance = card.getBoundingClientRect().top - stickyTop;
				var fade = 1 - clearance / FADE_DISTANCE;
				fade = Math.max(0, Math.min(1, fade));
				card.style.setProperty('--amfc-en-card-fade', fade);

				if (card === efficiencyCard && fade >= EFFICIENCY_TRIGGER_FADE) {
					card.classList.add('is-inview'); // idempotent -- fine to call every frame past the threshold
				}
			});
			ticking = false;
		}

		window.addEventListener('scroll', function () {
			if (!ticking) {
				window.requestAnimationFrame(onScroll);
				ticking = true;
			}
		}, { passive: true });

		onScroll(); // set initial values -- don't wait for the first scroll event
	}

	/* Triggers the KSP Integrity (coin-drop), Innovation (icon pop-in), and Professionalism
	   (sequential button press) card animations once each card has actually SETTLED into its
	   pinned spot in the scroll-stack -- not merely once it's 25% visible (an
	   IntersectionObserver threshold, used here originally, fires while the card is still
	   scrolling up INTO its pinned position, so the animation used to start mid-scroll instead
	   of once the card had arrived, per feedback). Efficiency used to be included here too, but
	   now triggers from inside initKspStackFade() above instead (see its own comment for why).

	   All the stat cards share the same position:sticky `top` offset (see
	   .amfc-en-stat-card's own `top: var(--amfc-en-stack-top)` in amfc-en.css), so "settled"
	   has a precise, checkable meaning: a sticky element's `top` CSS property is a fixed pixel
	   offset (resolved by getComputedStyle regardless of custom-property/clamp() indirection --
	   verified: it returns e.g. "160px", not the unresolved var()/clamp() expression), and the
	   element's live getBoundingClientRect().top can only approach that offset from above while
	   still in normal flow, then holds exactly at it once stuck. So the first scroll frame
	   where rect.top <= that offset IS the moment it becomes pinned.

	   querySelector returns null on the zh-Hant-TW homepage (no such classes there), so this is
	   safely cross-page-inert like every other init above. Both effects stay purely CSS-driven
	   (see amfc-en.css's "KSP Integrity"/"KSP Innovation" blocks) -- this only decides WHEN to
	   add .is-inview, same as the reduced-motion swap did before, that's still handled entirely
	   by amfc-en.css's own prefers-reduced-motion rules. */
	function initKspSettledAnimations() {
		var pending = ['.amfc-en-stat-card--integrity', '.amfc-en-stat-card--innovation', '.amfc-en-stat-card--professionalism']
			.map(function (selector) { return document.querySelector(selector); })
			.filter(Boolean);
		if (!pending.length) return;

		function checkAll() {
			pending = pending.filter(function (el) {
				var stickyTop = parseFloat(getComputedStyle(el).top) || 0;
				var isSettled = el.getBoundingClientRect().top <= stickyTop + 1; // +1: subpixel rounding
				if (isSettled) el.classList.add('is-inview');
				return !isSettled;
			});
			if (!pending.length) {
				window.removeEventListener('scroll', onScroll);
				window.removeEventListener('resize', onScroll);
			}
		}

		var ticking = false;
		function onScroll() {
			if (ticking) return;
			ticking = true;
			window.requestAnimationFrame(function () {
				checkAll();
				ticking = false;
			});
		}

		checkAll(); // covers a page load that's already mid-scroll (deep link, reload, back/forward)
		if (pending.length) {
			window.addEventListener('scroll', onScroll, { passive: true });
			window.addEventListener('resize', onScroll);
		}
	}

	/* What We Do (EN page) card 1 illustration: the three floating UI badges (growth-graph,
	   shield, pie-chart) stay hidden until the illustration scrolls into view, then reveal one
	   at a time and settle into their continuous float loop -- purely CSS-driven (see
	   amfc-en.css's ".wwd-card"/".wwd-float" rules), this only decides WHEN to add .is-inview.
	   Card 1 is the default-open accordion panel, so "scrolled into view" is the right trigger
	   for it; card 3's own badges are triggered separately by initWwdCard3Reveal() below, keyed
	   to the accordion panel opening instead, since scroll position alone doesn't mean the user
	   is actually looking at card 3. Fires once via unobserve, same pattern as
	   initKspIntegrityCoinDrop. querySelector returns null on the zh-Hant-TW homepage, so this is
	   safely cross-page-inert. */
	function initWwdCardReveal() {
		var host = document.querySelector('.amfc-en-whatwedo__image--1');
		if (!host || !('IntersectionObserver' in window)) return;

		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			host.classList.add('is-inview');
			return;
		}

		var observer = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) return;
				entry.target.classList.add('is-inview');
				obs.unobserve(entry.target);
			});
		}, { threshold: 0.5 });

		observer.observe(host);
	}

	/* What We Do (EN page) card 3 illustration (legal-scale, shield/lock badges): reveals when
	   the "Risk Management & Compliance" accordion panel actually opens, via Bootstrap's own
	   collapse event, rather than on scroll -- card 3's image sits in the same box as card 1's
	   and only becomes visible once its accordion panel is expanded (see
	   amfc-en.css's ".row:has(#amfcEnWwd3.show) ..." swap rule), so scroll position alone
	   doesn't tell us the user is actually looking at it. Listener removes itself after firing
	   once; if the panel is somehow already open before JS runs (e.g. a future deep-link), the
	   initial check below covers it without waiting for a collapse event that already happened. */
	function initWwdCard3Reveal() {
		var host = document.querySelector('.amfc-en-whatwedo__image--3');
		var panel = document.getElementById('amfcEnWwd3');
		if (!host || !panel) return;

		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			host.classList.add('is-inview');
			return;
		}

		if (panel.classList.contains('show')) {
			host.classList.add('is-inview');
			return;
		}

		panel.addEventListener('shown.bs.collapse', function onShown() {
			host.classList.add('is-inview');
			panel.removeEventListener('shown.bs.collapse', onShown);
		});
	}

	function init() {
		initNavAutoHide();
		initPhilosophyWatermarkFade();
		initPhilosophyStat1Reveal();
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--3');
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--4');
		initServiceCardTouchDelight();
		initNewsCardTouchAffordance();
		initLangToggle();
		initKspStackFade();
		initKspSettledAnimations();
		initWwdCardReveal();
		initWwdCard3Reveal();
		/* AOS (loaded in layout/scripts) handles section reveals; the philosophy stack is
		   CSS-only. Add future modules here. */
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

	return {};
})();
