<?php 
	$ctrl = Yii::$app->controller->id;
	$um = Yii::$app->getUrlManager();
	$modules = [
		[ "path" => Yii::$app->homeUrl,"title" => "Inicio", 'controller' => 'site' ],
		[ "path" => $um->createUrl('user/index'),"title" => "Usuarios", 'controller' => 'user' ],
		[ "path" => $um->createUrl('company/index'),"title" => "Empresas", 'controller' => 'company' ],
		[ "path" => $um->createUrl('subsidiary/index'),"title" => "Sucursales", 'controller' => 'subsidiary' ],
		[ "path" => $um->createUrl('project/index'),"title" => "Proyectos", 'controller' => 'project' ],
		[ "path" => $um->createUrl('evaluation-area/index'),"title" => "Areas de evaluación", 'controller' => 'evaluation_area' ],
		[ "path" => $um->createUrl('form/index'),"title" => "Formularios", 'controller' => 'form' ],
		[ "path" => $um->createUrl('fieldset/index'),"title" => "Grupo de Preguntas", 'controller' => 'fieldset' ],
		[ "path" => $um->createUrl('field/index'),"title" => "Preguntas", 'controller' => 'field' ],
	];
?>
<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">
    	<?php foreach( $modules as $module ): ?>
        <li class="<?php echo ($ctrl == $module['controller'])?'active':''?>">
        	<a href="<?php echo $module['path']; ?>"><?php echo $module['title']; ?></a>
    	</li>
    	<?php endforeach; ?>
    </ul>
</div>