<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subsidiary".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $description
 * @property integer $company_id
 * @property integer $province_id
 * @property string $manager
 * @property string $consultant
 * @property string $created_at
 * @property string $updated_at
 */
class Subsidiary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subsidiary';
    }
    public $companyName;
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['company_id', 'province_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'manager', 'consultant', 'address'], 'string', 'max' => 255]
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
            'address' => 'Dirección',
            'description' => 'Descripción',
            'company_id' => 'Empresa',
            'province_id' => 'Provincia',
            'manager' => 'Gerente',
            'consultant' => 'Consultor SMH',
            'created_at' => 'Creado El',
            'updated_at' => 'Actualizado El',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany() {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects() {
        return $this->hasOne(Project::className(), ['id' => 'project_id'])
        ->viaTable('project_subsidiary', ['subsidiary_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince() {
        return $this->hasOne(Province::className(), ['id' => 'province_id']);
    }

    public function getTitle(){
        return $this->province->name." · ".$this->address;
    }
    public function getLocation(){
        $address = "{$this->address}, {$this->province->name}";
        $address = http_build_query(['address' => $address]);
        $path = "http://maps.google.com/maps/api/geocode/json?{$address}";
        $response = file_get_contents($path);
        $result = false;
        if( !empty($response) ){
            $response = json_decode($response);
            if( !empty($response) && !empty($response->results) && !empty($response->results[0]) ){
                $res = $response->results[0];
                if(!empty($res->geometry) && !empty($res->geometry->location)){
                    $result = $res->geometry->location;
                }
            }
            
        }

        return $result;
    }

    public function getSlug(){
        $slug = "";
        $name = $this->name;
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
        );
        // -- Remove duplicated spaces
        $name = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $name);
        // -- Returns the slug
        $slug = strtolower(strtr($name, $table));

        return $slug;
    }
}
