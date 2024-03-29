<?php

namespace backend\modules\api\controllers;

use common\models\Profile;
use common\models\User;
use Psy\Util\Json;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;


class ProfileController extends \yii\web\Controller
{
    public $modelClass = 'common\models\Profile';
    public function init()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        parent::init();
        \Yii::$app->user->enableSession = false;
    }
    public function actionIndex()
    {

        $veiculo = Profile::find()->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $veiculo;

    }

    //http://localhost:8888/equipamento/total
    public function actionTotal()
    {
        $eqpmodel = new $this->modelClass;
        $recs = $eqpmodel::find()->all();
        return ['total' => count($recs)];
    }

    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $veiculo = Profile::findOne($id);

        return $veiculo;

    }

}