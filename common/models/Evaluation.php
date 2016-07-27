<?php

namespace common\models;

use Yii;
use common\helpers\Mailer;
use \yii\db\Expression;

/**
 * This is the model class for table "evaluation".
 *
 * @property integer $id
 * @property integer $area_id
 * @property integer $consultant_id
 * @property integer $form_id
 * @property integer $project_id
 * @property integer $subsidiary_id
 * @property integer $status
 * @property integer $round_id
 * @property array $observations
 * @property string $created_at
 * @property string $updated_at
 */
class Evaluation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['consultant_id', 'area_id', 'form_id', 'project_id', 'subsidiary_id', 'status', 'round_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'area_id' => 'Area',
            'consultant_id' => 'Evaluador',
            'form_id' => 'Formulario',
            'project_id' => 'Proyecto',
            'subsidiary_id' => 'Sucursal',
            'status' => 'Estado',
            'round_id' => 'Ronda',
            'observations' => 'Observaciones',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
    }

    public function beforeSave($insert = false) {
        if ($insert):
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->consultant_id = Yii::$app->user->identity->id;
        else:
            $this->updated_at = date('Y-m-d H:i:s');
        endif;

        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultant() {
        return $this->hasOne(User::className(), ['id' => 'consultant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm() {
        return $this->hasOne(Form::className(), ['id' => 'form_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationFields() {
        $records = $this->hasMany(EvaluationField::className(), ['evaluation_id' => 'id']);

        return $records->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject() {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRound() {
        return $this->hasOne(Round::className(), ['id' => 'round_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea() {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObservations() {
        return $this->hasMany(EvaluationObservation::className(), ['evaluation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObservationsValues() {
        $evaluation = $this;
        $defaults = EvaluationObservation::getDefaults();
        $evaluationFields = $evaluation->getEvaluationFields();
        $strengths_alternatives = $improvement_opportunities_alternatives = [];
        foreach($evaluationFields as $i => $evaluationField){
            if($evaluationField->answer == 1){
                $alternatives = unserialize($evaluationField->alternatives);
                if( !empty( $alternatives ) ){
                    foreach( $alternatives as $alternative => $selected ){
                        if( $selected ){
                            $alternative = FieldPredefinedAnswer::findOne($alternative);
                            if( !empty($alternative) ){
                                $strengths_alternatives[] = $alternative->detail;
                            }
                        }
                    }
                }
            }
            else if( $evaluationField->answer == 2 ){
                $alternatives = unserialize($evaluationField->alternatives);
                //echo '<pre>'; print_r( $alternatives );  echo '</pre>';
                if( !empty( $alternatives ) ){
                    foreach( $alternatives as $alternative => $selected ){
                        if( $selected ){
                            $alternative = FieldPredefinedAnswer::findOne($alternative);
                            if( !empty($alternative) ){
                                $improvement_opportunities_alternatives[] = $alternative->detail;
                            }
                        }
                    }
                }
            }
        }
        //echo '<pre>'; var_dump( $alternatives );  echo '</pre>'; exit;
        $observations = [];
        foreach($defaults as $key => $default){
            $slug = $default['slug'];
            $observation = $default;
            $evaluationObservation = EvaluationObservation::findOne(['slug' => $default['slug'], 'evaluation_id' => $this->id]);
            if( $slug == 'strengths' ){
                $observation['alternatives'] = $strengths_alternatives;
            }
            else if( $slug == 'improvement_opportunities'){
                $observation['alternatives'] = $improvement_opportunities_alternatives;
            }
            $observation['value'] = (!empty($evaluationObservation))?$evaluationObservation->value:"";
            $observations[$key] = $observation;
        }

        return $observations;
    }

    private function isSerialized($str) {
        return ($str == serialize(false) || @unserialize($str) !== false);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidiary() {
        return $this->hasOne(Subsidiary::className(), ['id' => 'subsidiary_id']);
    }

    public static function findOrCreate($params = []){
        $evaluation = Evaluation::findOne($params);
        if( empty($evaluation) ){
            $evaluation = new Evaluation;
            $evaluation->project_id = $params['project_id'];
            $evaluation->form_id = $params['form_id'];
            $evaluation->round_id = $params['round_id'];
            $evaluation->subsidiary_id = $params['subsidiary_id'];
            $evaluation->status = 0;
            $evaluation->save();
        }

        return $evaluation;
    }
    public static function findLastest($params = []){
        $round = Round::findOne($params['round_id']);
        $lastRound = $round->getPrevious();
        $evaluation = null;
        if( !empty($lastRound) ){
            $params['round_id'] = $lastRound->id;

            $evaluation = Evaluation::findOne($params);
        }

        return $evaluation;
    }

    public function evaluate( $answers = [], $alternatives = [] ){
        $this->status = 1;
        try{
            $this->save(); 
        }
        catch( \Exception $e ){

        }
        return self::saveAnswers( $this, $answers, $alternatives);
    }

    public static function saveAnswers( $evaluation = null, $answers = [], $alternatives = [] ){
        $evaluation = (is_object($evaluation))?$evaluation:(Evaluation::findOne($evaluation));

        $result = true;
        foreach( $answers as $field_id => $answer ){
            $alternativeField = (!empty($alternatives[$field_id]))?$alternatives[$field_id]:[];
            $evaluationField = EvaluationField::findOne(['field_id' => $field_id, 'evaluation_id' => $evaluation->id]);
            if( empty( $evaluationField ) ){
                $evaluationField = new EvaluationField();
                $evaluationField->field_id = $field_id;
                $evaluationField->evaluation_id = $evaluation->id;
            }
            $evaluationField->alternatives = self::serializeAlternatives($alternativeField);
            $evaluationField->answer = $answer;

            if( !$evaluationField->save() ){
                $result = false;
                break;
            }
            if( $field_id == 2){
                //echo '<pre>'; print_r( $alternatives ); echo '</pre>'; exit;
            }
        }

        return $result;
    }

    private static function serializeAlternatives($alternatives = []){
        $serialized = [];
        if( !empty($alternatives) && is_array($alternatives) ){
            foreach( $alternatives as $alternative => $selected ){
                $selected = ($selected == "true");
                $serialized[$alternative] = $selected;
            }
        }

        return serialize($serialized);
    }

    public function finish(){
        $response = true;
        if( $this->status == 0 || $this->status == 1 ){
            $this->status = 2;
            $response = $this->save();
        }

        return $response;
    }

    public function nextEvaluation(){
        $evaluation_id = $this->id;
        $project = Project::findOne($this->project_id);
        $subsidiary = Subsidiary::findOne($this->subsidiary_id);
        $round = Round::findOne($this->round_id);
        $next = null;
        $query = 
            "SELECT e.*, f.name AS 'form_name', (@counter:=@counter+1) AS position ".
            "FROM evaluation e ".
            "LEFT JOIN form f ON( f.id = e.form_id ) ".
            "WHERE e.project_id = {$project->id} AND e.subsidiary_id = {$subsidiary->id} AND e.round_id = {$round->id};";

        \Yii::$app->db->createCommand()->setSql("SET @counter = 0;")->query();
        $results =  \Yii::$app->db->createCommand()->setSql($query)->queryAll();
        if( !empty($results) ){
            foreach($results as $key => $result){
                if( $result['id'] == $evaluation_id ){
                    $nextkey = $key+1;
                    if( !empty($results[$nextkey]) ){
                        $next = $results[$nextkey];
                    }
                    break;
                }
            }
        }

        return $next;
    }
    public $answers;

    public function getAnswers(){
        $evaluation = $this;
        $query = "SELECT ef.id, f.id AS 'field_id', f.name , ef.answer, ef.alternatives, ".
            "fs.id AS 'fieldset_id', fs.name AS 'fieldset_name', fs.percentage AS 'fieldset_percentage' ".
            "FROM field f ".
            "LEFT JOIN evaluation_field ef ON( ef.field_id = f.id ) ".
            "LEFT JOIN fieldset fs ON( fs.id = f.fieldset_id) ".
            "WHERE ef.evaluation_id = {$evaluation->id};";
        $results =  \Yii::$app->db->createCommand()->setSql($query)->queryAll();
        $answers = [];
        $last_fieldset_id = null;
        foreach( $results as $key => $result ){
            $fieldset = [];
            $fieldset['id'] = $result['fieldset_id'];
            $fieldset['name'] = $result['fieldset_name'];
            $fieldset['percentage'] = $result['fieldset_percentage'];
            $fieldset['count'] = 0;
            $query = "SELECT  COUNT(fi.id) AS 'value'
                FROM project p
                LEFT JOIN company c ON( c.id = p.company_id )
                LEFT JOIN subsidiary s ON( s.company_id = c.id )
                LEFT JOIN round r ON( r.project_id = p.id )
                LEFT JOIN evaluation e ON( e.project_id = p.id AND e.subsidiary_id = s.id AND e.round_id = r.id )
                LEFT JOIN evaluation_field ef ON( ef.evaluation_id = e.id )
                LEFT JOIN field fi ON( fi.id = ef.field_id )
                LEFT JOIN fieldset fs ON( fs.id = fi.fieldset_id )
                LEFT JOIN form f ON( f.id = e.form_id )
                WHERE e.id = {$this->id} AND fs.id = {$fieldset['id']}
                AND ef.answer != 0;";
            $count = \Yii::$app->db->createCommand($query)->queryOne();
            if( !empty($count) && !empty($count['value']) ){
                $fieldset['count'] = $count['value'];
            }
            unset($result['fieldset_id'], $result['fieldset_name'], $result['fieldset_percentage']);
            $answer = $result;
            if( $fieldset['id'] != $last_fieldset_id ){
                if( $key > 0 ){
                    $answers[] = ['separator' => true];
                }
                $answer['fieldset'] = $fieldset;
                $last_fieldset_id = $fieldset['id'];
            }
            $answer['value'] = $this->getFieldResult($result['field_id']);
            $answers[] = $answer;
        }

        return $answers;
    }

    public function getFieldResult($field_id = null){
        $result = 0;
        $evaluation = $this;
        $query = "SELECT get_field_result({$field_id}, {$evaluation->id});";
        $command = \Yii::$app->db->createCommand($query); 
        $command->execute();
        $result = $command->queryScalar();

        return $result;
    }

    public function getFormResult($form_id = null){
        $result = 0;
        $evaluation = $this;
        $query = "CALL get_review_data({$form_id}, {$evaluation->id});";
        $statement = $query;
        $db = \Yii::$app->getDb();
        $pdo = $db->pdo;
        $pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
        $query = $pdo->query($query);
        $results = $query->fetchAll();
        $result = 0;
        foreach( $results as $res ){
            $result = $result+$res['result'];
        }

        return $result;
    }
    public function getResult(){
        $amount = 0;
        $project = $this->project;
        $subsidiary = $this->subsidiary;
        $round = $this->round;
        $forms = "SELECT e.form_id as 'id' FROM evaluation e LEFT JOIN form f ON( f.id = e.form_id )
            WHERE e.project_id = {$project->id} AND e.subsidiary_id = {$subsidiary->id} 
            AND e.round_id = {$round->id}";
        $db = \Yii::$app->getDb();
        $pdo = $db->pdo;
        $pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
        $forms = $db->createCommand($forms)->queryAll();
        $result = 0;
        foreach( $forms as $form ){
            $result = $result+$this->getFormResult($form['id']);
        }

        return $result;
    }


    public function old_getResult(){
        $answers = $this->getAnswers();
        $percentage = $this->form->getPercentage($this->project);
        $result = 0;
        $query = "SELECT  
            ROUND(( fs.percentage * SUM(IF(ef.answer = 1 OR ef.answer = 2, 1, 0)) / IFNULL(COUNT(fi.id), 1)), 2) AS 'value'
            FROM project p
            LEFT JOIN company c ON( c.id = p.company_id )
            LEFT JOIN subsidiary s ON( s.company_id = c.id )
            LEFT JOIN round r ON( r.project_id = p.id )
            LEFT JOIN evaluation e ON( e.project_id = p.id AND e.subsidiary_id = s.id AND e.round_id = r.id )
            LEFT JOIN evaluation_field ef ON( ef.evaluation_id = e.id )
            LEFT JOIN field fi ON( fi.id = ef.field_id )
            LEFT JOIN fieldset fs ON( fs.id = fi.fieldset_id )
            LEFT JOIN form f ON( f.id = e.form_id )
            WHERE e.id = {$this->id}
                AND ef.answer != 0                
            GROUP BY f.name;";

        $data = \Yii::$app->db->createCommand($query)->queryOne();
        if( !empty($data) && !empty($data['value']) ){
            $result = $data['value'];
        }

        return $result;
    }

    public function getReports(){
        $reports = File::findAll(['entity_type' => $this->tableName(), 'entity_id' => $this->id]);

        return $reports;
    }
    public function getLastReport(){
        $reports = $this->getReports();

        return (!empty($reports))?end($reports):null;
    }

    public function sendReport( $targets = [] ){
        $response = false;
        if( !empty($targets) ){
            $consultant = \Yii::$app->user->identity;
            $evaluation = $this;
            $observations = null;
            if( !empty($evaluation->observations) ){
                $observations = $evaluation->observations;
            }
            $report = $this->getLastReport();
            $message = "Estimado, <br/>".
                "Han compartido contigo el reporte de la evaluacion realizada por {$consultant->name}.";

            if ($this->id) {
                $mailer = new Mailer();
                $mailer
                    ->addParam('project', $evaluation->project)
                    ->addParam('subsidiary', $evaluation->subsidiary)
                    ->addParam('round', $evaluation->round)
                    ->addParam('message', $message)
                    ->addParam('observations', $observations);                

                $mailer->setSubject("Reporte de evaluación");
                if( !empty( $report ) ){
                    $mailer->addFile($report);
                }
                $mailer->addTargets($targets);
                return $mailer->send();
            }

            return false;
            foreach( $targets as $target ){

            }
        }
        
        return $response;
    }
}
