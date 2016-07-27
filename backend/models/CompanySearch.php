<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
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
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'safe'],
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
        $query = Company::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name', 'address']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $CompanySearch = (!empty($params['CompanySearch']))?$params['CompanySearch']:[];
        $fullName = (!empty($CompanySearch['fullName']))?$CompanySearch['fullName']:"";
        //echo '<pre>'; print_r( $fieldsetId ); echo '</pre>'; exit;

        $query->andFilterWhere(['company.id' => $this->id]);
        $query->andFilterWhere(['like', 'company.name', $this->name]);
        //$query->andFilterWhere(['in', 'fieldset.id', $fieldsetId]);


        return $dataProvider;
    }
}
