<?php

namespace common\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $description
 * @property string $logo
 * @property string $created_at
 * @property string $updated_at
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['name', 'address'], 'string', 'max' => 255]
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
            'logo' => 'Logo',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(User::className(), ['id' => 'company_id'])
            ->viaTable('company_user', ['user_id' => 'id']);
    }


    public function upload()
    {
        $weebRoot = str_replace('backend', 'frontend', Yii::getAlias("@webroot") );
        $logoPath = Yii::getAlias("@frontend")."/web/img/logos";
        $logo = "{$this->id}-{$this->logo->baseName}-".time().".{$this->logo->extension}";
        $logoPath = "{$logoPath}/{$logo}";
        $result = $this->logo->saveAs($logoPath);
        if($result){
            $this->logo = "/frontend/web/img/logos/$logo";
            $this->save();
        }
    }

    public function hasLogo(){
        $logo = $this->logo;
        $has_logo = false;
        if( !empty( $logo ) ){
            $has_logo = true;
        }
        return $has_logo;
    }

    public function my(){
        $user = \Yii::$app->user->identity;
        $companies = Company::find()
            ->select("company.id, company.name, company.logo")
            ->leftJoin("company_user", "company_user.company_id = company.id")
            ->leftJoin("user", "user.id = company_user.user_id")
            ->where(['user.id' => $user->id])
            ->all();

        return $companies;
    }

}
