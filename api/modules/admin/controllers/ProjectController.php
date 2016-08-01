<?php

namespace api\modules\admin\controllers;

use Yii;
use common\models\Project;
use api\controllers\Response;
use yii\web\HttpException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ProjectController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

	private $modelClass = "common\models\Project";

    public function actionIndex(){
        $companies = Project::get();

        return $companies;
    }

    public function actionView($id){
        $item = $this->findModel($id);
        if( empty($item) ){
			$item = new NotFoundHttpException("Este item no ha sido encontrada.");
        }

        return $item;
    }

    public function actionCreate(){
		$model = new Project();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->logo = UploadedFile::getInstance($model, 'logo');
            if( !empty($model->logo) && $model->upload() === false) {
				throw new BadRequestHttpException("Ha ocurrido un error al tratar de crear el logo.");
            }
            throw new HttpException(200, "La empresa ha sido creada con exito.");
        } 
        else {
			throw new BadRequestHttpException("Ha ocurrido un error al tratar de guardar los cambios.");
        }
    }

    public function actionUpdate($id){
        $model = $this->findModel($id);
        $params = $_POST;
        if ($model->load( $params ) && $model->save()) {
            $model->logo = UploadedFile::getInstance($model, 'logo');
            if(  !empty($model->logo) && $model->upload() === false) {
				throw new BadRequestHttpException("Ha ocurrido un error al tratar de actualizar el logo.");
            }
            throw new HttpException(200, "La empresa ha sido actualizada con exito.");
        }
        else{
        	return $model;
			throw new BadRequestHttpException("Ha ocurrido un error al tratar hacer la actualización.");
        }

        return $item;
    }

    public function actionDelete($id){
        $result = $this->findModel($id)->delete();
        throw new HttpException(200, "El item ha sido eliminado con exito.");
    }


    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La pagina no pudo ser encontrada.');
        }
    }
}
