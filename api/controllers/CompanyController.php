<?php

namespace api\controllers;

use Yii;
use common\models\Project;
use common\models\Company;

class CompanyController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionIndex(){
        $companies = Company::my();

        return $companies;
    }
}
