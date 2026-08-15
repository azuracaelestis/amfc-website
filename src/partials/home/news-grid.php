<?php
/* PORT THIS — CORRECTED from the first pass: the real design uses single flattened
   illustration images with text baked in (confirmed via Figma get_design_context — no
   separate title/icon layers exist), not separate icon+heading markup as first built from
   the screenshot. Card destinations map to AMFC's existing /media, /active, /anti_fraud routes. */
?>
<section id="news" class="amfc-news-grid" data-aos="fade-up">
	<div class="container">
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
