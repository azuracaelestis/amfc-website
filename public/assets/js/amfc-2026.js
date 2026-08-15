/* PORT THIS — vanilla JS, no jQuery dependency, so the port doesn't care which (if any)
   jQuery version AMFC's templates end up using. See CLAUDE.md "JavaScript". */
window.AMFC = (function () {
	'use strict';

	function clamp(value, min, max) {
		return Math.min(Math.max(value, min), max);
	}

	/* Scroll-scrubbed card reveal for the "company philosophy" stat-card stack. Genuinely tied
	   to scroll position (not a one-shot trigger): scrolling down reveals cards one at a time,
	   each stacking on the last; scrolling back up un-reveals them in reverse. Respects
	   prefers-reduced-motion by not attaching the listener at all — the CSS fallback
	   (amfc-2026.css, prefers-reduced-motion block) shows a static, fully-revealed stack instead. */
	function initPhilosophyParallax() {
		var track = document.querySelector('.amfc-philosophy__scroll-track');
		var cards = document.querySelectorAll('.amfc-philosophy__stat-card');
		if (!track || !cards.length) return;

		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

		var numCards = cards.length;
		var ticking = false;

		function update() {
			ticking = false;

			var scrollableDistance = track.offsetHeight - window.innerHeight;
			if (scrollableDistance <= 0) return; // section shorter than viewport, nothing to scrub

			var rect = track.getBoundingClientRect();
			var scrolled = -rect.top;
			var progress = clamp(scrolled / scrollableDistance, 0, 1);

			cards.forEach(function (card, i) {
				var segment = 1 / numCards;
				var start = i * segment;
				var local = clamp((progress - start) / segment, 0, 1);
				var rotate = parseFloat(card.getAttribute('data-rotate')) || 0;

				card.style.opacity = String(local);
				card.style.transform = 'translateY(' + (1 - local) * 60 + 'px) rotate(' + rotate + 'deg)';
			});
		}

		function onScroll() {
			if (!ticking) {
				window.requestAnimationFrame(update);
				ticking = true;
			}
		}

		window.addEventListener('scroll', onScroll, { passive: true });
		window.addEventListener('resize', onScroll, { passive: true });
		update(); // set initial state on load, before any scroll event fires
	}

	function init() {
		initPhilosophyParallax();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

	return { initPhilosophyParallax: initPhilosophyParallax };
})();
