<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	    'formatter' => [
	        'class' => 'yii\i18n\Formatter',
	        'dateFormat' => 'd-M-Y',
	        'datetimeFormat' => 'd-M-Y H:i:s',
	        'timeFormat' => 'H:i:s',
	    ]
    ],
];
