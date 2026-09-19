<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo).
      // Accordion uses Bootstrap's own collapse component (already loaded) rather than new JS. ?>
<section class="amfc-en-whatwedo">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-6">
				<img class="amfc-en-whatwedo__image" src="<?= e(asset('images/en/whatwedo-illustration.png')) ?>" alt="Illustration of financial technology dashboards and analytics" width="4096" height="2731" />
			</div>
			<div class="col-lg-6">
				<p class="amfc-en-eyebrow">What We Do</p>
				<h2 class="amfc-en-whatwedo__heading mt-3 mb-3">Financial Solutions Built for a Changing Asia</h2>
				<p class="mb-4">Empowering Asian markets with AI-driven, compliant financial technology for individuals and enterprises.</p>

				<div class="d-flex flex-column gap-3" id="amfcEnWhatWeDoAccordion">
					<div class="amfc-en-accordion-item">
						<button class="amfc-en-accordion-item__toggle" type="button" data-bs-toggle="collapse" data-bs-target="#amfcEnWwd1" aria-expanded="true" aria-controls="amfcEnWwd1">
							Financial Technology Solutions
							<img src="<?= e(asset('images/en/icon-chevron-down.svg')) ?>" alt="" aria-hidden="true" />
						</button>
						<div id="amfcEnWwd1" class="collapse show" data-bs-parent="#amfcEnWhatWeDoAccordion">
							<ul>
								<li>Digital finance platform</li>
								<li>System development</li>
								<li>AI-powered risk assessment</li>
								<li>Workflow automation</li>
							</ul>
						</div>
					</div>
					<div class="amfc-en-accordion-item">
						<button class="amfc-en-accordion-item__toggle" type="button" data-bs-toggle="collapse" data-bs-target="#amfcEnWwd2" aria-expanded="false" aria-controls="amfcEnWwd2">
							Cross-Border Financial Services
							<img src="<?= e(asset('images/en/icon-chevron-down.svg')) ?>" alt="" aria-hidden="true" />
						</button>
						<div id="amfcEnWwd2" class="collapse" data-bs-parent="#amfcEnWhatWeDoAccordion">
							<ul>
								<li>Regional remittance &amp; settlement</li>
								<li>Multi-currency treasury support</li>
							</ul>
						</div>
					</div>
					<div class="amfc-en-accordion-item">
						<button class="amfc-en-accordion-item__toggle" type="button" data-bs-toggle="collapse" data-bs-target="#amfcEnWwd3" aria-expanded="false" aria-controls="amfcEnWwd3">
							Risk Management &amp; Compliance
							<img src="<?= e(asset('images/en/icon-chevron-down.svg')) ?>" alt="" aria-hidden="true" />
						</button>
						<div id="amfcEnWwd3" class="collapse" data-bs-parent="#amfcEnWhatWeDoAccordion">
							<ul>
								<li>Regulatory compliance monitoring</li>
								<li>Fraud detection &amp; prevention</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
