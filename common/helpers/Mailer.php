<?php

namespace common\helpers;

class Mailer{
	private $mailer = null;
	private $params = [];
	private $files = [];
	private $template = "template-html";
	private $targets = [];

	private $subject = "SELLUTION - Notificación";

	public function __construct(){
        $this->mailer = \Yii::$app->mailer;
        $this->mailer->useFileTransport = false;
        $this->mailer->setViewPath(\Yii::getAlias('@common')."/mail");
	}

	public function setSubject( $subject = null){
		$this->subject = $subject;

		return $this;
	}

	public function addTarget( $email = null, $name = null ){
		if( !empty($name) ){
			$this->targets[$email] = $name;
		}
		else{
			$this->targets[] = $email;
		}

		return $this;
	}
	public function addTargets( $targets = [] ){
		foreach( $targets as $email => $name ){
			if( is_numeric($email) ){
				$this->addTarget($name);
			}
			else{
				$this->addTarget($email, $name);	
			}
			
		}
		return $this;
	}

	public function getSubject(){
		return $this->subject;
	}

	public function setTemplate( $template = null){
		$this->template = $template;
		return $this;
	}

	public function getTemplate(){
		return $this->template;
	}

	public function setParams( $params = null ){
		$this->params = $params;

		return $this;
	}

	public function addParam( $key = null, $param = null ){
		$this->params[$key] = $param;

		return $this;
	}

	public function getParams(){
		return $this->params;
	}

	public function addFile( $file ){
		$this->files[] = $file;
	}

	public function getFiles(){
		return $this->files;
	}

	public function hasFiles(){
		return (count($this->getFiles()) > 0)?true:false;
	}

	public function getStyles(){
		$styles = [
			"body" =>  "background-color: #DDDDDD; color: #2C2C31; width: 100% !important; font-family: sans-serif; font-size: 16px; padding: 0; margin: 0px;",
			"header" => "background-color: #693871; border-bottom: 3px solid #4e2a54; min-height: 74px; position: relative;",
			"header_logo" => "background-color: #693871; border-bottom: 3px solid #4e2a54; min-height: 74px; position: relative;",
			"container" => "padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;",
			"content" => "padding: 30px 0;",
			"feature" => "background-color: #EEE; border: 1px solid #BABABA; border-right: transparent; border-left: transparent; padding: 10px;",
			"section" => "background-color: #EEE; border: 1px solid #BABABA; border-right: transparent; border-left: transparent; padding: 10px 0; padding-bottom: 20px;",
			"footer" => "font-size: 18px; padding: 10px 20px;",
		];
		$styles = (object)$styles;

		return $styles;
	}

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function send()
    {
    	$params = $this->getParams();
    	$messages = [];
        if ($this->mailer) {

            foreach( $this->targets as $email => $name ){
				if( is_numeric($email) ){
					$email = $name;
					$name = null;
				}
	            $message = $this->mailer->compose(['html' => $this->template], [
	            	'user' => \Yii::$app->user->identity, 
	            	'params' => $params, 
	            	'styles' => $this->getStyles()
	            ]);
	            $message->setFrom('victor@soho.cl') ->setTo($email)->setSubject( "SELLUTIONS - {$this->subject}" );

	            if( $this->hasFiles() ){
	            	foreach( $this->getFiles() as $file ){
	    				$message->attachContent( $file->getContent(), ['fileName' => $file->name, 'contentType' => $file->getMimeType() ]);
	    			}
	            }
	            $messages[] = $message;
            }
            if( !empty($messages) ){
            	if(count($messages) == 1){
					$sent = $messages[0]->send();
            	}
            	else{
            		$sent = $this->mailer->sendMultiple($messages);
            	}
            }
            else{
            	$sent = false;
            }
			
			//echo '<pre>'; var_dump( $sent ); echo '</pre>'; exit;

			return $sent;
        }

        return false;
    }

}