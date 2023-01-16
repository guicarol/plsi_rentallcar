<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class LoginController extends Controller
{
    public function actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $email = $request->post('email');
        $password = $request->post('password');

        // Validate email and password
        // ...

        // Check if the email and password are correct
        // ...

        // If the email and password are correct, generate a new token
        $token = 'your_token_generation_code';

        return [
            'token' => $token,
        ];
    }
}
