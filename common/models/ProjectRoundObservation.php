<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_round_observation".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $subsidiary_id
 * @property integer $round_id
 * @property string $comment
 * @property string $strengths
 * @property string $improvement_opportunities
 * @property string $priority_conductive
 * @property string $tactical_plan
 * @property string $created_at
 * @property string $updated_at
 */
class ProjectRoundObservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_round_observation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'subsidiary_id','round_id'], 'integer'],
            [['comment', 'strengths', 'improvement_opportunities', 
                'priority_conductive', 'tactical_plan'], 'string'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Projecto',
            'subsidiary_id' => 'Sucursal',
            'round_id' => 'Ronda',
            'comment' => 'Comentario',
            'strengths' => 'Fortalezas',
            'improvement_opportunities' => 'Oportunidades de mejora',
            'priority_conductive' => 'Conductora Prioritaria',
            'tactical_plan' => 'Plan Táctico',
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
    public function getProject() {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidiary() {
        return $this->hasOne(Subsidiary::className(), ['id' => 'subsidiary_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRound() {
        return $this->hasOne(Round::className(), ['id' => 'round_id']);
    }

    /**
     * @return Array
     */
    public function getObservations(){
        $slugs =['strengths', 'improvement_opportunities', 'priority_conductive', 'tactical_plan'];
        $labels = $this->attributeLabels();
        $observations = [];
        foreach( $slugs as $slug ){
            $observations[] = ['name' => $labels[$slug], 'value' => $this->{$slug}, 'slug' => $slug];
        }

        return $observations;
    }
}
