<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/23/2017
 * Time: 10:28 AM
 */

namespace app\actions;


use app\models\PetCaseClassification;
use yii\base\Action;
use yii\helpers\ArrayHelper;

class ClassificationsAction extends Action
{
    public function run($pretty = false)
    {
        $table = PetCaseClassification::find()->all();
        if ($pretty) {
            $res = [];
            $tree = [];
            $q = [];
            foreach ($table as $c) {
                /** @var PetCaseClassification $c */
                if (!is_null($c->parent)) {
                    $_c = ArrayHelper::getValue($res, $c->parent, []);
                    $_c[] = [$c->id, $c->classification_name];
                    $res[$c->parent] = $_c;
                } else {
                    $_root = [$c->id, $c->classification_name];
                    $tree[] = &$_root;
                    $q[] = &$_root;
                }
            }

            while (!empty($q)) {
                $c = &$q[0];
                if (ArrayHelper::keyExists($c[0], $res)) {
                    $child_list = ArrayHelper::getValue($c, 2, []);
                    foreach (ArrayHelper::getValue($res, $c[0], []) as $_c) {
                        $cur_value = [$_c[0], $_c[1]];
                        $q[] = &$cur_value;
                        $child_list[] = &$cur_value;
                        unset($cur_value);
                    }
                    $c[2] = $child_list;
                }
                array_shift($q);
            }

            return $tree;
        }
        return $table;
    }
}