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
        'css/lrtk.css'
    ];
    public $js = [
        'js/login.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}