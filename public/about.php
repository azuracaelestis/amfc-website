<?php
// PORT THIS — About Us page entry (Figma node 474:30 desktop / 474:257 mobile). Same shell as index.php.
require __DIR__ . '/../src/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
	<?php partial('layout/head', ['page_title' => t('about.page_title'), 'canonical_path' => 'about']) ?>
</head>
<body class="theme-2026">
	<?php partial('layout/header') ?>

	<main>
		<?php partial('about/hero') ?>
		<?php partial('about/intro') ?>
		<?php partial('about/values') ?>
		<?php partial('about/group') ?>
		<?php partial('about/timeline') ?>
	</main>

	<?php partial('layout/footer') ?>
	<?php partial('layout/scripts') ?>
</body>
</html>
