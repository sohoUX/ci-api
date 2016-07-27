<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "form".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property array $fieldset
 */
class Form extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form';
    }

    public function beforeSave($insert = false) {
        if ($insert):
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->user_id = Yii::$app->user->identity->id;
        else:
            $this->updated_at = date('Y-m-d H:i:s');
        endif;

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['user_id'], 'integer'],
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
            'user_id' => 'Usuario',
            'fieldsets' => 'Grupos de Preguntas',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
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
    public function getProjects() {
        return $this->hasMany(Project::className(), ['id' => 'project_id'])
        ->viaTable('project_form', ['form_id' => 'id']);
    }

    public function getPercentage($project = null){
        if( empty($project) ){
            return 0;
        }
        $form = $this;
        $query = "SELECT pf.percentage FROM project_form pf 
        WHERE pf.project_id = {$project->id} AND pf.form_id = {$form->id} ;";
        $data = \Yii::$app->db->createCommand($query)->queryOne();
        $percentage = (!empty($data['percentage']))?$data['percentage']:0;

        return $percentage;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getFieldsets() {
        return $this->hasMany(Fieldset::className(), ['form_id' => 'id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldsets() {
        return $this->hasMany(Fieldset::className(), ['id' => 'fieldset_id'])
        ->viaTable('form_fieldset', ['form_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function linkFieldsets($fieldsets = [], $pos = []) {
        if( !empty($fieldsets) ){
            $this->unlinkAll('fieldsets');
            foreach($fieldsets as $id ){
                if (($fieldset = Fieldset::findOne($id)) !== null) {
                    $this->link('fieldsets', $fieldset, ['position' => $pos[$id] ] );
                }
            }
        }
        return $this;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSortedFieldsets(){
        $model = $this;
        $items = FormFieldset::find()
            ->where(['form_id' => $model->id ])
            ->orderBy("position")
        ->all();
        $sorted = [];
        foreach( $items as $item ){
            $sorted[] = $item->fieldset;
        }

        return $sorted;
    }
}
