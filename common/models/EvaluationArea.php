<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_area".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class EvaluationArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluation_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'name' => 'Nombre',
            'description' => 'Descripción',
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
    public function getEvaluations() {
        return $this->hasMany(Evaluation::className(), ['evaluation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects() {
        return $this->hasMany(Project::className(), ['project_id' => 'id']);
    }

}
