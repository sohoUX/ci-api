<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use api\assets\AppAsset;
use common\widgets\Alert;

$sheets = [ "bootstrap.min.css", "font-awesome.min.css", "jquery.jqplot.min.css", "spaces.css", "style.css", "print.css"];

$scripts = [
	"jquery.min.js", 
	"jquery.jqplot.js", 
	"plugins/jqplot.highlighter.js", 
	"plugins/jqplot.cursor.js", 
	"plugins/jqplot.dateAxisRenderer.js", 
	"plugins/jqplot.barRenderer.js", 
	"plugins/jqplot.categoryAxisRenderer.js", 
	"plugins/jqplot.canvasAxisTickRenderer.js", 
	"plugins/jqplot.canvasAxisLabelRenderer.js", 
	"plugins/jqplot.canvasTextRenderer.js", 
	"plugins/jqplot.pointLabels.js"
];
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="main.app">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<?php foreach( $sheets as $sheet): ?>
		<style><?php echo file_get_contents(Yii::getAlias("@webroot")."/css/{$sheet}"); ?></style>
	<?php endforeach; ?>
	<?php foreach( $scripts as $script):
		$script = Yii::getAlias("@webroot")."/js/lib/{$script}";
		if( file_exists($script) ): ?>
		<script><?php echo file_get_contents($script); ?></script>
	<?php endif;
		endforeach; ?>
</head>
<body ng-controller="MainController">
	<header class="header">
		<div class="container">
			<div class="header-avatar">
				<img class="user-profile-image" src="<?=Yii::getAlias("@web"); ?>/api/web/img/profile-small.png">
				<div class="name">
					<p><a class="col-white a-underline" href="javascript:void(0)">Cerrar Sesión</a></p>
				</div>
			</div>
        	<button type="button" class="btn btn-volver" ng-show="$root.backBtn">
        		<i class="fa fa-fw fa-chevron-left" aria-hidden="true"></i> Volver
        	</button>
			<div class="logo">
				<img src="<?=Yii::getAlias("@web"); ?>/api/web/img/logo-white.png" />
			</div>
		</div>
	</header>
    <?= $content ?>
</body>
</html>
<?php $this->endPage() ?>
