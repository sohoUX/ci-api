<?php

namespace frontend\controllers;
use common\models\Subsidiary;
use common\models\Project;

class SubsidiaryController extends \yii\web\Controller
{
    public function actionIndex($project_id = null, $id = null)
    {	
    	$project = Project::findOne(['id' => $project_id]);
    	$subsidiary = Subsidiary::findOne(['id' => $id]);
        return $this->render('index', ['project' => $project, 'subsidiary' => $subsidiary]);
    }

    public function actionJson()
    {
    	$consultant = \Yii::$app->user->identity;
        $subsidiaries = $consultant->getSubsidiaries();
    	$projects = Project::findAll(['consultant_id' => $consultant->id, 'status' => Project::STATUS_OPEN]);
    	$results = [];
    	if( !empty($projects) ){
    		foreach( $projects as $project ){
    			$results[] = [
    				'id' => $project->id,
    				'name' => $project->name,
    				'company' => [
    					'id' => $project->company->id,
    					'name' => $project->company->name,
    					'logo' => $project->company->logo,
					],
    			];
    		}
    	}

		\Yii::$app->response->format = 'json';

		return $results;
    }
}
