<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fieldset".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property integer $form_id
 * @property float $percentage
 * @property string $created_at
 * @property string $updated_at
 */
class Fieldset extends \yii\db\ActiveRecord
{
    public $title;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fieldset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['percentage'],'integer', 'integerOnly' => false],
            [['created_at', 'updated_at'], 'safe'],
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
            'code' => 'Código',
            'name' => 'Nombre',
            'description' => 'Descripción',
            'percentage' => 'Porcentaje',
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

    public static function populateRecord($record, $row){
        $record->title = "{$row['name']} ({$row['percentage']}%)";
        return parent::populateRecord($record, $row);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForms() {
        return $this->hasMany(Form::className(), ['id' => 'form_id'])
        ->viaTable('form_fieldset', ['fieldset_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFields() {
        return $this->hasMany(Field::className(), ['fieldset_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveRecord
     */
    public static function findOrCreateByName($name = null) {
        $fieldset = self::findOne(['name' => $name]);
        if( empty($fieldset) ){
            $fieldset = new Fieldset();
            $fieldset->name = $name;
            if( !$fieldset->save() ){
                $fieldset = false;
            }

        }

        return $fieldset;
    }

}
