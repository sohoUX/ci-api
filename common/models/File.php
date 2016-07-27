<?php

namespace common\models;

use Yii;
use common\helpers\Pdf;
use \yii\helpers\BaseFileHelper;
/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $name
 * @property string $hash
 * @property string $type
 * @property integer $user_id
 * @property string $source
 * @property string $entity_type
 * @property string $entity_id
 * @property string $created_at
 * @property string $updated_at
 */
class File extends \yii\db\ActiveRecord
{

    const TYPE_TEXT = 'txt';
    const TYPE_PDF = 'pdf';
    const TYPE_EXCEL = 'xlsx';

    public $content = null;
    public $source_file = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    public function getRepository(){
        return \Yii::getAlias('@common')."/files/".date('Ym');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'entity_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'hash', 'type', 'source', 'entity_type'], 'string', 'max' => 255]
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
            'hash' => 'Codigo',
            'source' => 'Fuente',
            'user_id' => 'Usuario',
            'type' => 'Tipo',
            'entity_id' => 'ID Dueño',
            'entity_type' => 'Dueño',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
    }

    public function beforeSave($insert = false) {
        if ($insert):
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $this->user_id = Yii::$app->user->identity->id;
        else:
            $this->updated_at = date('Y-m-d H:i:s');
        endif;
        if( !empty( $this->source_file ) ){
            $this->copy();
        }

        return parent::beforeSave($insert);
    }

    public function copy(){
        $repo = $this->getRepository();
        if( !file_exists($repo)){
            if (!mkdir($repo, 0777)) {
                return false;
            }
        }
        $this->hash = $this->createHash();
        $this->source = $this->getRepository();
        return copy($this->source_file, $this->source."/".$this->hash);
    }

    public function setSourceFile($source_file = null){
        $this->source_file = $source_file;
    }

    public function createHash(){
        return md5(time());
    }

    public function getMimeType(){
        $mimeTypes = require(\Yii::getAlias('@vendor')."/yiisoft/yii2/helpers/mimeTypes.php");
        $mime = 'application/octet-stream';
        if( !empty($mimeTypes) && !empty($mimeTypes[$this->type]) ){
            $mime = $mimeTypes[$this->type];
        }

        return $mime;
    }

    public function getFullPath(){
        return "{$this->source}/{$this->hash}";
    }

    public function getContent(){
        return file_get_contents("{$this->source}/{$this->hash}");
    }

    public function setEntity( $entity = null ){
        $this->entity_type = $entity->tableName();
        $this->entity_id = $entity->id;
        return $this;
    }

}
