<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/7/2017
 * Time: 2:20 PM
 */

namespace app\actions;


use app\models\UserLoginForm;
use yii\base\Action;

class LoginAction extends Action
{
    public function run()
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