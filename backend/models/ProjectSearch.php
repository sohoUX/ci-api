<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Project;
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
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public $forms_id;
    public function rules()
    {
        return [
            [['company_id', 'area_id', 'user_id', 'status'], 'integer'],
            [['name', 'consultant_id', 'forms_id'], 'safe'],
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
        $query = Project::find();
        $query->joinWith('area');
        $query->joinWith('forms');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name', 'area_id', 'company_id', 'consultant_id', 'status']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $ProjectSearch = (!empty($params['ProjectSearch']))?$params['ProjectSearch']:[];
        $fullName = (!empty($ProjectSearch['fullName']))?$ProjectSearch['fullName']:"";
        //echo '<pre>'; print_r( $this->consultant_id ); echo '</pre>'; exit;

        $query->andFilterWhere(['project.id' => $this->id]);
        $query->andFilterWhere(['like', 'project.name', $this->name]);
        $query->andFilterWhere(['in', 'project.status', $this->status]);
        $query->andFilterWhere(['in', 'project.area_id', $this->area_id]);
        $query->andFilterWhere(['in', 'project.company_id', $this->company_id]);
        $query->andFilterWhere(['in', 'project.consultant_id',  $this->consultant_id]);
        $query->andFilterWhere(['in', 'form.id', $this->forms_id]);

        return $dataProvider;
    }
}
