<?php

namespace backend\modules\api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the api module
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function init()
    {        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            //’except' => ['index', 'view'],
            'auth' => [$this, 'auth']
        ];

        return $behaviors;
    }

    public function auth($username, $password)
    {

        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    }
}