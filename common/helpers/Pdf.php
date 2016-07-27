<?php

namespace common\helpers;

class Pdf extends \yii\helpers\BaseFileHelper{
	const BIN = "/wkhtmltox/bin/wkhtmltopdf";
	const DIR_REPORTS = "/files/reports";
	public $file;
	public $type = 'report';
	public $source = null;
	public $temp = null;
	private $options = [
		'--javascript-delay 1000', 
		'--background',
		'--debug-javascript',
		'--encoding utf-8',
		'--enable-javascript',
		'--load-error-handling ignore',
		'--margin-bottom 2mm',
  		'--margin-left 0mm',
  		'--margin-right 0mm',
  		'--margin-top 0mm',
	];

	public function __construct( $source = null ){
		$this->source = $source;
		$this->temp = tempnam(sys_get_temp_dir(), "SELLUTIONS_");
	}
	public static function createFromUrl($url = null){
		$pdf = new Pdf($url);

		return $pdf;
	}

	public function getTempFile(){
		return $this->temp;
	}

	public function getBin(){
		return \Yii::getAlias('@vendor').self::BIN;
	}

	public function getRepository(){
		return \Yii::getAlias('@vendor').self::BIN;
	}

	public function setType($type = 'report'){
		$this->type = $type;
		return $this;
	}

	public function getOptions(){
		return $options = join(" ", $this->options);
	}

	public function getCommand(){
		$bin = $this->getBin();
		$options = $this->getOptions();
		$webroot = \Yii::getAlias('@webroot');
		$webroot = str_replace('/web', '/views/site/header.php', $webroot);
		$command = "{$bin} {$options} {$this->source} {$this->temp}";
		//echo "<pre>{$command}</pre>"; exit;
		return $command;
	}

	public function process(){
		$command = $this->getCommand();
		$output = [];
		$return = null;
		try{
			exec($command, $output, $return);
			//echo "<pre>"; print_r($output); echo "</pre>";
			//echo "<pre>"; print_r($return); echo "</pre>"; exit;
			//header("Content-Type: application/pdf"); echo file_get_contents($this->temp); exit;
			return true;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function getContent(){
		return file_get_contents($this->temp);
	}
}