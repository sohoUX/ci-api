<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'brandLabel' => 'Sellutions',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
if( !Yii::$app->user->isGuest ){
    $menuItems = [
        ['label' => Yii::$app->user->identity->username, 'url' => 'javascript:void(0);'],
    ];
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Salir',
            ['class' => 'btn btn-link']
        )
        . Html::endForm()
        . '</li>';
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
}
NavBar::end();
?>

<div class="container-fluid">
    <?php if(Yii::$app->user->identity): ?>
        <?php echo $this->render("@app/views/site/sidebar"); ?>
    <?php endif; ?>
    <div class="col-md-offset-2 col-md-9">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
