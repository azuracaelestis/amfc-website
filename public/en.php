<?php
require __DIR__ . '/../src/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php partial('en/head') ?>
</head>
<body class="theme-en">
	<?php partial('en/header') ?>

	<main>
		<?php partial('en/hero') ?>
		<?php partial('en/trust') ?>
		<?php partial('en/principles') ?>
		<?php partial('en/funds') ?>
		<?php partial('en/whatwedo') ?>
		<?php partial('en/products') ?>
		<?php partial('en/cta') ?>
		<?php partial('en/media-grid') ?>
	</main>

	<?php partial('en/footer') ?>
	<?php partial('layout/scripts') ?>
</body>
</html>
