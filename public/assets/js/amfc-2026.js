/* PORT THIS — vanilla JS in a single AMFC namespace, no jQuery dependency (CLAUDE.md).

   NOTE: the company-philosophy card stack is now a pure-CSS `position: sticky` effect
   (see amfc-2026.css) and needs no JavaScript. The previous initPhilosophyParallax()
   scroll listener was removed: it scrubbed each card's opacity from scroll position and
   set every card — including the first — to opacity 0 at the top of the section, which
   blanked the whole stack until you scrolled into it. Deleting it fixes that; the CSS
   approach is also CSP-safe and honors prefers-reduced-motion via a media query. */
window.AMFC = (function () {
	'use strict';

	function init() {
		/* No scroll-linked JS on the homepage at the moment. AOS (loaded in layout/scripts)
		   handles section reveals; the philosophy stack is CSS-only. Add future modules here. */
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}

	return {};
})();
