<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Field;

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
class FieldSearch extends Field
{
    public $fieldsetName;
    public $fieldsetId;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'fieldset_id'], 'integer'],
            [['fieldset_id', 'fieldsetId', 'created_at', 'updated_at'], 'safe'],
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
        $query = Field::find();
        $query->joinWith('fieldset');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name','fieldsetName', 'fieldsetId']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $fieldSearch = (!empty($params['FieldSearch']))?$params['FieldSearch']:[];
        $fieldsetId = (!empty($fieldSearch['fieldsetId']))?$fieldSearch['fieldsetId']:'';
        //echo '<pre>'; print_r( $fieldsetId ); echo '</pre>'; exit;

        $query->andFilterWhere(['field.id' => $this->id]);
        //$query->andFilterWhere(['fieldset_id' => $this->fieldset_id]);
        $query->andFilterWhere(['like', 'field.name', $this->name]);
        $query->andFilterWhere(['in', 'fieldset.id', $fieldsetId]);


        return $dataProvider;
    }
}
