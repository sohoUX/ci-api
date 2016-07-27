<?php

/* @var $this yii\web\View */

$this->title = 'Sucursales';
?>
<div class="title">
    <div class="container">
        <h1>Bienvenid@ <?=Yii::$app->user->identity->name?></h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <h2>Seleccione una opción</h2>
        <p>Podrás generar y editar evaluaciones, informes y comentarios</p>
    </div>
</div>

<section class="content" ng-controller="ProjectController" ng-init="init(<?=$project->id?>)">
    <div class="container">
        <div class="loading" ng-show="loadingSubsidiaries">
            <div class="step1"></div>
            <div class="step2"></div>
        </div>
        <p ng-repeat="(s, subsidiary) in subsidiaries">
            <a href="{{ '/project/<?=$project->id?>/subsidiary/'+subsidiary.id }}" class="btn btn-primary">
                <i class="fa fa-fw fa-university" aria-hidden="true"></i>
                {{ subsidiary.address }} &#183; {{ subsidiary.commune.name }} &#183; {{ showDistance(subsidiary) }}
            </a>
        </p>
    </div> <!-- /container -->
</section>