<?php

/* @var $this yii\web\View */

$this->title = 'Observaciones de '.$evaluation->form->name;
?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" ng-src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1>Evaluación de <strong>"<?php echo $evaluation->form->name; ?>"</strong></h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <button type="button" class="btn btn-primary" ng-click="$root.go('/')">
            Guardar y salir <i class="fa fa-fw fa-sign-out" aria-hidden="true"></i>
        </button>
        <p>Estás evaluando</p>
        <div class="table-responsive table-standar">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bold">Sucursal:</td>
                        <td><?php echo $subsidiary->getTitle();?></td>
                        <td class="bold">Consultor SMH:</td>
                        <td><?=Yii::$app->user->identity->getFullName();?></td>
                    </tr>
                    <tr>
                        <td class="bold">Gerente:</td>
                        <td><?php echo $subsidiary->manager; ?> <a class="col-red a-underline hidden" href="javascript:void(0)">ingresar otro</a></td>
                        <td class="bold">Fecha:</td>
                        <td><?php echo date('d.m.Y'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="content" ng-controller="ObservationsController" 
    ng-init='load(<?php echo $evaluation->id; ?>, <?php echo $subsidiary->id; ?>, <?php echo $project->id; ?>);'>
    <div class="container">
        <h2 class="col-purple">Observaciones en la evaluación.</h2>
        <form class="form form-observaciones">
            <div class="row">
                <div class="col-sm-6 col-md-6" ng-repeat="(o, observation) in observations">
                    <div class="form-group alternatives" ng-init="$root.log(observation)">
                        <label for="fortalezas">{{ observation.name }}</label>
                        <div ng-if="hasAlternatives(observation)">
                            <ul>
                                <li ng-repeat="alternative in observation.alternatives"><small>{{ alternative }}</small></li>
                            </ul>
                        </div>
                        <input ng-if="observation.slug != 'priority_conductive' && observation.slug != 'tactical_plan'"
                        placeholder="Escribe algun comentario adicional" class="form-control" ng-model="observations[o].value" ng-change="save()"/>
                        <textarea ng-if="observation.slug == 'priority_conductive' || observation.slug == 'tactical_plan'"
                        class="form-control" ng-model="observations[o].value" rows="5" ng-change="save()"></textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="clearfix space-top-3">
            <button type="button" class="btn btn-primary pull-right" ng-click="goToNextDimension()">
                Evaluar siguiente dimensión {{ next.form_name }} <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn--red" 
                ng-click="$root.go('/project/<?php echo $project->id;?>/subsidiary/<?php echo $subsidiary->id; ?>')">Ir a otras dimensiones</button>
        </div>
    </div>
</section>