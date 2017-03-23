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

    public function actionCreate()
    {
        return $this->render('create');
    }
    public function actionCreate1()
    {
        return $this->render('create1');
    }

    public function actionCreate2()
    {
        return $this->render('create2');
    }
    public function actionModify()
    {
        return $this->render('modify');
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