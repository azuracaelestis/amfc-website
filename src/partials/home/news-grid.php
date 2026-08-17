<?php
/* PORT THIS — re-verified against the connected Figma file (node 87:139). Cards are single
   flattened illustration images with text baked in (confirmed — no separate title/icon layers
   exist), so per-card alt text carries the full meaning, no separate per-card heading markup
   needed. Card destinations map to AMFC's existing /media, /active, /anti_fraud routes.

   The section's OWN "最新消息" heading (data-node-id 96:926 in Figma — a real text layer, not
   baked into any card image) was missing from the first pass; added here to match.

   No .amfc-container / Bootstrap .container wrapper: this section's horizontal inset (189px at
   the 1440px reference) is its own bespoke value, not the ~88-120px inset the rest of the page's
   sections share via .amfc-container — so the padding lives directly on .amfc-news-grid instead
   of reusing a container sized for a different width. See amfc-2026.css for the exact figures. */
?>
<section id="news" class="amfc-news-grid" data-aos="fade-up">
	<h2 class="amfc-news-grid__heading"><?= e(t('home.news.heading')) ?></h2>
	<div class="amfc-news-grid__grid">
		<a href="/media" class="amfc-news-card text-decoration-none">
			<img class="amfc-news-card__image" src="<?= e(asset('images/news-media.png')) ?>" alt="<?= e(t('home.grid.media.alt')) ?>" />
		</a>
		<a href="/active" class="amfc-news-card text-decoration-none">
			<img class="amfc-news-card__image" src="<?= e(asset('images/news-event.png')) ?>" alt="<?= e(t('home.grid.event.alt')) ?>" />
		</a>
		<a href="/anti_fraud" class="amfc-news-card text-decoration-none">
			<img class="amfc-news-card__image" src="<?= e(asset('images/news-antifraud.png')) ?>" alt="<?= e(t('home.grid.antifraud.alt')) ?>" />
		</a>
	</div>
</section>
