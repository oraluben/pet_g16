<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/7/2017
 * Time: 2:27 PM
 */

namespace app\actions;


use app\models\User;
use yii\base\Action;
use yii\web\ForbiddenHttpException;

class RegisterAction extends Action
{
    public function run()
    {
        $post = \Yii::$app->request->post();
        $user = new User();

        if ($user->load($post, '') && $user->save()) {
            return [
                'success' => true,
                'message' => '注册成功',
            ];
        } else {
            throw new ForbiddenHttpException(json_encode([
                'success' => false,
                'message' => '注册失败',
                'errors' => $user->errors,
            ]));
        }
    }
}