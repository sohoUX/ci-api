<?php

namespace common\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "project_label".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $user_id
 * @property integer $position_id
 */
class ProjectLabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_label';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'label_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label_id' => 'Etiqueta',
            'project_id' => 'Proyecto',
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
    public function getLabel() {
        return $this->hasOne(Label::className(), ['id' => 'label_id']);
    }

}
