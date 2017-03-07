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

    public function actionCase()
    {
        return $this->render('case');
    }

    public function actionUser()
    {
        return $this->render('user');
    }

    public function actionPwd()
    {
        return $this->render('pwd');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }
}