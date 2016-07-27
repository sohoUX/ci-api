<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Form;
use common\models\Company;

/**
 * This is the model class for table "field".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $fieldset_id
 * @property string $description
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property array $field_skip_logic
 */
class FormSearch extends Form
{
    /**
     * @inheritdoc
     */
    public $projects_id;
    public $fieldsets_id;

    public function rules()
    {
        return [
            [['name', 'projects_id', 'fieldsets_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Form::find();
        $query->joinWith('projects');
        $query->joinWith('fieldsets');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name', 'status']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $FormSearch = (!empty($params['FormSearch']))?$params['FormSearch']:[];
        $fullName = (!empty($FormSearch['fullName']))?$FormSearch['fullName']:"";
        //echo '<pre>'; print_r( $this->consultant_id ); echo '</pre>'; exit;

        $query->andFilterWhere(['form.id' => $this->id]);
        $query->andFilterWhere(['like', 'form.name', $this->name]);
        $query->andFilterWhere(['in', 'project.id', $this->projects_id]);
        $query->andFilterWhere(['in', 'fieldset.id', $this->fieldsets_id]);
        $query->groupBy('form.id');
        //echo '<pre>'; print_r( $query->createCommand()->getSql() ); echo '</pre>'; exit;
        //$query->andFilterWhere(['in', 'form.status', $this->status]);

        return $dataProvider;
    }
}
