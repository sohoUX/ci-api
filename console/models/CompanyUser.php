<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_user".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $user_id
 */
class CompanyUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'user_id' => 'User ID',
        ];
    }
}
