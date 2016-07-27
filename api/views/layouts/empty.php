<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use api\assets\AppAsset;
use common\widgets\Alert;

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
    <?php $this->head() ?>
</head>
<body ng-controller="MainController">
<?php $this->beginBody() ?>
        <?= $content ?>
<?php $this->endBody() ?>
<script src="<?=Yii::getAlias("@web")."/api/web/js/main.js"; ?>"></script>
<?php
	$scriptName = Yii::$app->controller->id.".".Yii::$app->controller->action->id.".js";
	$scriptFile = Yii::getAlias("@webroot")."/js/".$scriptName;
	$scriptPath = Yii::getAlias("@web")."/api/web/js/".$scriptName;
	if( file_exists($scriptFile) ){
		echo "<script src='{$scriptPath}'></script>";
	}
?>
</body>
</html>
<?php $this->endPage() ?>
