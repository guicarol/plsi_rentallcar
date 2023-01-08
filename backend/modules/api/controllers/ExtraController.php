<?php

namespace backend\modules\api\controllers;

use common\models\Extra;
use Psy\Util\Json;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Controller;


class ExtraController extends \yii\web\Controller
{
    public $modelClass = 'common\models\Extra';

    public function actionIndex()
    {
        $extra=Extra::find()->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return  $extra;

    }
    //http://localhost:8888/equipamento/total
    public function actionTotal()
    {
        $eqpmodel = new $this->modelClass;
        $recs = $eqpmodel::find()->all();
        return ['total' => count($recs)];
    }

}
