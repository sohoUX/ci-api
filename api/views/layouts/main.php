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

$loggedUser = (!empty($loggedUser))?$loggedUser:Yii::$app->user->identity;

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
    <style>
		.loading {
			width: 40px;
			height: 40px;
			position: relative;
			margin: 100px auto;
		}

		.step1, .step2 {
			width: 100%;
			height: 100%;
			border-radius: 50%;
			background-color: #333;
			opacity: 0.6;
			position: absolute;
			top: 0;
			left: 0;
			-webkit-animation: loading 2.0s infinite ease-in-out;
			animation: loading 2.0s infinite ease-in-out;
		}

		.step2 {
			-webkit-animation-delay: -1.0s;
			animation-delay: -1.0s;
		}

		@-webkit-keyframes loading {
			0%, 100% { -webkit-transform: scale(0.0) }
			50% { -webkit-transform: scale(1.0) }
		}

		@keyframes loading {
			0%, 100% { 
				transform: scale(0.0);
				-webkit-transform: scale(0.0);
			} 50% { 
				transform: scale(1.0);
				-webkit-transform: scale(1.0);
			}
		}
    </style>
</head>
<body ng-controller="MainController">
<?php $this->beginBody() ?>
	<header class="header">
		<div class="container">
			<div class="header-avatar">
				<img class="user-profile-image" src="<?=Yii::getAlias("@web"); ?>/api/web/img/profile-small.png">
				<div class="name">
					<p><?=(!empty($loggedUser))?$loggedUser->fullname:'';?></p>
					<p>
						<form action="<?=Yii::getAlias("@web"); ?>/logout" method="POST">
						   	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
							<button class="btn btn-link col-white a-underline">Cerrar Sesión</button>
						</form>
					</p>
				</div>
			</div>
        	<button type="button" class="btn btn-volver" ng-show="$root.backBtn" ng-click="$root.goBack()">
        		<i class="fa fa-fw fa-chevron-left" aria-hidden="true"></i> Volver
        	</button>
			<div class="logo">
				<img src="<?=Yii::getAlias("@web"); ?>/api/web/img/logo-white.png" />
			</div>
		</div>
	</header>
	<div class="loading" ng-hide="!$root.loader">
		<div class="step1"></div>
		<div class="step2"></div>
	</div>
	<div style="visibility: hidden;" ng-style="{'visibility':(!$root.loader)?'visible':''}">
    	<?= $content ?>
    </div>
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
