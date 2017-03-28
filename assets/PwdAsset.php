<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/14
 * Time: 15:10
 */

namespace app\assets;

use yii\web\AssetBundle;

class PwdAsset extends AssetBundle
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
        'js/bootstrap-datepicker.js',
        'js/info.js',
        'js/controllers/PwdCtrl.js',
        'js/controllers/OuterCtrl.js',
        'js/bootstrap-table.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\AngularAsset'
    ];
}