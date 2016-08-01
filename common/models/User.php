<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use common\helpers\Mailer;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $last_name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $type
 * @property integer $gender
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const TYPE_ADMIN = 1;
    const TYPE_CONSULTANT = 2;
    const TYPE_SUPERVISOR = 3;
    const TYPE_DEFAULT = 2;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    public $password = "";

    public $fullname = "";
    public $typename = "";
    public $statusname = "";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['type', 'in', 
                'range' => [self::TYPE_ADMIN, self::TYPE_CONSULTANT, self::TYPE_SUPERVISOR]],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['username', 'name', 'last_name', 'email'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nombre',
            'last_name' => 'Apellido',
            'username' => 'Nombre de Usuario',
            'email' => 'Correo',
            'status' => 'Estado',
            'type' => 'Tipo',
            'typename' => 'Tipo',
            'created_at' => 'Fecha Creación',
            'updated_at' => 'Fecha Actualización',
            'password' => 'Contraseña',
            'Avatar' => 'Avatar'
        ];
    }
    public static function typeLabels()
    {
        return [
            self::TYPE_ADMIN => "Administrador",
            self::TYPE_CONSULTANT => "Consultor",
            self::TYPE_SUPERVISOR => "Supervisor"
        ];
    }

    public static function statusLabels()
    {
        return [
            self::STATUS_DELETED => "Inactivo",
            self::STATUS_ACTIVE => "Activo",
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsernameAndType($username, $type = null)
    {
        $type = (!empty($type))?$type:self::TYPE_CONSULTANT;

        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE, 'type' => $type]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findConsultants()
    {
        return static::find(['type' => self::TYPE_CONSULTANT, 'status' => self::STATUS_ACTIVE], ['order' => 'name'])
        ->orderBy('name')
        ->all();
    }

    public static function populateRecord($record, $row){
        $record->fullname = $row['name']." ".$row['last_name'];
        $typelabels = self::typeLabels();
        $statuslabels = self::statusLabels();
        $record->typename = $typelabels[$row['type']];
        $record->statusname = $statuslabels[$row['status']];
        return parent::populateRecord($record, $row);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function upload()
    {
        $weebRoot = str_replace('backend', 'frontend', Yii::getAlias("@webroot") );
        $avatarPath = Yii::getAlias("@frontend")."/web/img/avatars";
        $avatar = "{$this->id}.{$this->avatar->extension}";
        $avatarPath = "{$avatarPath}/{$avatar}";
        $result = $this->avatar->saveAs($avatarPath);
        if($result){
            $this->avatar = "/frontend/web/img/avatars/{$avatar}";
            $this->save();
        }
    }

    public function getCompanies(){
        return $this->hasMany(Company::className(), ['id' => 'user_id'])
            ->viaTable('company_user', ['company_id' => 'id']);
    }

    public function getPositons(){
        return $this->hasMany(Position::className(), ['id' => 'user_id'])
            ->viaTable('company_user', ['position_id' => 'id']);
    }
}
