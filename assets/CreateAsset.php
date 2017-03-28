<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/16
 * Time: 8:29
 */

namespace app\assets;

use yii\web\AssetBundle;

class CreateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/jquery.toastmessage.css',
        'css/loading.css',
        'css/styles.css',
    ];
    public $js = [
        'js/controllers/CreateCtrl.js',
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