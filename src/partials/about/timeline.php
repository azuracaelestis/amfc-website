<?php
/* PORT THIS — 大事紀 (Figma 474:204 band + 474:205-240): five dated milestones, newest first.
   Static stub copy in the lang file; CTA href is an intentionally empty placeholder. */
?>
<section id="timeline" class="amfc-about-timeline">
	<div class="amfc-container">
		<h2 class="amfc-about__section-title"><?= e(t('about.timeline.title')) ?></h2>
		<ol class="amfc-about-timeline__list">
			<?php for ($i = 1; $i <= 5; $i++): ?>
				<li class="amfc-about-timeline__item">
					<p class="amfc-about-timeline__date">
						<span class="amfc-about-timeline__year"><?= e(t("about.timeline.$i.year")) ?></span>
						<span class="amfc-about-timeline__month"><?= e(t("about.timeline.$i.month")) ?></span>
					</p>
					<p class="amfc-about-timeline__body"><?= e(t("about.timeline.$i.body")) ?></p>
				</li>
			<?php endfor; ?>
		</ol>
		<div class="amfc-about-timeline__cta-wrap">
			<a href="" class="btn btn-primary rounded-pill amfc-btn amfc-about__cta" data-track="about-timeline-cta"><span class="amfc-btn__label"><?= e(t('about.cta')) ?></span></a>
		</div>
	</div>
</section>
