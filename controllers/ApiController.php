<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 2/28/2017
 * Time: 2:39 PM
 */

namespace app\controllers;

use app\models\UserLoginForm;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['contentNegotiator']['formats']['application/xml']);

        return $behaviors;
    }

    public function actionLogin()
    {
        $post = \Yii::$app->request->post();
        $form = new UserLoginForm();

        if ($form->load($post, '') && $form->login()) {
            return [
                'success' => true,
                'message' => '登陆成功',
            ];
        } else {
            return [
                'success' => false,
                'message' => '登录失败',
                'errors' => $form->errors,
            ];
        }
    }
}