<?php
require __DIR__ . '/../src/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
	<?php partial('layout/head') ?>
</head>
<body class="theme-2026">
	<?php partial('layout/header') ?>

	<main>
		<?php partial('home/hero') ?>
		<?php partial('home/philosophy') ?>
		<?php partial('home/funds') ?>
		<?php partial('home/services') ?>
		<?php partial('home/trust') ?>
		<?php partial('home/app-download') ?>
		<?php partial('home/investor') ?>
		<?php partial('home/news-grid') ?>
	</main>

	<?php partial('layout/footer') ?>
	<?php partial('layout/scripts') ?>
</body>
</html>
