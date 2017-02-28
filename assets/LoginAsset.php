<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 2/23/2017
 * Time: 5:00 PM
 */

namespace app\assets;


use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/lrtk.css',
        'css/sweetalert.css'
    ];
    public $js = [
        'js/login.js',
        'js/LoginCtrl.js',
        'js/sweetalert.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\AngularAsset'
    ];
}