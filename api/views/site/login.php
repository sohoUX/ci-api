<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="login" ng-controller="LoginController">
    <?php if( \Yii::$app->session->hasFlash('error') ): ?>
        <uib-alert type="danger" close="alert = false" ng-hide="!alert">
            <?=( Yii::$app->session->getFlash('error') ); ?>
        </uib-alert>
        <?php \Yii::$app->session->removeAllFlashes(); ?>
    <?php elseif( \Yii::$app->session->hasFlash('success') ): ?>
        <uib-alert type="success" close="alert = false" ng-hide="!alert">
            <?=( Yii::$app->session->getFlash('success') ); ?>
        </uib-alert>
        <?php \Yii::$app->session->removeAllFlashes(); ?>
    <?php endif; ?>
    <div class="login-form">
        <div class="header">
            <img src="/frontend/web/img/logo.png">
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form', 
            'action' => "login", 
            'options' => ['class' => 'form', 'ng-hide' => '$root.recoveryPassword']]); 
            $form->enableClientScript = false;
        ?>
            <h3>Ingrese sus datos</h3>
            <?php if( !empty($message) ): ?>
                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="sr-only" for="nombre">Nombre</label>
                <?= $form->field($model, 'username', ['template' => '{input}'])->textInput(['autofocus' => true]) ?>
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Contraseña</label>
                <?= $form->field($model, 'password', ['template' => '{input}'])->passwordInput(); ?>
            </div>
            <div class="form-group text-right">
                <a class="col-red a-underline" href="javascript:void(0);" ng-click="$root.recoveryPassword = true">Olvidé mi clave</a>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary">Ingresar <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        <?php ActiveForm::end(); ?>

        <?php $form = ActiveForm::begin([
            'id' => 'recovery-form', 
            'action' => "request_password_reset", 
            'options' => ['class' => 'form hide', 'ng-show' => '$root.recoveryPassword', 'ng-class' => "{'hide': !\$root.recoveryPassword}"]]); 
            $form->enableClientScript = false;
        ?>
            <h3>Ingrese sus datos</h3>
            <div class="form-group">
                <label class="sr-only" for="nombre">Email</label>
                <?= $form->field($resetModel, 'email', ['template' => '{input}'])
                    ->textInput(['autofocus' => true, 'placeholder' => "Correo electronico" ]); ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary">Enviar Contraseña <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div> 
