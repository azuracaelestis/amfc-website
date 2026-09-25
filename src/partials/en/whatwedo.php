<?php // PORT THIS — content is a hardcoded stub per CLAUDE.md (no CMS in this repo).
      // Accordion uses Bootstrap's own collapse component (already loaded) rather than new JS.
      // Image swap is CSS-only too (:has()), per the source Figma's 3 states (nodes 321:1108,
      // 334:3898, 334:4102) — see .amfc-en-whatwedo__image's own comment in amfc-en.css. ?>
<section class="amfc-en-whatwedo">
	<div class="container">
		<!-- align-items-center, per feedback ("vertically center aligned with the text
		     section") — safe now in a way it wasn't when align-items-start was introduced: all
		     three accordion panels were standardized to exactly 4 list items each in an earlier
		     round of copy fixes, so the text column's rendered height is now IDENTICAL across
		     all three states (confirmed via getBoundingClientRect: 627px whichever panel is
		     open) — the original jump bug was really "the column's height changes," and that's
		     no longer true here, so centering no longer reintroduces it. -->
		<div class="row align-items-center g-5">
			<div class="col-lg-6">
				<div class="amfc-en-whatwedo__image-wrap" data-aos="zoom-in">
					<span class="amfc-en-whatwedo__image amfc-en-whatwedo__image--1" role="img" aria-label="Illustration of financial technology dashboards and analytics"><?= svg_inline('images/en/whatwedo-illustration.svg') ?></span>
					<span class="amfc-en-whatwedo__image amfc-en-whatwedo__image--2" role="img" aria-label="Illustration of cross-border financial collaboration and partnerships"><?= svg_inline('images/en/whatwedo-illustration-2.svg') ?></span>
					<span class="amfc-en-whatwedo__image amfc-en-whatwedo__image--3" role="img" aria-label="Illustration of risk management and compliance governance"><?= svg_inline('images/en/whatwedo-illustration-3.svg') ?></span>
				</div>
			</div>
			<!-- The column fades up as one block on desktop; on phones the eyebrow/heading/copy each rise
			     on their own like the Products header does (data-aos on the three below), and the column's
			     own motion is switched off -- see the phone motion block in amfc-en.css. -->
			<div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
				<p class="amfc-en-eyebrow" data-aos="fade-up">What We Do</p>
				<h2 class="amfc-en-whatwedo__heading mt-3 mb-3" data-aos="fade-up">Financial Solutions Built for<br class="d-md-none" aria-hidden="true" /> a Changing Asia</h2>
				<p class="mb-4" data-aos="fade-up">Empowering Asian markets with AI-driven, compliant financial technology for individuals and enterprises.</p>

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
							Cross-Border<br class="d-md-none" aria-hidden="true" /> Financial Services
							<img src="<?= e(asset('images/en/icon-chevron-down.svg')) ?>" alt="" aria-hidden="true" />
						</button>
						<div id="amfcEnWwd2" class="collapse" data-bs-parent="#amfcEnWhatWeDoAccordion">
							<ul>
								<li>Regional financial collaboration</li>
								<li>Cross-border financial operations</li>
								<li>Strategic partnerships</li>
								<li>Financial infrastructure development</li>
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
								<li>Proprietary risk mode</li>
								<li>Compliance workflow</li>
								<li>Data security</li>
								<li>ISO-certified governance</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
