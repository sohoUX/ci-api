<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_form".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $form_id
 * @property double  $percentage
 * @property integer $position
 */
class ProjectForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'form_id', 'position'], 'integer'],
            [['percentage'], 'number'],
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
            'form_id' => 'Formulario',
            'percentage' => 'Porcentaje',
            'position' => 'Posición',
        ];
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
    public function getForm() {
        return $this->hasOne(Form::className(), ['id' => 'form_id']);
    }
}
