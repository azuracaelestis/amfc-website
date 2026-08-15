<?php
/* PORT THIS — the Phase 2 vertical slice, now updated with real badge images and the
   CORRECTED entity name (瑞源證券投資顧問股份有限公司) pulled from the connected Figma file.
   An earlier pass had this wrong from misreading a reduced-size screenshot. */
?>
<section id="trust" class="amfc-trust" data-aos="fade-up">
	<div class="container">
		<div class="amfc-trust__grid">
			<div class="amfc-trust__badges">
				<img src="<?= e(asset('images/trust-badge-1.png')) ?>" alt="<?= e(t('home.trust.badge.tfta_alt')) ?>" />
				<img src="<?= e(asset('images/trust-badge-2.png')) ?>" alt="<?= e(t('home.trust.badge.ias_iaf_alt')) ?>" />
				<img src="<?= e(asset('images/trust-badge-3.png')) ?>" alt="<?= e(t('home.trust.badge.entity_alt')) ?>" />
			</div>
			<div>
				<h2 class="amfc-trust__heading">
					<?= e(t('home.trust.headline_line1')) ?><br />
					<?= e(t('home.trust.headline_line2')) ?>
				</h2>
				<p class="amfc-trust__body"><?= e(t('home.trust.body')) ?></p>
			</div>
		</div>
	</div>
</section>
