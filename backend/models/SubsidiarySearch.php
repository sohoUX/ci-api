<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Subsidiary;
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
class SubsidiarySearch extends Subsidiary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'province_id'], 'integer'],
            [['id', 'name', 'manager', 'consultant', 'address', 'created_at', 'updated_at'], 'safe'],
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
        $query = Subsidiary::find();
        $query->joinWith('company');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name', 'company_id', 'manager', 'province.id', 'address']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $SubsidiarySearch = (!empty($params['SubsidiarySearch']))?$params['SubsidiarySearch']:[];
        $fullName = (!empty($SubsidiarySearch['fullName']))?$SubsidiarySearch['fullName']:"";
        //echo '<pre>'; print_r( $fieldsetId ); echo '</pre>'; exit;

        $query->andFilterWhere(['subsidiary.id' => $this->id]);
        $query->andFilterWhere(['like', 'subsidiary.name', $this->name]);
        $query->andFilterWhere(['like', 'subsidiary.manager', $this->manager]);
        $query->andFilterWhere(['like', 'subsidiary.consultant', $this->consultant]);
        $query->andFilterWhere(['like', 'company.id', $this->company_id]);
        $query->andFilterWhere(['like', 'province.name', $this->consultant]);

        return $dataProvider;
    }
}
