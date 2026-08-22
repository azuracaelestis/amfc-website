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
		var FADE_START = isMobile ? 500 : 1600;
		var FADE_END = isMobile ? 150 : 800;
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

	function init() {
		initNavAutoHide();
		initPhilosophyWatermarkFade();
		initPhilosophyStat1Reveal();
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--3');
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--4');
		initServiceCardTouchDelight();
		initNewsCardTouchAffordance();
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
