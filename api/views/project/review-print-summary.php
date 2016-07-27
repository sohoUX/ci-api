<?php

/* @var $this yii\web\View */

$this->title = 'Reunión de Cierre';
$data = [];
$data['project'] = $project->getAttributes();
$data['subsidiary'] = $subsidiary->getAttributes();
$data['round'] = $round->getAttributes();
$data['evaluation'] = $evaluation->getAttributes();
$table = [];
foreach($review['labels'] as $key => $label){
    $d = $review['data'];
    $_current = 0;
    $_lastest = 0;
    if( !empty($d) && !empty($d[0]) && !empty($d[0][$key]) ){
        $_current = $d[0][$key];
    }
    if( !empty($d) && !empty($d[1]) && !empty($d[1][$key]) ){
        $_lastest = $d[1][$key];
    }
    $table[] = [ 'name' => $label, 'current' => $_current, 'lastest' => $_lastest ];
}

function lastAnswerValue($form, $key){
    if( !empty($form['last_answers']) && !empty($form['last_answers'][$key]) && !empty($form['last_answers'][$key]['value']) ){
        //echo '<pre>'; print_r( $form['last_answers'][$key] ); echo '</pre>'; exit;
        return $form['last_answers'][$key]['value'];
    }
    else{
        return 0;
    }
};

function totalProgress($answers){
    $total = 0;
    foreach($answers as $key => $answer){
        if( empty($answer['separator']) ){
            $total= $total+$answer['value'];
        }
    }

    return $total;
};


?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1>Reunión de Cierre</h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <p>Estás evaluando</p>
        <div class="table-responsive table-standar">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bold">Sucursal:</td>
                        <td><?php echo $subsidiary->getTitle();?></td>
                        <td class="bold">Consultor SMH:</td>
                        <td><?=(!empty($consultant))?$consultant:'';?></td>
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

<section class="content" ng-controller="ReviewController">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h3 class="col-purple">Resultados generales.</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-legend">
                    <ul class="nav nav-pills">
                        <li class="col-purple"><span class="circle bg-purple"></span>Ronda Actual</li>
                        <li class="col-purple"><span class="circle bg-gray"></span>Ronda Anterior</li>
                    </ul>
                </div>
                <div class="col-md-12" style="min-height: 400px; min-width: 700px;" id="chart1"></div>
            </div>
            <div class="col-md-12">
                <br/>
                <table class="table table-striped table-review">
                    <tbody>
                        <tr style="background-color: transparent!important;">
                            <th></th>
                            <th class="col-white bg-green">Resultado Actual</th>
                            <th class="bg-primary">resultado Anterior</th>
                        </tr>   
                        <?php foreach( $details  as $form): ?>
                        <tr>
                            <td><?php echo $form['name'] ; ?></td>
                            <td><?php echo (!empty($form['result']))?round($form['result'], 2)."%":'-' ; ?></td>
                            <td><?php echo (!empty($form['last_result']))?round($form['last_result'], 2)."%":'-' ; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="col-purple">Observaciones generales.</h3>
            </div>
            <div class="col-md-12" uib-accordion>
               <div role="tablist" class="panel-group">
                    <?php foreach( $review['observations'] as $observation ): ?>
                    <div class="panel panel-open panel-default">
                        <div role="tab" aria-selected="true" class="panel-heading">
                            <h4 class="panel-title">
                                <a role="button" aria-expanded="true" tabindex="0" class="accordion-toggle">
                                    <span uib-accordion-header="" ng-class="{'text-muted': isDisabled}" class="ng-binding">
                                        <span class="ng-binding ng-scope"><?php echo $observation['name']; ?></span>
                                    </span>
                                </a>
                            </h4>
                        </div>
                        <div aria-hidden="false" role="tabpanel" class="panel-collapse collapse in" style="height: auto;">
                            <div class="panel-body">
                                <p><?php echo $observation['value']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="col-purple">Detalle de resultados por dimensión.</h3>
            </div>
            <div class="col-md-12 flujo-evaluacion">
                <?php foreach( $details as $form ): ?>
                <div>
                    <div class="tab-content">
                        <div class="bg-white">
                            <h4>
                                <?php echo $form['name']?>
                                <strong class="pull-right"><?php echo (!empty($form['result']))?round($form['result'], 2):0;?>%</strong>
                            </h4>
                            <div role="tablist" class="panel-group">
                                <?php //echo '<pre>'; print_r( $form['observations'] ); echo '</pre>'; exit; ?>
                                <?php foreach( $form['observations'] as $observation ): ?>
                                <div class="panel panel-open panel-default page-break-inside-avoid">
                                    <div role="tab" aria-selected="true" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" class="accordion-toggle">
                                                <span uib-accordion-header ng-class="{'text-muted': isDisabled}">
                                                    <span class="ng-binding ng-scope"><?php echo $observation['name']; ?></span>
                                                </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div aria-hidden="false" role="tabpanel" class="panel-collapse collapse in" style="height: auto;">
                                        <div class="panel-body">
                                        <ul>
                                        <?php if( !empty($observation['alternatives']) ): ?>
                                            <?php foreach($observation['alternatives'] as $alternative): ?>
                                                <li><small><?php echo $alternative;?></small></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                            <li><p><?php echo $observation['value']; ?></p></li>
                                        <ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-break"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<style>
    html, body{ background-color: #DDDD !important; }
    thead:before, thead:after { display: none; }
    h3.col-purple{ margin-top: 50px !important; }
    .page-break-inside-avoid{ page-break-inside: avoid !important; }
    .page-break{ page-break-before: always; padding-bottom: 10px; }
</style>
<script>
    var color = { purple: '#4e2a54', gray: '#969696' };
    var _options = {
        seriesColors:[color.gray, color.purple],
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
            shadowAngle: 135,
            rendererOptions: {
                barDirection: 'horizontal'
            }
        },
        axes: {
            xaxis: {
                rendererOptions: { forceTickAt0: true, forceTickAt100: true },
                tickOptions: { formatString: "%'d\%" }
            },
            yaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
            }
        }
    };
    _options.axes.yaxis.ticks = <?php echo json_encode($review['labels']); ?>;

    $.jqplot('chart1', <?php echo json_encode($review['data']); ?>, _options);
</script>