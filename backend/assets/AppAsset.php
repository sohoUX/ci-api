<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/typeahead.css',
        'css/bootstrap-datepicker3.min.css',
        'css/select2.min.css',
        'css/fileupload/jquery.fileupload.css',
        'css/fileupload/jquery.fileupload-ui.css',
        'css/jquery-ui.structure.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/typeahead.bundle.min.js',
        'js/bootstrap-datepicker.min.js',
        'locales/bootstrap-datepicker.es.min.js',
        'locales/bootstrap-datepicker.es.min.js',
        'js/jquery-ui.min.js',
        'js/jquery.select2.js',
        'js/fileupload/jquery.iframe-transport.js',
        'js/fileupload/jquery.ui.widget.js',
        'js/fileupload/jquery.fileupload.js',
        'js/fileupload/jquery.fileupload-process.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
