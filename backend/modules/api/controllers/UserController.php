<?php

namespace backend\modules\api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the api module
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function init()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

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

    public function actionLoginTeste()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');

        // Find the user by email
        $user = User::find()->where(['username' => $username])->one();

        if (!$user) {
            return [
                'status' => 'error',
                'message' => 'Invalid email or password.',
            ];
        }


        // Compare the provided password with the stored hash
        if (!Yii::$app->security->validatePassword($password, $user->password_hash)) {
            return [
                'status' => 'error',
                'message' => 'Invalid email or password.',
            ];
        }

        // Generate a new token
        $token = Yii::$app->security->generateRandomString();

        // Store the token in the database
        $user->verification_token = $token;
        $user->save();

        return [
            'status' => 'success',
            'token' => $token,
            'user' => $user,
        ];
    }

    public function actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');
        $user = User::find()->where(['username' => $username])->one();

        if ($user != null && Yii::$app->security->validatePassword($password, $user->password_hash)) {
            $response = [
                'success' => true,
                'message' => 'Login successful.',
                'username' => $user->username,
                'email' => $user->email,
                'id'=>$user->id,
            ];
            // You can set the user session here
            Yii::$app->user->login($user);
        } else {
            $response = [
                'success' => false,
                'message' => 'Incorrect username or password.',
            ];
        }

        return $response;
    }
}