<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "round".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property integer $position
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Round extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'round';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'position', 'status'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
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
            'project_id' => 'Proyecto',
            'position' => 'Posición',
            'name' => 'Nombre',
            'start_date' => 'Fecha de inicio',
            'end_date' => 'Fecha de termino',
            'status' => 'Estado',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
    }

    public function beforeSave($insert = false) {
        if ($insert):
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        else:
            $this->updated_at = date('Y-m-d H:i:s');
        endif;

        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject() {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    public function format($field = ''){
        $date = new \Datetime($this->{$field});
        return (!empty($date))?$date->format('Y-m-d'):null;
    }

    public function getPrevious(){
        $current = $this;

        $query = "SELECT r2.*
            FROM round r1
            LEFT JOIN round r2 ON( r2.project_id = r1.project_id AND r2.position = r1.position-1 )
            WHERE r1.id = {$current->id};";

        $data = \Yii::$app->db->createCommand($query)->queryAll();

        if( !empty($data) && count($data) > 0 ){
            $data = $data[0];
            $previous = Round::findOne($data['id']);
        }
        else{
            $previous = null;
        }

        return $previous;
    }
    public function deleteDisabled($ids = []){
        $round = $this;
        if( !empty($ids) ){
            $roundConsultants = RoundConsultant::findAll(['consultant_id' => $ids, 'round_id' => $round->id]);
            foreach($roundConsultants as $roundConsultant) {
                RoundConsultantSubsidiary::deleteAll(['round_consultant_id' => $roundConsultant->id]);
            }
        }
        RoundConsultant::deleteAll(['consultant_id' => $ids, 'round_id' => $round->id]);
    }
    public function saveConsultants( $consultants = [] ){
        $round = $this;
        //echo '<pre>'; print_r( $consultants ); echo '</pre>'; exit;
        $ids = array_keys($consultants);
        $this->deleteDisabled($ids);
        foreach ($consultants as $id => $con) {
            $subs = (!empty($con['subsidiaries']))?$con['subsidiaries']:[];
            if( !empty($con) && !empty($con['enable']) && $con['enable'] == 'on' ){
                $consultant = User::findOne($id);
                $roundConsultant = RoundConsultant::findOne(
                    ['consultant_id' => $consultant->id, 'round_id' => $round->id]);
                if( empty($roundConsultant) ){
                    $roundConsultant = new RoundConsultant();
                    $roundConsultant->consultant_id = $consultant->id;
                    $roundConsultant->round_id = $round->id;
                }
                $roundConsultant->save();
                foreach($subs as $sub){
                    $roundConsultantSubsidiary = RoundConsultantSubsidiary::findOne(
                        ['round_consultant_id' => $roundConsultant->id, 'subsidiary_id' => $sub]);
                    if( empty($roundConsultantSubsidiary) ){
                        $roundConsultantSubsidiary = new RoundConsultantSubsidiary();
                        $roundConsultantSubsidiary->round_consultant_id = $roundConsultant->id;
                        $roundConsultantSubsidiary->subsidiary_id = $sub;
                    }
                    $roundConsultantSubsidiary->save();
                }
            }
        }

        return true;
    }
}
