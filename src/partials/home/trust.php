<?php
/* PORT THIS — Trust/compliance section, verified against the connected Figma file (node
   87:408). Real badge images, corrected entity name (瑞源證券投資顧問股份有限公司), and the
   two-row badge layout (TFTA + IAS/IAF side by side, entity badge below, spanning both) all
   confirmed via get_design_context — the badge row/column split and gaps below are exact. */
?>
<section id="trust" class="amfc-trust" data-aos="fade-up">
	<div class="amfc-container">
		<div class="amfc-trust__grid">
			<div class="amfc-trust__badges">
				<div class="amfc-trust__badges-row">
					<img class="amfc-trust__badge amfc-trust__badge--tfta" src="<?= e(asset('images/trust-badge-1.png')) ?>" alt="<?= e(t('home.trust.badge.tfta_alt')) ?>" />
					<img class="amfc-trust__badge amfc-trust__badge--iasiaf" src="<?= e(asset('images/trust-badge-2.png')) ?>" alt="<?= e(t('home.trust.badge.ias_iaf_alt')) ?>" />
				</div>
				<img class="amfc-trust__badge amfc-trust__badge--entity" src="<?= e(asset('images/trust-badge-3.png')) ?>" alt="<?= e(t('home.trust.badge.entity_alt')) ?>" />
			</div>
			<div class="amfc-trust__text">
				<h2 class="amfc-trust__heading">
					<!-- Desktop line break — hidden on mobile via CSS display (see
					     .amfc-trust__heading-lines--desktop in amfc-2026.css), not removed from the
					     DOM, but display: none content isn't exposed to assistive tech either, so
					     only one of these two versions is ever actually announced. -->
					<span class="amfc-trust__heading-lines--desktop">
						<?= e(t('home.trust.headline_line1')) ?><br />
						<?= e(t('home.trust.headline_line2')) ?>
					</span>
					<!-- Mobile line break, per feedback. -->
					<span class="amfc-trust__heading-lines--mobile">
						<?= e(t('home.trust.headline_mobile_line1')) ?><br />
						<?= e(t('home.trust.headline_mobile_line2')) ?>
					</span>
				</h2>
				<p class="amfc-trust__body"><?= e(t('home.trust.body')) ?></p>
			</div>
		</div>
	</div>
</section>
