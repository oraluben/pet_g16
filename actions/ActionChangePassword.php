<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/9/2017
 * Time: 8:03 AM
 */

namespace app\actions;


use app\models\User;
use yii\base\Action;
use yii\web\ForbiddenHttpException;

class ActionChangePassword extends Action
{
    public function run()
    {
        $user = User::getUser(\Yii::$app->request->post('user'));
        $user->password = \Yii::$app->request->post('password');

        if ($user->save()) {
            return [
                'success' => true,
                'message' => '操作成功',
            ];
        } else {
            throw new ForbiddenHttpException(json_encode([
                'success' => false,
                'message' => '操作失败',
                'errors' => $user->errors,
            ]));
        }
    }
}