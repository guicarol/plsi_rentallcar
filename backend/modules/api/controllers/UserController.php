<?php

namespace backend\modules\api\controllers;

use backend\models\SignupForm;
use common\models\Profile;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\ContentNegotiator;
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
        if ($this->actionSignup()) {

            $behaviors = parent::behaviors();
            $behaviors['contentNegotiator'] = [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ];
            return $behaviors;

        } else {
            $behaviors = parent::behaviors();
            $behaviors['authenticator'] = [
                'class' => HttpBasicAuth::className(),
                //’except' => ['index', 'view'],
                'auth' => [$this, 'auth']
            ];
            return $behaviors;
        }

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
                'id' => $user->id,
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


    public function actionSignup()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');
        $email = $request->post('email');
        $model = new SignupForm();
        $model->username = $username;
        $model->email = $email;
        $model->password = $password;
        $model->role = "cliente";
        $headers = Yii::$app->getRequest()->getHeaders();
        $headers->set('auth', 'YOUR_AUTH_TOKEN');
        if ($model->validate() && $model->signup()) {
            return [
                'status' => 'success',
                'data' => 'User has been created successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'errors' => $model->errors
            ];
        }
    }

    public function actionUpdateuser($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');
        $email = $request->post('email');
        $model = User::findOne($id);
        $model->username = $username;
        $model->email = $email;
        //$model->password = $password;
        $headers = Yii::$app->getRequest()->getHeaders();
        $headers->set('auth', 'YOUR_AUTH_TOKEN');
        if ($model->validate() && $model->save()) {
            return [
                'status' => 'success',
                'data' => 'User has been updated successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'errors' => $model->errors
            ];
        }
    }

    public function actionUpdateprofile($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $nome = $request->post('nome');
        $apelido = $request->post('apelido');
        $telemovel = $request->post('telemovel');
        $nr_carta_conducao = $request->post('nr_carta_conducao');
        $model = Profile::findOne($id);
        $model->nome = $nome;
        $model->apelido = $apelido;
        $model->telemovel = $telemovel;
        $model->nr_carta_conducao = $nr_carta_conducao;

        $headers = Yii::$app->getRequest()->getHeaders();
        $headers->set('auth', 'YOUR_AUTH_TOKEN');
        if ($model->validate() && $model->save()) {
            return [
                'status' => 'success',
                'message' => 'Profile has been updated successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'errors' => $model->errors
            ];
        }
    }

    public function actionViewprofile($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $veiculo = Profile::findOne($id);

        return $veiculo;

    }
}