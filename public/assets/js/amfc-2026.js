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
	   on the section; the actual opacity math (including the 0.06 resting value) stays in CSS
	   (see amfc-2026.css), same division of responsibility as --amfc-nav-shift-y above. rAF-
	   throttled and continuously scroll-scrubbed, same skeleton as initNavAutoHide but driving
	   a numeric value instead of toggling a class. */
	function initPhilosophyWatermarkFade() {
		var section = document.querySelector('.amfc-philosophy');
		if (!section) return;
		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

		// section.getBoundingClientRect().bottom is the section's bottom edge distance from
		// the viewport's top: large while there's still plenty of the section left to scroll
		// through, shrinking toward 0 (then negative) exactly as the section finishes handing
		// off to whatever comes after it. FADE_START/FADE_END map that distance to a 0-1 fade
		// progress: full opacity while comfortably far from the section's end, fully
		// transparent by the time its bottom edge reaches the viewport's top.
		var FADE_START = 800;
		var FADE_END = 0;
		var ticking = false;

		function onScroll() {
			var bottom = section.getBoundingClientRect().bottom;
			var progress = (bottom - FADE_END) / (FADE_START - FADE_END);
			progress = Math.max(0, Math.min(1, progress));
			section.style.setProperty('--amfc-philosophy-watermark-fade', progress);
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

	function init() {
		initNavAutoHide();
		initPhilosophyWatermarkFade();
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
