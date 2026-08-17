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

		// The mark is position: fixed, so it never moves — opacity is the whole effect, and
		// this is the only thing standing between it and being visible over the entire page.
		var mark = section.querySelector('.amfc-philosophy__watermark');
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
		var IN_DISTANCE = 120; // px of clearance before the mark reaches full opacity

		// Fade OUT as the section hands off to Funds. FADE_END is 800, not 0, so the mark is
		// gone before the section's tail brings it near the intro heading: the heading pins at
		// clamp(7rem, 20vh, 12rem) and runs ~183px tall, and finishing by 800 clears that on
		// every viewport height. Don't lower it without re-running the overlap check.
		var FADE_START = 1600;
		var FADE_END = 800;
		var ticking = false;

		function onScroll() {
			var fadeIn = 1;
			if (mark && intro) {
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

	/* KSP cards 2 and 3 only, per feedback: the lightbulb's entrance bounce (.bulb-group) and
	   the thumb's entrance nod (.thumb-group) each fire once, the moment their card becomes
	   visible, reusing the shared .amfc-philosophy__stat-card--revealed class name — cards 2 and
	   3 don't cross-talk since each only ever touches its own card element.

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

	function init() {
		initNavAutoHide();
		initPhilosophyWatermarkFade();
		initPhilosophyStat1Reveal();
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--2');
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--3');
		initPhilosophyCardAosReveal('.amfc-philosophy__stat-card--4');
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
