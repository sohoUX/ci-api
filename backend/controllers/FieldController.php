<?php

namespace backend\controllers;

use Yii;
use common\models\Form;
use common\models\Fieldset;
use common\models\Field;
use backend\models\FieldSearch;
use common\models\FieldPredefinedAnswer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use common\helpers\Excel;


/**
 * FieldController implements the CRUD actions for Field model.
 */
class FieldController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Field models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FieldSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Field model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Field model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Field();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Field model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $predefined = $model->getPredefinedYes();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $field = Yii::$app->request->post('Field');
            if( !empty($field['field_skip_logic']) ){
                foreach( $field['field_skip_logic'] as $key => $target ){
                    if( !empty($target) ){
                        $sk = FieldSkipLogic::findOne(['field_id' => $model->id, 'answer' => $key ]);
                        if( !empty($sk) ){
                            $sk->delete();
                        }
                        $fieldSkipLogic = new FieldSkipLogic();
                        $fieldSkipLogic->field_id = $model->id;
                        $fieldSkipLogic->target_id = $target;
                        $fieldSkipLogic->answer = $key;
                        $fieldSkipLogic->save();
                    }
                }
                //echo '<pre>'; print_r( $field['field_skip_logic'] ) ;  echo '</pre>'; exit;
            }
            if( !empty($field['predefined_answer']) ){
                foreach( [1, 2] as $type ){
                    if( empty($field['predefined_answer'][$type]) ){
                        continue;
                    }
                    $answer = $field['predefined_answer'][$type];
                    FieldPredefinedAnswer::deleteAll(['field_id' => $model->id, 'answer' => $type ]);
                    if( !empty($answer) ){
                        foreach( $answer as $key => $detail ){
                            $predefinedAnswer = new FieldPredefinedAnswer();
                            $predefinedAnswer->field_id = $model->id;
                            $predefinedAnswer->detail = $detail;
                            $predefinedAnswer->answer = $type;
                            $predefinedAnswer->save();
                        }
                    }
                }
                //echo '<pre>'; print_r( $field['field_skip_logic'] ) ;  echo '</pre>'; exit;
            }
            //exit;

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Field model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Subsidiary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpload()
    {
        $file = UploadedFile::getInstanceByName('importfile');
        //echo '<pre>'; print_r( Yii::$app->request ); echo '</pre>';
        $error = ['form' => [], 'fieldset' => [], 'field' => [], 'answer' => []];
        $results = [];
        $excel = Excel::open($file->tempName);
        if( !empty($excel) && !empty($excel->document) ){
            $doc = $excel->document;
            unset($excel);
            foreach( $doc->getWorksheetIterator() as $sheet ){
                $rows = $sheet->toArray();
                $title = $sheet->getTitle();
                unset($sheet);
                $form = Form::findOne(['name' => $title]);
                if( empty($form) ){
                    $error['form'][] = "El formulario '{$title}' no existe.";
                    continue;
                }
                $result = [];
                foreach( $rows as $r => $row ){
                    $code = $row[0]; $group = $row[1]; $detail = $row[2]; $type = $row[3];
                    $detail = ucwords($detail);
                    unset($row);
                    if( $type == 'QUESTION' ){
                        $fieldset = Fieldset::findOrCreateByName($group);
                        $field = Field::findOrCreateByName($detail, $code, $fieldset);
                        if( !$field ){
                            $error['field']["A{$r}:D{$r}"] = "Ha ocurrido un error al intentar crear la pregunta";
                        }
                    }
                    elseif( $type == 'YES' ){
                        $fieldAnswer = FieldPredefinedAnswer::findOrCreateByAnswer($detail, $field, 1);
                        if( !$fieldAnswer ){
                            $error['field']["A{$r}:D{$r}"] = "Ha ocurrido un error al intentar crear la respuesta preefinida";
                        }
                    }
                    elseif( $type == 'NO' ){
                        $fieldAnswer = FieldPredefinedAnswer::findOrCreateByAnswer($detail, $field, 2);
                        if( !$fieldAnswer ){
                            $error['field']["A{$r}:D{$r}"] = "Ha ocurrido un error al intentar crear la respuesta preefinida";
                        }
                    }
                    else{
                        $error['fieldset']["A{$r}:D{$r}"] = "El tipo '{$type}' no es valido";
                    }
                }
            }
        }
        $results = [ 'total' => true, 'error' => $error];

        \Yii::$app->response->format = 'json';
        return $results;
    }

    /**
     * Finds the Field model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Field the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Field::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
