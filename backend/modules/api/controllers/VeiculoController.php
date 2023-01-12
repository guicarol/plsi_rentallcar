<?php

namespace backend\modules\api\controllers;

use common\models\Veiculo;
use Psy\Util\Json;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Controller;


class VeiculoController extends \yii\web\Controller
{
    public $modelClass = 'common\models\Veiculo';

    //http://localhost:8888/veiculo/

    public function actionIndex()
    {

        $veiculo = Veiculo::find()->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $veiculo;

    }

    //http://localhost:8888/veiculo/total
    public function actionTotal()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $eqpmodel = new $this->modelClass;
        $recs = $eqpmodel::find()->all();
        return ['total' => count($recs)];
    }

    //http://localhost:8888/veiculo/view?id=1
    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $veiculo = Veiculo::findOne($id);

        return $veiculo;

    }
}
