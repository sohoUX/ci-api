<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

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
class UserSearch extends User
{
    public $fullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'fullName'], 'safe'],
            ['type', 'in', 
                'range' => [self::TYPE_ADMIN, self::TYPE_CONSULTANT, self::TYPE_SUPERVISOR]],
            [['username', 'name', 'last_name', 'email'], 'string', 'max' => 255]
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
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['fullName', 'username', 'email']]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            return $dataProvider;
        }*/
        $userSearch = (!empty($params['UserSearch']))?$params['UserSearch']:[];
        $fullName = (!empty($userSearch['fullName']))?$userSearch['fullName']:"";
        //echo '<pre>'; print_r( $fieldsetId ); echo '</pre>'; exit;

        $query->andFilterWhere(['user.id' => $this->id]);
        $query->andFilterWhere(['like', 'CONCAT(user.name," ",user.last_name)', $this->fullName]);
        $query->andFilterWhere(['like', 'user.username', $this->username]);
        $query->andFilterWhere(['like', 'user.email', $this->email]);
        $query->andFilterWhere(['user.status' => $this->status]);
        $query->andFilterWhere(['user.type' => $this->type]);
        //$query->andFilterWhere(['in', 'fieldset.id', $fieldsetId]);


        return $dataProvider;
    }
}
