<?php

/* @var $this yii\web\View */

$this->title = 'Reunión de Cierre';
$data = [];
$data['project'] = $project->getAttributes();
$data['subsidiary'] = $subsidiary->getAttributes();
$data['round'] = $round->getAttributes();
$data['evaluation'] = $evaluation->getAttributes();
$data = json_encode($data);
?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" ng-src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1>Reunión de Cierre</h1>
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
                        <td><?php echo $subsidiary->manager; ?></td>
                        <td class="bold">Fecha:</td>
                        <td><?php echo date('d.m.Y'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="content" ng-controller="ReviewController" 
    ng-init='load(<?php echo $data; ?>, <?php echo ($this->context->layout=='print')?'true':'false'; ?>);'>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <h3 class="col-purple">Resultados generales.</h3>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline not-print">
                        <li>
                            <button type="button" class="btn btn--purple" 
                                ng-click="tab = 1" ng-class="{'active': (tab == 1)}">
                                <i class="fa fa-fw fa-bar-chart" aria-hidden="true"></i> Ver gráfico
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn--purple"
                                ng-click="tab = 2" ng-class="{'active': (tab == 2)}">
                                <i class="fa fa-fw fa-bars" aria-hidden="true"></i> Ver listado
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" ng-show="(tab == 1)">
                <div class="float-legend">
                    <ul class="nav nav-pills">
                        <li class="col-purple"><span class="circle bg-purple"></span>Ronda Actual</li>
                        <li class="col-purple"><span class="circle bg-gray"></span>Ronda Anterior</li>
                    </ul>
                </div>
                <div class="col-md-10 col-md-offset-1" style="min-height: 400px;" ui-chart="chartData" chart-options="chartOptions"></div>
            </div>
            <div class="col-md-12" ng-show="(tab == 2)">
                <table class="table table-striped table-review">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="col-white bg-green">Resultado Actual</th>
                            <th class="bg-primary">resultado Anterior</th>
                        </tr>   
                    </thead>
                    <body>
                        <tr ng-repeat="form in table">
                            <td>{{ form.name }}</td>
                            <td>{{ ((form.result)?form.result:'0') | number:2 }}%</td>
                            <td>{{ (form.last_result)?form.last_result+"%":'-' }}</td>
                        </tr>                        
                    </body>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="col-purple">Observaciones generales.</h3>
            </div>
            <div class="col-md-12">
                <uib-accordion close-others="!print">
                    <uib-accordion-group is-open="observation.open" ng-repeat="(key, observation) in observations">
                        <uib-accordion-heading>
                            {{observation.name}}
                            <i class="fa pull-right" ng-class="{'fa-minus': observation.open, 'fa-plus': !observation.open}"></i>
                        </uib-accordion-heading>
                        <p>{{ observation.value }}</p>
                    </uib-accordion-group>
                </uib-accordion>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="col-purple">Detalle de resultados por dimensión.</h3>
            </div>
            <div class="flujo-evaluacion">
                 <uib-tabset ng-if="!print">
                    <uib-tab index="$index" ng-repeat="form in detail">
                        <uib-tab-heading classes="{{ 'col-'+Math.round(12/detail.length) }}">
                            {{ form.name }}
                        </uib-tab-heading>
                        <div class="bg-white">
                            <div class="">
                                <table class="table table-answers">
                                    <thead>
                                        <tr>
                                            <th>Sección</th>
                                            <th>Pregunta</th>
                                            <th>Resultado Actual</th>
                                            <th>Resultado Anterior</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(a, answer) in form.answers">
                                            <td ng-if="!answer.separator" class="bold">{{ answer.fieldset.name }}</td>
                                            <td ng-if="!answer.separator">{{ answer.name }}</td>
                                            <td ng-if="!answer.separator" class="bold">{{ answer.value | number:2 }}%</td>
                                            <td ng-if="!answer.separator" class="bold">{{ lastAnswerValue(form, a) | number:0 }}%</td>
                                            <td ng-if="answer.separator" class="table-separator" colspan="4"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">TOTAL</td>
                                            <td>{{ form.result | number: 2 }}%</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="">
                                <uib-accordion close-others="!print">
                                    <uib-accordion-group is-open="observation.open" 
                                        ng-repeat="(key, observation) in form.observations">
                                        <uib-accordion-heading>
                                            {{ observation.name }}
                                            <i class="fa pull-right" ng-class="{'fa-minus': observation.open, 'fa-plus': !observation.open}"></i>
                                        </uib-accordion-heading>
                                        <ul>
                                            <li ng-repeat="alternative in observation.alternatives"
                                                ><small>{{ alternative }}</small></li>
                                            <li ng-if="observation.value != ''">
                                                <p>{{ observation.value }}</p>
                                            </li>
                                        <ul>
                                    </uib-accordion-group>
                                </uib-accordion>
                            </div>
                        </div>
                    </uib-tab>
                  </uib-tabset>
                 <uib-tabset ng-if="print" ng-repeat="form in detail">
                    <br/>
                    <uib-tab index="$index" >
                        <uib-tab-heading classes="{{ 'col-'+Math.round(12/detail.length) }}">
                            {{ form.name }}
                        </uib-tab-heading>
                        <div class="col-md-12">
                            <div class="bg-white">
                                <table class="table table-answers">
                                    <thead>
                                        <tr>
                                            <th>Sección</th>
                                            <th>Pregunta</th>
                                            <th>Resultado Actual</th>
                                            <th>Resultado Anterior</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(a, answer) in form.answers">
                                            <td ng-if="!answer.separator" class="bold">{{ answer.fieldset.name }}</td>
                                            <td ng-if="!answer.separator">{{ answer.name }}</td>
                                            <td ng-if="!answer.separator" class="bold">{{ answer.value }}%</td>
                                            <td ng-if="!answer.separator" class="bold">{{ lastAnswerValue(form, a) }}%</td>
                                            <td ng-if="answer.separator" class="table-separator" colspan="4"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">TOTAL</td>
                                            <td>{{ form.result | number: 2 }}%</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </uib-tab>
                  </uib-tabset>
            </div>
        </div>
        <div class="clearfix space-top-3">
            <button type="button" class="btn btn-primary pull-right not-print" ng-click="generateReport()">
                Generar informe <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</section>