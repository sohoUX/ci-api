<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(["reset-password/{$user->password_reset_token}"]);
?>
<div class="password-reset">
    <p>Hola <?= Html::encode($user->username) ?>,</p>
    <p>En el siguiente link podras recuperar tu contraseña:</p>
    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
