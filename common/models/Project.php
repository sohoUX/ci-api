<?php

namespace common\models;

use Yii;
use common\helpers\Pdf;
use common\helpers\Mailer;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property integer $area_id
 * @property integer $company_id
 * @property integer $user_id
 * @property integer $consultant_id
 * @property integer $status
 * @property integer $rounds
 * @property string $created_at
 * @property string $updated_at
 * @property array $forms
 * @property array $subsidiaries
 */
class Project extends \yii\db\ActiveRecord
{

    const STATUS_OPEN = 1;
    const STATUS_CLOSE = 2;
    const STATUS_PAUSE = 3;

    public $rounds_count = 0;
    public $status_name = "";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'area_id', 'user_id', 'consultant_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'company_id' => 'Empresa',
            'user_id' => 'Usuario',
            'area_id' => 'Area',
            'rounds' => 'Rondas',
            'consultant_id' => 'Consultor',
            'status' => 'Estado',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
            'subsidiaries' => 'Sucursales',
            'forms' => 'Formularios',
        ];
    }

    public function beforeSave($insert = false) {
        if ($insert):
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->user_id = Yii::$app->user->identity->id;
        else:
            $this->updated_at = date('Y-m-d H:i:s');
        endif;

        return parent::beforeSave($insert);
    }

    public function afterSave($insert = false, $attributes = []) {
        if ($insert):
            $this->createBlankRound();
        endif;

        return parent::afterSave($insert, $attributes);
    }

    public static function statusLabels($status = null)
    {
        $statuses = [
            self::STATUS_OPEN  => "Abierto",
            self::STATUS_CLOSE => "Cerrado",
            self::STATUS_PAUSE => "Pausado"
        ];
        if( !empty($status) ){
            return $statuses[$status];
        }
        else{
            return $statuses;
        }
    }

    public static function populateRecord($record, $row){
        $record->status_name = self::statusLabels($row['status']);
        return parent::populateRecord($record, $row);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany() {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultant() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluations() {
        return $this->hasMany(Evaluation::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidiaries() {
        return $this->hasMany(Subsidiary::className(), ['id' => 'subsidiary_id'])
        ->viaTable('project_subsidiary', ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoundObservations() {
        return $this->hasMany(ProjectRoundObservations::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function linkSubsidiaries($subsidiaries = []) {
        if( !empty($subsidiaries) ){
            $this->unlinkAll('subsidiaries');
            foreach($subsidiaries as $sub ){
                if (($subsidiary = Subsidiary::findOne($sub)) !== null) {
                    $this->link('subsidiaries', $subsidiary);
                }
            }
        }
        return $this;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForms() {
        return $this->hasMany(Form::className(), ['id' => 'form_id'])
            ->viaTable('project_form', ['project_id' => 'id'])
            ;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSortedForms() {
        $model = $this;
        $projectForms = ProjectForm::find()
            ->where(['project_id' => $model->id ])
            ->orderBy("position")
        ->all();
        $forms = [];
        foreach( $projectForms as $projectForm ){
            $forms[] = $projectForm->form;
        }

        return $forms;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function linkForms($forms = [], $percentages = [], $positions = []) {
        if( !empty($forms) ){
            $this->unlinkAll('forms');
            foreach($forms as $form_id ){
                if (($form = Form::findOne($form_id)) !== null) {
                    $percentage = (!empty($percentages[$form_id]))?$percentages[$form_id]:0;
                    $position = (!empty($positions[$form_id]))?$positions[$form_id]:0;
                    $this->link('forms', $form, 
                        ['percentage' => $percentage, 'position' => $position]);
                }
            }
        }
        return $this;
    }

    private function createBlankRound(){
        $round = new Round;
        $round->name = "Ronda 1";
        $round->project_id = $this->id;
        $round->position = 1;
        $round->start_date = date('Y-m-d H:i:s');
        $round->end_date = date('Y-m-d H:i:s');
        $round->status = 1;

        $round->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function linkRounds($rounds = []) {
        if( !empty($rounds) ){
            $i = 1;
            //Round::deleteAll("project_id = {$this->id}");
            $roundIds = [];
            foreach($rounds as $rnd ){
                $round = Round::findOne(['project_id' => $this->id, 'position' => $i ]);
                if( empty( $round ) ){
                    $round = new Round();    
                }

                $round->name = $rnd['name'];
                $round->project_id = $this->id;
                $round->position = $i;
                $round->start_date = $rnd['start_date'];
                $round->end_date = $rnd['end_date'];
                if( !empty($rnd['status']) && $rnd['status'] == 1 ){
                    $round->status = $rnd['status'];
                }
                else{
                    $round->status = 0;
                }
                $round->save();
                $roundIds[] = $round->id;
                $i++;
            }
            $roundIds = join(", ", $roundIds);
            Round::deleteAll("id NOT IN ($roundIds) AND project_id = {$this->id}");
        }
        return $this;
    }

    static function my(){
        $user = \Yii::$app->user->identity;

        return self::findAll(['status' => self::STATUS_OPEN]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRounds() {
        return $this->hasMany(Round::className(), ['project_id' => 'id']);
    }

    public function currentRound(){
        return Round::findOne(['project_id' => $this->id, 'status' => 1]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea() {
        return $this->hasOne(EvaluationArea::className(), ['id' => 'area_id']);
    }

    public function findClosuremeeting($subsidiary_id){
        $project = $this;
        $round = $this->currentRound();
        $params = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary_id, 'round_id' => $round->id ];
        $pro = ProjectRoundObservation::findOne($params);
        if( empty($pro) ){
            $pro = new ProjectRoundObservation();
            $pro->project_id = $project->id;
            $pro->subsidiary_id = $subsidiary_id;
            $pro->round_id = $round->id;
            $pro->save();
        }

        return $pro;
    }

    public function saveClosureMeeting($params = []){
        $project = $this;
        extract( $params );
        $pro = ProjectRoundObservation::findOne(compact('project_id', 'round_id', 'subsidiary_id'));
        if( empty($pro) ){
            $pro = new ProjectRoundObservation();
            $pro->project_id = $project->id;
            $pro->subsidiary_id = $subsidiary_id;
            $pro->round_id = $round_id;
            $pro->save();
        }
        $pro->comment = (!empty($comment))?$comment:"";
        $pro->strengths = (!empty($strengths))?$strengths:"";
        $pro->improvement_opportunities = (!empty($improvement_opportunities))?$improvement_opportunities:"";
        $pro->priority_conductive = (!empty($priority_conductive))?$priority_conductive:"";
        $pro->tactical_plan = (!empty($tactical_plan))?$tactical_plan:"";

        return $pro->save();
    }

    public function sendMemo($subsidiary = null, $round = null, $params = [], $report = null){
        $project = $this;
        $project_id = $this->id;
        $subsidiary_id = $subsidiary->id;
        $round_id = $round->id;
        $targets = $params['targets'];
        if( !empty($targets) && count($targets) ){
            $messages = [];
            $params = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary_id, 'round_id' => $round->id ];
            $evaluation = Evaluation::findOne($params);
            $pro = ProjectRoundObservation::findOne($params);
            if( !empty($pro) ){
                $observations = $pro->getObservations();
                foreach( $observations as $i => $observation ){
                    $observations[$i] = (object)$observation;
                }
            }
            else{
                $observations = [];
            }
            $consultant = \Yii::$app->user->identity;
            $message = "Estimado, <br/>".
                "En el documento adjunto se encuentra el reporte de la evaluación ".
                "realizada por {$consultant->getFullName()}.<br/>";
                "El cual a compartido contigo.<br/>";
            $mailer = new Mailer();
            $mailer
                ->addParam('project', $project)
                ->addParam('subsidiary', $subsidiary)
                ->addParam('round', $round)
                ->addParam('observations', $observations)
                ->addParam('message', $message)
                ->addParam('consultant', $consultant->getFullName())
                ->addTargets($targets);

            $mailer->setSubject("Reporte de evaluación");
            if( !empty( $report ) ){
                $mailer->addFile($report);
            }
            $response = $mailer->send();
        }
        else{
            $response = false;
        }

        return $response;
    }

    public function getReviewData($subsidiary = null, $round = null){
        if( empty($round) ){
            return null;
        }
        $project = $this;
        $db = \Yii::$app->getDb();
        
        $forms = "SELECT e.id, e.form_id, f.name FROM evaluation e LEFT JOIN form f ON( f.id = e.form_id )
            WHERE e.project_id = {$project->id} AND e.subsidiary_id = {$subsidiary->id} 
            AND e.round_id = {$round->id}";
        $forms = $db->createCommand($forms)->queryAll();
        $pdo = $db->pdo;
        $chart_data = [];
        foreach( $forms as $form  ){
            $query = "CALL get_review_data({$form['form_id']}, {$form['id']});";
            $statement = $query;
            $pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
            $query = $pdo->query($query);
            $results = $query->fetchAll();
            $amount = 0;
            foreach( $results as $result ){
                $amount = $amount+$result['result'];
            }
            $response = new \stdClass;
            $response->id = $form['form_id'];
            $response->name = $form['name'];
            $response->percent = $amount;
            $chart_data[] = $response;
        }

        return $chart_data;
    }

    public function getReviewChartData($subsidiary = null, $round = null){
        $review_data = $this->getReviewData($subsidiary, $round);
        $chartData = $review_data;
        return $chartData;
    }


    public function getFormsWithPercentage(){
        $project = $this;
        $query = "SELECT f.id AS 'id', f.name AS 'name', pf.percentage as 'percentage'
            FROM project p
            LEFT JOIN project_form pf ON( pf.project_id = p.id )
            LEFT JOIN form f ON( f.id = pf.form_id )
            WHERE p.id = {$project->id};
            ORDER BY pf.position ASC";
        $data = \Yii::$app->db->createCommand($query)->queryAll();

        return $data;
    }

    public function getSlug(){
        $slug = "";
        $name = $this->name;
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
        );
        // -- Remove duplicated spaces
        $name = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $name);
        // -- Returns the slug
        $slug = strtolower(strtr($name, $table));

        return $slug;
    }

}
