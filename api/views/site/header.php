<?php
$sheets = [ "bootstrap.min.css", "font-awesome.min.css", "jquery.jqplot.min.css", "spaces.css", "style.css", "print.css"];
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
	    <meta charset="<?= Yii::$app->charset ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php foreach( $sheets as $sheet): ?>
			<style><?php echo file_get_contents(Yii::getAlias("@webroot")."/css/{$sheet}"); ?></style>
		<?php endforeach; ?>
	</head>
	<body>
		<header class="header">
			<div class="container">
				<div class="logo">
					<img src="<?=Yii::getAlias("@web"); ?>/frontend/web/img/logo-white.png" />
				</div>
			</div>
		</header>
	</body>
</html>