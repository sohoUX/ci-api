<?php
	if( !empty($params) ){ //echo '<pre>'; print_r( $params ); echo '</pre>'; exit;
		extract($params);
	}
?>
<div style="<?=$styles->feature;?>">
    <div class="container">
		<h3 class="col-purple">Minuta de Cierre</h3>
            <table class="table" width="60%">
                <tbody>
                    <tr>
                        <td><strong>Empresa:</strong></td>
                        <td><?php echo $project->company->name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Projecto:</strong></td>
                        <td><?php echo $project->name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Sucursal:</strong></td>
                        <td><?php echo $subsidiary->address; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gerente:</strong></td>
                        <td><?php echo $subsidiary->manager; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Consultor SMH:</strong></td>
                        <td><?=Yii::$app->user->identity->getFullName();?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<section style="<?=$styles->section;?>">
    <div style="<?=$styles->container;?>">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                   <p><?= $message ?></p>
                </div>
                <div class="col-md-12">
                	<?php if($observations): ?>
                    <h3>Observaciones de Reunión</h3>
                    	<div>
	                    <?php foreach( $observations as $observation ): ?>
	                    	<div>
		                    	<strong><?=$observation->name;?></strong>
		                    	<p><?=$observation->value;?></p>
	                    	</div>
	                	<?php endforeach; ?>
	                	</div>
                	<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>