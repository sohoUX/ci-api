<?php

/* @var $this yii\web\View */

$this->title = 'Proyectos';
?>
<div class="title">
    <div class="container">
        <h1>Bienvenido <?=Yii::$app->user->identity->name?></h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <h2>Seleccione una opción</h2>
        <p>Podrás generar y editar evaluaciones, informes y comentarios</p>
    </div>
</div>
<section class="content" ng-controller="IndexController">
    <div class="container">
        <div class="row">
            <div class="col-xs-4" ng-repeat="project in projects">
                <div class="panel-seleccion-proyecto">
                    <div class="panel-header">
                        <img title="{{ project.company.name }}" ng-src="{{ project.company.logo }}">
                    </div>
                    <div class="panel-body">
                        <a href="{{ 'project/'+project.id }}" class="btn btn-primary">{{ project.name }} <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</section>