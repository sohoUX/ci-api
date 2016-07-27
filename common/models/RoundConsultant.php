<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "round_consultant".
 *
 * @property integer $id
 * @property integer $round_id
 * @property string $consultant_id
 * @property string $created_at
 * @property string $updated_at
 */
class RoundConsultant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'round_consultant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['round_id', 'consultant_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'round_id' => 'Ronda',
            'consultant_id' => 'Consultor',
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
    public function getRound() {
        return $this->hasOne(Round::className(), ['id' => 'round_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultant() {
        return $this->hasOne(Consultant::className(), ['id' => 'consultant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidiaries() {
        return $this->hasMany(RoundConsultantSubsidiary::className(), ['round_consultant_id' => 'id']);
    }

}
