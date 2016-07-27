<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_field".
 *
 * @property integer $id
 * @property integer $evaluation_id
 * @property integer $field_id
 * @property integer $answer
 * @property string $alternatives
 * @property string $updated_at
 * @property string $created_at
 */
class EvaluationField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluation_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evaluation_id', 'field_id', 'answer'], 'integer'],
            [['alternatives'], 'string'],
            [['updated_at', 'created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evaluation_id' => 'Evaluación',
            'field_id' => 'Pregunta',
            'answer' => 'Respuesta',
            'alternatives' => 'Alternatives',
            'updated_at' => 'Creado el',
            'created_at' => 'Actualizado el'
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
    public function getEvaluation() {
        return $this->hasOne(Evaluation::className(), ['id' => 'evaluation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField() {
        return $this->hasOne(Field::className(), ['id' => 'field_id']);
    }
}
