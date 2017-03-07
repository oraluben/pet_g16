<?php

/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 2/21/2017
 * Time: 3:19 PM
 */

namespace app\assets;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    public $sourcePath = '@bower/sweetalert/dist';
    public $js = [
        'sweetalert.min.js',
    ];
    public $css = [
        'sweetalert.css',
    ];
}
