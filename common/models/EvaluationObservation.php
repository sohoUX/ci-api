<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_observation".
 *
 * @property integer $id
 * @property integer $evaluation_id
 * @property string $slug
 * @property string $name
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class EvaluationObservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluation_observation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evaluation_id'], 'integer'],
            [['value'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evaluation_id' => 'Evaluación',
            'slug' => 'Slug',
            'name' => 'Nombre',
            'value' => 'Valor',
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
    public function getEvaluation() {
        return $this->hasOne(Evaluation::className(), ['id' => 'evaluation_id']);
    }

    public static function getDefaults( $slug = null ){
        $defaults = [
            ['slug' => 'strengths', 'name' => 'Fortalezas'],
            ['slug' => 'improvement_opportunities', 'name' => 'Oportunidades de mejora'],
            ['slug' => 'priority_conductive', 'name' => 'Conductora Prioritaria'],
            ['slug' => 'tactical_plan', 'name' => 'Plan Táctico']
        ];

        if( !empty( $slug ) ){
            foreach( $defaults as $default ){
                if( $default['slug'] == $slug ){
                    $defaults = $default;
                    break;                    
                }
            }
        }

        return $defaults;
    }
}
