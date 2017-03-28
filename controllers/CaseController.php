<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/21/2017
 * Time: 3:16 PM
 */

namespace app\controllers;


use app\actions\CaseUnitAction;
use app\actions\ClassificationsAction;
use app\actions\CreateCaseAction;
use app\actions\DeleteCaseAction;
use app\actions\GetCaseByIDAction;
use app\actions\GetCasesByClassificationAction;
use app\actions\UpdateCaseAction;
use app\actions\UpdateUnitAction;
use yii\filters\AccessControl;
use yii\rest\Controller;

class CaseController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['contentNegotiator']['formats']['application/xml']);

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['create', 'update-unit', 'update'],
                    'verbs' => ['POST'],
                ],
                [
                    'allow' => true,
                    'actions' => ['classifications', 'cases-by-cl', 'case-by-id', 'unit'],
                    'verbs' => ['GET'],
                ],
                [
                    'allow' => true,
                    'actions' => ['delete'],
                    'verbs' => ['DELETE'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'create' => CreateCaseAction::className(),
            'delete' => DeleteCaseAction::className(),
            'update' => UpdateCaseAction::className(),
            'cases-by-cl' => GetCasesByClassificationAction::className(),
            'classifications' => ClassificationsAction::className(),
            'case-by-id' => GetCaseByIDAction::className(),
            'update-unit' => UpdateUnitAction::className(),
            'unit' => CaseUnitAction::className(),
        ];
    }
}