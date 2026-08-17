<?php
/* PORT THIS — Investor relations section, verified against the connected Figma file (node
   87:348). Real photo and copy confirmed; layout rebuilt to match the exact structure
   (photo + text block inside a shared padded/gapped row, not a loose two-column grid). */
?>
<section id="investor" class="amfc-investor" data-aos="fade-up">
	<div class="amfc-container">
		<div class="amfc-investor__card">
			<div class="amfc-investor__photo-wrap">
				<img class="amfc-investor__photo" src="<?= e(asset('images/investment.png')) ?>" alt="<?= e(t('home.investor.photo_alt')) ?>" />
			</div>
			<div class="amfc-investor__text">
				<h2 class="amfc-investor__heading"><?= e(t('home.investor.headline')) ?></h2>
				<p class="amfc-investor__body"><?= e(t('home.investor.body')) ?></p>
				<a href="/info" class="amfc-investor__cta">
					<?= e(t('home.investor.cta')) ?>
					<img src="<?= e(asset('images/icon-arrow-right.svg')) ?>" alt="" width="19" height="19" aria-hidden="true" />
				</a>
			</div>
		</div>
	</div>
</section>
