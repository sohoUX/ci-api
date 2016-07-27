<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace api\assets;

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
        ["api/web/css/bootstrap.min.css"],
        "api/web/css/font-awesome.min.css",
        "api/web/css/jquery.jqplot.min.css",
        ["api/web/css/spaces.css"],
        ["api/web/css/style.css"],
    ];
    public $js = [
        "api/web/js/lib/jquery.min.js",
        "api/web/js/lib/jquery.jqplot.js",

        "api/web/js/lib/plugins/jqplot.highlighter.js",
        "api/web/js/lib/plugins/jqplot.cursor.js",
        "api/web/js/lib/plugins/jqplot.dateAxisRenderer.js",
        "api/web/js/lib/plugins/jqplot.barRenderer.js",
        "api/web/js/lib/plugins/jqplot.pieRenderer.js",
        "api/web/js/lib/plugins/jqplot.categoryAxisRenderer.js",
        "api/web/js/lib/plugins/jqplot.canvasAxisTickRenderer.js",
        "api/web/js/lib/plugins/jqplot.canvasAxisLabelRenderer.js",
        "api/web/js/lib/plugins/jqplot.canvasTextRenderer.js",
        "api/web/js/lib/plugins/jqplot.pointLabels.js",

        "api/web/js/lib/moment.js",
        "api/web/js/lib/angular.min.js",
        "api/web/js/lib/angular-animate.js",
        "api/web/js/lib/ui-bootstrap-1.3.1.min.js",
        "api/web/js/lib/ui-bootstrap-tpls-1.3.1.min.js",
        "api/web/js/lib/angular-moment.min.js",
        "api/web/js/lib/ui-chart.min.js"
    ];
    public $depends = [

    ];
}
