<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/30
 * Time: 8:29
 */

namespace app\assets;

use yii\web\AssetBundle;

class ClassificationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/jquery.toastmessage.css',
        'css/bootstrap-table.css',
        'css/datepicker3.css',
        'css/styles.css',
    ];
    public $js = [
        'js/jquery.toastmessage.js',
        'js/chart.min.js',
        'js/chart-data.js',
        'js/easypiechart.js',
        'js/easypiechart-data.js',
        'js/info.js',
        'js/controllers/ClassificationCtrl.js',
        'js/controllers/OuterCtrl.js',
        'js/bootstrap-table.js',
        'js/bootstrap-datepicker.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\AngularAsset',
        'app\assets\BootstrapDatePicker',
    ];
}