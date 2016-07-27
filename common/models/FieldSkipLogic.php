<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field_skip_logic".
 *
 * @property integer $id
 * @property integer $field_id
 * @property integer $target_id
 * @property integer $answer
 * @property string $created_at
 * @property string $updated_at
 */
class FieldSkipLogic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_skip_logic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id', 'target_id', 'answer'], 'integer'],
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
            'field_id' => 'Pregunta',
            'target_id' => 'Pregunta Destino',
            'answer' => 'Respuesta',
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
    public function getField() {
        return $this->hasOne(Field::className(), ['id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarget() {
        return $this->hasOne(Field::className(), ['id' => 'target_id']);
    }
}
