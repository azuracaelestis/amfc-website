<?php
/* PORT THIS — re-verified against the connected Figma file (node 87:139). Cards are single
   flattened illustration images with text baked in (confirmed — no separate title/icon layers
   exist), so per-card alt text carries the full meaning, no separate per-card heading markup
   needed. Card destinations map to AMFC's existing /media, /active, /anti_fraud routes.

   The section's OWN "最新消息" heading (data-node-id 96:926 in Figma — a real text layer, not
   baked into any card image) was missing from the first pass; added here to match.

   Content now wrapped in .amfc-container, per feedback, to match the footer's width below it —
   Figma's own literal measurement for this section (189px inset at the 1440px reference,
   1062px content width) was used at first, but that's narrower than .amfc-container's ~1264px,
   and the user asked for visual consistency with the footer over the exact Figma figure. The
   mint background band + rounded top corners stay full-bleed on the outer <section> — only the
   heading/card content is now width-constrained, same split as every other section that uses
   .amfc-container. See amfc-2026.css for the padding math. */
?>
<section id="news" class="amfc-news-grid" data-aos="fade-up">
	<div class="amfc-container amfc-news-grid__inner">
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
	</div>
</section>
