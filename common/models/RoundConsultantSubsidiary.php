<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "round_consultant".
 *
 * @property integer $id
 * @property integer $round_consultant_id
 * @property string $subsidiary_id
 * @property string $created_at
 * @property string $updated_at
 */
class RoundConsultantSubsidiary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'round_consultant_subsidiary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['round_consultant_id', 'subsidiary_id'], 'integer'],
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
            'round_consultant_id' => 'Consultor',
            'subsidiary_id' => 'Sucursal',
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
    public function getRoundConsultant() {
        return $this->hasOne(RoundConsultant::className(), ['id' => 'round_consultant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidiary() {
        return $this->hasOne(Subsidiary::className(), ['id' => 'subsidiary_id']);
    }

}
