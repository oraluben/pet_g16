<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/21
 * Time: 13:01
 */

namespace app\assets;

use yii\web\AssetBundle;

class ModifyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/jquery.toastmessage.css',
        'css/styles.css',
        'css/upload.css',
        'css/module.css',
    ];
    public $js = [
        'js/controllers/ModifyCtrl.js',
        'js/controllers/OuterCtrl.js',
        'js/jquery.toastmessage.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\AngularAsset',
    ];
}