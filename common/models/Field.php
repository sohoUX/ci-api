<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $fieldset_id
 * @property string $description
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property array $field_skip_logic
 */
class Field extends \yii\db\ActiveRecord
{
    const TYPE_CHECKBOX = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'fieldset_id'], 'integer'],
            [['fieldset_id', 'created_at', 'updated_at', 'fieldsetName', 'fieldsetId'], 'safe'],
            [['name', 'code', 'description'], 'string', 'max' => 255]
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
            'code' => 'Codigo',
            'description' => 'Descripción',
            'fieldset_id' => 'Grupo de Preguntas',
            'fieldsetId' => 'Grupo de Preguntas',
            'fieldsetName' => 'Grupo de Preguntas',
            'type' => 'Tipo',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
            'field_skip_logic' => 'Saltos Logicos',
            'field_predefined_answer' => 'Respuestas Predefinidas',
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
    public function getFieldset() {
        return $this->hasOne(Fieldset::className(), ['id' => 'fieldset_id']);
    }

    public function getFieldsetId(){
        return (!empty($this->fieldset))?$this->fieldset->id:"";
    }

    public function getFieldsetName(){
        return (!empty($this->fieldset))?$this->fieldset->name:"";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldSkipLogic() {
        return $this->hasMany(FieldSkipLogic::className(), ['id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPredefinedAnswers() {
        return $this->hasMany(FieldPredefinedAnswer::className(), ['field_id' => 'id']);
    }

    public function hasPredefinedYes(){
       $alternatives = $this->getPredefinedYes();

       return (!empty($alternatives))?true:false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPredefinedYes() {
        $predefined = FieldPredefinedAnswer::findAll(['field_id' => $this->id, 'answer' => 1 ]);

        return ($predefined)?$predefined:[]; 
    }

    public function hasPredefinedNo(){
       $alternatives = $this->getPredefinedNo();

       return (!empty($alternatives))?true:false;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPredefinedNo() {
        $predefined = FieldPredefinedAnswer::findAll(['field_id' => $this->id, 'answer' => 2 ]);

        return ($predefined)?$predefined:[];
    }

    public function getAnswers($evaluation_id = null, $fieldset_id = null){
        $connection = Yii::$app->getDb();
        $query = "SELECT f.id, f.name, f.type, ef.id AS 'evaluation_field_id', 
            ef.answer, ef.alternatives, GROUP_CONCAT( CONCAT(fsl.answer,':',fsl.target_id) ) AS 'skiplogic'
            FROM field f
            LEFT JOIN evaluation_field ef ON( ef.field_id = f.id AND ef.evaluation_id = {$evaluation_id} )
            LEFT JOIN field_skip_logic fsl ON( fsl.field_id = f.id )
            WHERE f.fieldset_id = {$fieldset_id}
            GROUP BY f.id;";

        $command = $connection->createCommand($query);

        $answers = $command->queryAll();

        foreach( $answers as $i => $answer ){
            $field = Field::findOne($answer['id']);
            $answers[$i]['predefined_answers'] = [
                1 => $field->getPredefinedYes(),
                2 => $field->getPredefinedNo()
            ];
            if(!empty($answer['alternatives'])){
                if( self::isSerialized( $answer['alternatives'] ) ){
                    $answers[$i]['alternatives'] = unserialize($answer['alternatives']);
                    if( $answers[$i]['alternatives'] == "false" ){
                        $answers[$i]['alternatives'] = [];
                    }
                }
                else{
                    $answers[$i]['alternatives'] = [];
                }
                
            }
            $skiplogic = $answer['skiplogic'];
            $answers[$i]['skiplogic'] = self::parseSkipLogic($skiplogic);
        }

        return $answers;
    }

    private function isSerialized($str) {
        return ($str == serialize(false) || @unserialize($str) !== false);
    }

    private static function parseSkipLogic( $value = null ){
        $skiplogic = [];
        if( !empty( $value ) ){
            $answers_skip_logic = explode(",", $value);
            foreach( $answers_skip_logic as $answer_skip_logic ){
                list($answer, $field) = explode(":", $answer_skip_logic);
                $skiplogic[$answer] = $field;

            }
        }
        return $skiplogic;
    }

    /**
     * @return \yii\db\ActiveRecord
     */
    public static function findOrCreateByName($name = null, $code = "", $fieldset = null) {
        $field = self::findOne(['name' => $name, 'fieldset_id' => $fieldset->id ]);
        if( empty($field) ){
            $field = new Field();
            $field->name = $name;
            $field->code = $code;
            if( !empty($fieldset) ){
                $field->fieldset_id = $fieldset->id;
            }

            if( !$field->save() ){
                $field = false;
            }
        }

        return $field;
    }
}