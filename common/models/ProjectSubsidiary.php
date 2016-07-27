<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_subsidiary".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $subsidiary_id
 */
class ProjectSubsidiary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_subsidiary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'subsidiary_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'subsidiary_id' => 'Subsidiary ID',
        ];
    }
}
