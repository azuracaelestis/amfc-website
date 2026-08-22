<?php
/* PORT THIS — re-verified against the connected Figma file (node 87:76, "footer-desktop").
   White footer, dark-blue text. Structure corrected to match exactly: the logo sits to the
   RIGHT of the 7 nav columns (not as an 8th grid column), a horizontal divider separates the
   nav row from the contact row, and the contact row is 3 label+content groups spread with
   space-between (not a loose grid). Two columns (關於我們, 服務介紹) and the 防詐騙專區 column
   were missing real sub-items entirely — added, confirmed against Figma's actual copy.

   Mobile re-verified separately against the Figma mobile frame (node 145:588,
   "footer-mobile") — a deliberately reduced layout, not a squeezed version of the desktop one:
   no nav columns at all (see .amfc-footer__nav's mobile display:none in amfc-2026.css), only
   the Taiwan/Japan contact groups (Customer Service is desktop-only — see
   .amfc-footer__contact-group--customer-service), a much larger centered logo, and a
   copyright/privacy line that didn't exist in this markup at all before (added below as
   .amfc-footer__legal). That line is confirmed only against the mobile frame — desktop's own
   Figma footer wasn't re-checked for an equivalent, so this new block is mobile-only for now;
   flag for a follow-up look if desktop needs the same content. */
?>
<footer class="amfc-footer">
	<div class="amfc-container">
		<div class="amfc-footer__row">
			<div class="amfc-footer__nav">
				<div class="amfc-footer__col">
					<div class="amfc-footer__col-title"><?= e(t('footer.col.about.title')) ?></div>
					<ul>
						<li><a href="#about"><?= e(t('footer.col.about.item1')) ?></a></li>
						<li><a href="#about"><?= e(t('footer.col.about.item2')) ?></a></li>
						<li><a href="#about"><?= e(t('footer.col.about.item3')) ?></a></li>
						<li><a href="/hr"><?= e(t('footer.col.about.item4')) ?></a></li>
					</ul>
				</div>
				<div class="amfc-footer__col">
					<div class="amfc-footer__col-title"><?= e(t('footer.col.services.title')) ?></div>
					<ul>
						<li><a href="/product_1"><?= e(t('footer.col.services.item1')) ?></a></li>
						<li><a href="/product_2"><?= e(t('footer.col.services.item2')) ?></a></li>
						<li><a href="#app"><?= e(t('footer.col.services.item3')) ?></a></li>
					</ul>
				</div>
				<div class="amfc-footer__col">
					<div class="amfc-footer__col-title"><a href="/info"><?= e(t('footer.col.investor.title')) ?></a></div>
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
						<li><a href="/anti_fraud"><?= e(t('footer.col.antifraud.item1')) ?></a></li>
					</ul>
				</div>
				<div class="amfc-footer__col">
					<div class="amfc-footer__col-title"><?= e(t('footer.col.app.title')) ?></div>
					<ul>
						<li><?= e(t('footer.col.app.item1')) ?></li>
						<li><?= e(t('footer.col.app.item2')) ?></li>
						<li><?= e(t('footer.col.app.item3')) ?></li>
					</ul>
				</div>
				<div class="amfc-footer__col">
					<div class="amfc-footer__col-title"><?= e(t('footer.col.contact.title')) ?></div>
					<ul>
						<li><a href="#top"><?= e(t('footer.col.contact.title')) ?></a></li>
					</ul>
				</div>
			</div>
			<img class="amfc-footer__logo" src="<?= e(asset('images/footer-logo.svg')) ?>" alt="<?= e(t('footer.logo_alt')) ?>" />
		</div>

		<div class="amfc-footer__contact">
			<!-- Desktop-only, per the Figma mobile frame (node 145:588), which has no Customer
			     Service group at all — see .amfc-footer__contact-group--customer-service's mobile
			     display:none in amfc-2026.css. -->
			<div class="amfc-footer__contact-group amfc-footer__contact-group--customer-service">
				<div class="amfc-footer__contact-label">
					<?= e(t('footer.contact.customer_service.title_zh')) ?><br />
					<?= e(t('footer.contact.customer_service.title_en1')) ?><br />
					<?= e(t('footer.contact.customer_service.title_en2')) ?>
				</div>
				<div class="amfc-footer__contact-content amfc-footer__contact-content--narrow">
					<div><?= e(t('footer.contact.customer_service.phone')) ?></div>
					<div><?= e(t('footer.contact.customer_service.hours_zh')) ?><?= e(t('footer.contact.customer_service.hours_en')) ?></div>
				</div>
			</div>
			<div class="amfc-footer__contact-group">
				<div class="amfc-footer__contact-label">
					<?= e(t('footer.contact.taiwan.title_zh')) ?><br />
					<?= e(t('footer.contact.taiwan.title_en')) ?>
				</div>
				<div class="amfc-footer__contact-content">
					<div><?= e(t('footer.contact.taiwan.address_zh')) ?></div>
					<div><?= e(t('footer.contact.taiwan.address_en')) ?></div>
				</div>
			</div>
			<div class="amfc-footer__contact-group">
				<div class="amfc-footer__contact-label">
					<?= e(t('footer.contact.japan.title_zh')) ?><br />
					<?= e(t('footer.contact.japan.title_en')) ?>
				</div>
				<div class="amfc-footer__contact-content">
					<div><?= e(t('footer.contact.japan.address_zh')) ?></div>
					<div><?= e(t('footer.contact.japan.address_en')) ?></div>
				</div>
			</div>
		</div>

		<!-- Mobile-only (see .amfc-footer__legal in amfc-2026.css) — confirmed via the Figma
		     mobile frame (node 145:614/145:615), not present anywhere in the desktop markup
		     before this. -->
		<div class="amfc-footer__legal">
			<p><?= e(t('footer.legal.copyright')) ?></p>
			<a href="/privacy"><?= e(t('footer.legal.privacy')) ?></a>
		</div>
	</div>
</footer>
