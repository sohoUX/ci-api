<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property string $name
 * @property integer $region_id
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'region_id'], 'required'],
            [['region_id'], 'integer'],
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
            'name' => 'Name',
            'region_id' => 'Region ID',
        ];
    }
}
