<?php

/* @var $this yii\web\View */

$this->title = 'Sucursales';
$sub = $subsidiary->getAttributes();
?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" ng-src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1>Red de sucursales</h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <a href="/project/<?=$project->id;?>" class="btn btn-primary">
            Cambiar Sucursal <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
        </a>
        <p>Sucursal seleccionada</p>
        <h3 class="sucursal-name"><i class="fa fa-fw fa-university" aria-hidden="true"></i> {{ "<?=$subsidiary->address;?>" }} &#183; {{ "<?=$subsidiary->province->name;?>" }}</h3>
    </div>
</div>

<section class="content" 
    ng-controller="SubsidiaryController" ng-init='load(<?php echo $project->id; ?>, <?php echo $subsidiary->id; ?>, <?php echo $project->id; ?>);'>
    <div class="container">
        <div class="row">
            <div class="col-xs-4" ng-repeat="form in forms">
                <div class="panel-seleccion-evaluar">
                    <div class="panel-header">
                        <h3>{{ form.name }}</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-block" ng-click="evaluate(form.evaluation)"
                                ng-class="{'btn-red': (form.evaluation.status == 0), 'btn-orange': (form.evaluation.status == 1), 'btn-green': (form.evaluation.status == 2)}"
                                >{{ form.evaluation.statusName }} <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </p>
                        <p class="resultado-informe-anterior" ng-if="form.lastest_evaluation"
                        ><small>Resultado informe anterior {{ form.last_result }}%</small>
                        </p>
                        <p ng-if="form.lastest_evaluation">
                            <a class="col-red a-underline" href="javascript:void(0);"
                            ng-click="evaluate(form.lastest_evaluation, false)">Ver resultados anteriores</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-4" ng-if="!has_uncomplete_evaluation">
                <div class="panel-seleccion-evaluar">
                    <div class="panel-header">
                        <h3>Reunión de Cierre</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-block btn-red" 
                                ng-click="closureMeeting(<?php echo $project->currentRound()->id; ?>)">
                                Realizar reunión <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- /container -->
    </div> <!-- /row -->
</section>