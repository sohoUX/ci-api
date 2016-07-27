<?php
namespace api\controllers;

use Yii;
use common\models\User;

/**
 * Site Response
 */
class Response
{
    public $statusCode = 200;
    public $message;
    public $name;
    public $data;
    /**
     * @inheritdoc
     */
    public function __construct( $statusCode = 200, $message = "", $name = "", $data = [] )
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->name = $message;
        $this->data = $data;
        echo '<pre>'; print_r( $this ); echo '<pre>'; exit;
        return $this->toArray();
    }

    public function toArray(){
        return [
            'statusCode' => $this->statusCode,
            'message' => $this->message,
            'name' => $this->name,
            'data' => $this->data
        ];
    }

   
}
