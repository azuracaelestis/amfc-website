<?php // PORT THIS — same Bootstrap/AOS versions and URLs already CSP-allowlisted on the live site.
      // Audit fix: SRI hashes added, computed from the exact files these URLs serve. ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"
	integrity="sha384-n1AULnKdMJlK1oQCLNDL9qZsDgXtH6jRYFCpBtWFc+a9Yve0KSoMn575rk755NJZ" crossorigin="anonymous"></script>
<script src="<?= e(asset('js/amfc-2026.js')) ?>"></script>
<script>
	// prefers-reduced-motion handling (CLAUDE.md accessibility floor) — AOS has no built-in
	// option for this, so disable animation entirely rather than only hiding it via CSS.
	AOS.init({
		disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
	});
</script>
