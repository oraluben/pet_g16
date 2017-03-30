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

    public function actionCreate1()
    {
        return $this->render('create1');
    }

    public function actionCreate2()
    {
        return $this->render('create2');
    }

    public function actionCreate3()
    {
        return $this->render('create3');
    }

    public function actionCreate4()
    {
        return $this->render('create4');
    }

    public function actionCreate5()
    {
        return $this->render('create5');
    }

    public function actionCreate6()
    {
        return $this->render('create6');
    }

    public function actionClassification()
    {
        return $this->render('classification');
    }

    public function actionModify()
    {
        return $this->render('modify');
    }

    public function actionDetail()
    {
        return $this->render('detail');
    }

    public function actionUser()
    {
        return $this->render('user');
    }

    public function actionDepartment()
    {
        return $this->render('department');
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