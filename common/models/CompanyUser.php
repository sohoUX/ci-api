<?php

namespace common\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "company_user".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $user_id
 * @property integer $position_id
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
            [['company_id', 'user_id', 'position_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Usuario',
            'company_id' => 'Empresa',
            'position_id' => 'Cargo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany() {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition() {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

}
