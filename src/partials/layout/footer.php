<?php
/* PORT THIS — CORRECTED: real design (Figma get_design_context, node 87:76-138) has a WHITE
   footer with dark-blue text, not the navy band originally assumed from the screenshot alone.
   Real logo asset and bilingual (zh/en) contact block wired in from the same source. */
?>
<footer class="amfc-footer">
	<div class="container">
		<div class="amfc-footer__nav">
			<div class="amfc-footer__col">
				<div class="amfc-footer__col-title"><?= e(t('footer.col.about.title')) ?></div>
				<ul>
					<li><a href="#about"><?= e(t('footer.col.about.item1')) ?></a></li>
					<li><a href="#about"><?= e(t('footer.col.about.item2')) ?></a></li>
					<li><a href="/hr"><?= e(t('footer.col.about.item3')) ?></a></li>
				</ul>
			</div>
			<div class="amfc-footer__col">
				<div class="amfc-footer__col-title"><?= e(t('footer.col.services.title')) ?></div>
				<ul>
					<li><a href="/product_1"><?= e(t('footer.col.services.item1')) ?></a></li>
					<li><a href="/product_2"><?= e(t('footer.col.services.item2')) ?></a></li>
				</ul>
			</div>
			<div class="amfc-footer__col">
				<div class="amfc-footer__col-title"><?= e(t('footer.col.investor.title')) ?></div>
				<ul>
					<li><a href="/info"><?= e(t('footer.col.investor.item1')) ?></a></li>
				</ul>
			</div>
			<div class="amfc-footer__col">
				<div class="amfc-footer__col-title"><?= e(t('footer.col.news.title')) ?></div>
				<ul>
					<li><a href="/active"><?= e(t('footer.col.news.item1')) ?></a></li>
					<li><a href="/media"><?= e(t('footer.col.news.item2')) ?></a></li>
				</ul>
			</div>
			<div class="amfc-footer__col">
				<div class="amfc-footer__col-title"><?= e(t('footer.col.antifraud.title')) ?></div>
				<ul>
					<li><a href="/anti_fraud"><?= e(t('footer.col.antifraud.title')) ?></a></li>
				</ul>
			</div>
			<div class="amfc-footer__col">
				<div class="amfc-footer__col-title"><?= e(t('footer.col.app.title')) ?></div>
				<ul>
					<li><a href="#app"><?= e(t('footer.col.app.title')) ?></a></li>
				</ul>
			</div>
			<div class="amfc-footer__col">
				<img class="amfc-footer__logo" src="<?= e(asset('images/footer-logo.svg')) ?>" alt="<?= e(t('footer.logo_alt')) ?>" />
			</div>
		</div>

		<div class="amfc-footer__contact">
			<div>
				<div class="amfc-footer__contact-title">
					<?= e(t('footer.contact.customer_service.title_zh')) ?><br />
					<?= e(t('footer.contact.customer_service.title_en1')) ?> <?= e(t('footer.contact.customer_service.title_en2')) ?>
				</div>
				<div><?= e(t('footer.contact.customer_service.phone')) ?></div>
				<div><?= e(t('footer.contact.customer_service.hours_zh')) ?><?= e(t('footer.contact.customer_service.hours_en')) ?></div>
			</div>
			<div>
				<div class="amfc-footer__contact-title">
					<?= e(t('footer.contact.taiwan.title_zh')) ?> / <?= e(t('footer.contact.taiwan.title_en')) ?>
				</div>
				<div><?= e(t('footer.contact.taiwan.address_zh')) ?></div>
				<div><?= e(t('footer.contact.taiwan.address_en')) ?></div>
			</div>
			<div>
				<div class="amfc-footer__contact-title">
					<?= e(t('footer.contact.japan.title_zh')) ?> / <?= e(t('footer.contact.japan.title_en')) ?>
				</div>
				<div><?= e(t('footer.contact.japan.address_zh')) ?></div>
				<div><?= e(t('footer.contact.japan.address_en')) ?></div>
			</div>
		</div>
	</div>
</footer>
