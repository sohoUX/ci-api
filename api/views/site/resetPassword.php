<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="login" class="site-reset-password">
    <div class="login-form">
        <div class="header">
            <img src="/frontend/web/img/logo.png">
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'options' => ['class' => 'form']]); ?>
                    <div class="form-group">
                        <h3>Recuperar contraseña</h3>
                        <p>Por favor ingrese una nueva contraseña:</p>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password', ['template' => '{input}'])
                            ->passwordInput(['autofocus' => true, 'placeholder' => 'Contraseña']) ?>
                    </div>
                    <div class="form-group text-center">
                        <?= Html::submitButton('Cambiar contraseña', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
