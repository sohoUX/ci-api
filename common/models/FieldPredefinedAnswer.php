<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field_predefined_answer".
 *
 * @property integer $id
 * @property integer $field_id
 * @property integer $answer
 * @property string $detail
 * @property string $created_at
 * @property string $updated_at
 */
class FieldPredefinedAnswer extends \yii\db\ActiveRecord
{
    const TYPE_CHECKBOX = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_predefined_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer', 'field_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 255],
            [['detail'], 'string', 'max' => 500]
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
            'code' => 'Código',
            'answer' => 'Respuesta',
            'detail' => 'Detalle',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el'
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
     * @return \yii\db\ActiveRecord
     */
    public static function findOrCreateByAnswer($detail = null, $field = "", $answer = 1) {
        $fieldAnswer = self::findOne(['detail' => $detail, 'field_id' => $field->id, 'answer' => $answer ]);
        if( empty($ffieldAnswer) ){
            $fieldAnswer = new FieldPredefinedAnswer();
            $fieldAnswer->detail = $detail;
            $fieldAnswer->answer = $answer;
            if( !empty($fieldAnswer) ){
                $fieldAnswer->field_id = $field->id;
            }
            if( !$fieldAnswer->save() ){
                $fieldAnswer = false;
            }
        }

        return $fieldAnswer;
    }

}
