<?php

namespace common\helpers;
use Yii;

require_once(Yii::getAlias('@vendor')."/PHPExcel/PHPExcel.php");
require_once(Yii::getAlias('@vendor')."/PHPExcel/PHPExcel/IOFactory.php");
require_once(Yii::getAlias('@vendor')."/PHPExcel/PHPExcel/Cell.php");

class Excel{
	public $document = null;

	public function __construct( $document = null ){
		$this->document = $document;
	}


	public static function open( $source_path = null ){
		$instance = false;
		if( file_exists($source_path) ){
			$file = \PHPExcel_IOFactory::load($source_path);
			$instance = new Excel($file);
		}

		return $instance;
	}
	public static function getStringColumn( $column_index = null ){
		return \PHPExcel_Cell::stringFromColumnIndex($column_index);
	}
	
}