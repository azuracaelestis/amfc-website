<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo). ?>
<footer class="amfc-en-footer">
	<div class="container">
		<div class="amfc-en-footer__top">
			<div class="amfc-en-footer__categories">
				<div class="amfc-en-footer__category">
					<h2>About Us</h2>
					<a href="#about">About AMFC</a>
					<a href="#milestones">Milestones</a>
					<a href="#sustainability">Corporate Sustainability</a>
					<a href="#careers">Careers</a>
				</div>
				<div class="amfc-en-footer__category">
					<h2>Services</h2>
					<a href="#vehicle-loan">Vehicle Loan</a>
					<a href="#personal-loan">Personal Loans</a>
					<a href="#buddy-loan">Buddy Loan</a>
				</div>
				<div class="amfc-en-footer__category">
					<h2>Investment</h2>
				</div>
				<div class="amfc-en-footer__category">
					<h2>News</h2>
					<a href="/active.html">Event</a>
					<a href="/media.html">Media</a>
				</div>
				<div class="amfc-en-footer__category">
					<h2>Anti-Fraud</h2>
					<a href="/anti_fraud.html">Fraud Prevention</a>
				</div>
				<div class="amfc-en-footer__category">
					<h2>AMFC App</h2>
					<a href="#amfc-smart-loan">AI Money Fast Center</a>
					<a href="#buddy-loan-app">Buddy Loan</a>
					<a href="#billing">Payment</a>
				</div>
				<div class="amfc-en-footer__category">
					<h2>Contact Us</h2>
					<a href="#contact" id="contact">Contact Us</a>
				</div>
			</div>
			<div class="amfc-en-footer__logo">
				<!-- Phones get the faint grey watermark lockup, like the Chinese footer's mobile layout. -->
				<picture>
					<source media="(max-width: 767.98px)" srcset="<?= e(asset('images/amfc-logo-grey.svg')) ?>" />
					<img src="<?= e(asset('images/en/footer-logo.svg')) ?>" alt="AMFC" width="285" height="147" />
				</picture>
			</div>
		</div>

		<div class="row g-4 amfc-en-footer__contact">
			<div class="col-md-4 amfc-en-footer__service">
				<p class="amfc-en-footer__contact-label">Customer Service</p>
				<p class="mb-0">(886) 2 6604 0880</p>
				<p class="mb-0">Business Hour 9:00-18:00</p>
			</div>
			<div class="col-md-4">
				<p class="amfc-en-footer__contact-label"><span class="amfc-en-footer__zh">臺灣據點</span>Taiwan Office</p>
				<div class="amfc-en-footer__contact-content">
					<p class="mb-0">B2., No. 9-1, Dehui St., Zhongshan Dist., Taipei City, 104439, Taiwan (R.O.C)</p>
					<!-- Phones only: the Customer Service block is hidden there, so its number is folded
					     into the Taiwan office, as on the Chinese footer's mobile layout. -->
					<p class="mb-0 amfc-en-footer__phone">(886) 2 6604 0880</p>
				</div>
			</div>
			<div class="col-md-4">
				<p class="amfc-en-footer__contact-label"><span class="amfc-en-footer__zh">日本據點</span>Japan Office</p>
				<div class="amfc-en-footer__contact-content">
					<p class="mb-0 amfc-en-footer__jp-name">AMFC JAPAN</p>
					<p class="mb-0">Hankyu Grand Building, 26F 8&minus;47 Kakuda-cho, Kita Ward Osaka 530-0017 Japan</p>
				</div>
			</div>
		</div>
		<!-- Phone design only (hidden >=768px in CSS). -->
		<div class="amfc-en-footer__copyright">
			<p>&copy;2026 FUNDS AMFC Asia-Pacific Inclusive Financial Technology. All Rights Reserved.</p>
			<a href="/privacy">Privacy Policy</a>
		</div>
	</div>
</footer>
