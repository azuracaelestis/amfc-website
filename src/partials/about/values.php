<?php
/* PORT THIS — 公司經營理念 (Figma 474:123-255): four static value cards in one row. Same facts as
   the homepage KSP cards, so the copy reuses home.philosophy.stat*.* rather than duplicating it;
   the icons are this frame's own (simpler) art, not the homepage's animated illustrations. */
$stat1 = t('home.philosophy.stat1.number_prefix') . t('home.philosophy.stat1.number_value') . t('home.philosophy.stat1.number_suffix');
$cards = [
	['mod' => 'trust',      'n' => 1, 'number' => $stat1],
	['mod' => 'innovation', 'n' => 2, 'number' => t('home.philosophy.stat2.number')],
	['mod' => 'efficiency', 'n' => 3, 'number' => t('home.philosophy.stat3.number')],
	['mod' => 'expertise',  'n' => 4, 'number' => t('home.philosophy.stat4.number')],
];
?>
<section class="amfc-about-values">
	<div class="amfc-container">
		<h2 class="amfc-about__section-title"><?= e(t('about.values.title')) ?></h2>
		<ul class="amfc-about-values__list">
			<?php foreach ($cards as $c): ?>
				<li class="amfc-about-values__card amfc-about-values__card--<?= e($c['mod']) ?>">
					<span class="amfc-about-values__art" aria-hidden="true">
						<?php if ($c['mod'] === 'trust'): ?>
							<img class="amfc-about-values__icon-coin" src="<?= e(asset('images/about/value-coin.svg')) ?>" alt="" width="59" height="59" />
						<?php elseif ($c['mod'] === 'innovation'): ?>
							<img class="amfc-about-values__icon-spark-lg" src="<?= e(asset('images/about/value-spark-lg.svg')) ?>" alt="" width="17" height="16" />
							<img class="amfc-about-values__icon-bulb" src="<?= e(asset('images/about/value-bulb.svg')) ?>" alt="" width="47" height="71" />
							<img class="amfc-about-values__icon-spark-sm" src="<?= e(asset('images/about/value-spark-sm.svg')) ?>" alt="" width="10" height="11" />
						<?php elseif ($c['mod'] === 'efficiency'): ?>
							<img class="amfc-about-values__icon-thumbsup" src="<?= e(asset('images/about/value-thumbsup.svg')) ?>" alt="" width="102" height="87" />
						<?php else: ?>
							<img class="amfc-about-values__icon-bubble" src="<?= e(asset('images/about/value-bubble.svg')) ?>" alt="" width="109" height="48" />
							<img class="amfc-about-values__icon-stars" src="<?= e(asset('images/about/value-stars.svg')) ?>" alt="" width="88" height="14" />
						<?php endif; ?>
					</span>
					<span class="amfc-about-values__tag"><?= e(t('home.philosophy.stat' . $c['n'] . '.tag')) ?></span>
					<span class="amfc-about-values__number"><?= e($c['number']) ?></span>
					<span class="amfc-about-values__label"><?= e(t('home.philosophy.stat' . $c['n'] . '.label')) ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
