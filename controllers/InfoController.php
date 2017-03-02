<?php
/**
 * Created by PhpStorm.
 * User: Dilemma丶
 * Date: 2017/3/2
 * Time: 9:46
 */

namespace app\controllers;


use yii\web\Controller;

class InfoController extends Controller
{
    public $layout = 'info';

    public function actionIndex()
    {
        return $this->render('index');
    }
}