<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fieldset;
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
class FieldsetSearch extends Fieldset
{
    /**
     * @inheritdoc
     */
    public $projects_id;
    public $forms_id;

    public function rules()
    {
        return [
            [['id', 'forms_id'], 'safe'],
            [['name', 'code', 'description'], 'string', 'max' => 255]
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
        $query = Fieldset::find();
        $query->joinWith('fields');
        $query->joinWith('forms');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $FieldsetSearch = (!empty($params['FieldsetSearch']))?$params['FieldsetSearch']:[];
        //echo '<pre>'; print_r( $this->consultant_id ); echo '</pre>'; exit;

        $query->andFilterWhere(['fieldset.id' => $this->id]);
        $query->andFilterWhere(['like', 'fieldset.name', $this->name]);
        $query->andFilterWhere(['in', 'form.id', $this->forms_id]);
        //$query->andFilterWhere(['in', 'field.id', $this->fields]);
        $query->groupBy('fieldset.id');
        //echo '<pre>'; print_r( $query->createCommand()->getSql() ); echo '</pre>'; exit;
        //$query->andFilterWhere(['in', 'form.status', $this->status]);

        return $dataProvider;
    }
}
