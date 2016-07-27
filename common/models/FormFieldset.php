<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_fieldset".
 *
 * @property integer $id
 * @property integer $form_id
 * @property integer $fieldset_id
 * @property integer $position
 */
class FormFieldset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_fieldset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form_id', 'fieldset_id', 'position'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_id' => 'Formulario',
            'fieldset_id' => 'Grupo de Preguntas',
            'position' => 'Posición',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldset() {
        return $this->hasOne(Fieldset::className(), ['id' => 'fieldset_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm() {
        return $this->hasOne(Form::className(), ['id' => 'form_id']);
    }

}
