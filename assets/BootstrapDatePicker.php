<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/7/2017
 * Time: 1:19 PM
 */

namespace app\assets;


use yii\web\AssetBundle;

class BootstrapDatePicker extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/datepicker3.css',
    ];
    public $js = [
        'js/bootstrap-datepicker.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}