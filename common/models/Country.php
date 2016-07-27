<?php

namespace common\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property integer $province_id
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64]
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
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el'
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinces() {
        return $this->hasMany(Province::className(), ['id' => 'country_id']);
    }

    public static function findWithProvinces(){
        $statement = "SELECT p.id AS id, p.name AS name, c.name AS country
            FROM province p
            LEFT JOIN country c ON (c.id = p.country_id)";

        return \Yii::$app->db->createCommand($statement)->queryAll();
    }
}
