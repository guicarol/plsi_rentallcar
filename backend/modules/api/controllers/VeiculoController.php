<?php

namespace backend\modules\api\controllers;

use common\models\DetalhesAluguer;
use common\models\Veiculo;
use Psy\Util\Json;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\StringHelper;
use yii\rest\ActiveController;
use yii\web\Controller;


class VeiculoController extends \yii\web\Controller
{
    public $modelClass = 'common\models\Veiculo';

    //http://localhost:8888/veiculo/

    public function init()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        parent::init();
        \Yii::$app->user->enableSession = false;
    }

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


    //http://localhost:8888/veiculo/view?id=1
    public function actionCreate($data_inicio, $data_fim, $veiculo_id, $profile_id, $seguro_id, $localizacaol, $localizacaod)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

       /* $request = Yii::$app->request;
        $data_inicio = $request->get('data_inicio');
        $data_fim = $request->get('data_fim');
        $veiculo_id = $request->get('veiculo_id');

        $profile_id = $request->post('profile_id');
        $seguro_id = $request->post('seguro_id');
        $localizacaol = $request->post('localizacao_levantamento_id');
        $localizacaod = $request->post('localizacao_devolucao_id');

        /* $verifica = User::findOne(['username' => $data_inicio]);
         $verifica2 = User::findOne(['email' => $email]);
         if ($verifica !== null && $verifica2 !== null) {
             return ['exists' => true];
         }*/

        $model = new DetalhesAluguer();
        $model->data_inicio = $data_inicio;
        $model->data_fim = $data_fim;
        $model->veiculo_id = $veiculo_id;
        $model->profile_id = $profile_id;
        $model->seguro_id = $seguro_id;
        $model->localizacao_levantamento_id = $localizacaol;
        $model->localizacao_devolucao_id = $localizacaod;
        $headers = Yii::$app->getRequest()->getHeaders();
        $headers->set('auth', 'YOUR_AUTH_TOKEN');
        if ($model->save()) {

            return [
                'status' => 'success',
                'data' => 'detalhes has been created successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'errors' => $model->errors,
                'teste' => $veiculo_id

            ];
        }
    }

    public function actsionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $nome = $request->post('nome');
        $apelido = $request->post('apelido');
        $telemovel = $request->post('telemovel');
        $nr_carta_conducao = $request->post('nr_carta_conducao');
        $nome = $request->post('nome');
        $apelido = $request->post('apelido');
        $telemovel = $request->post('telemovel');
        $nr_carta_conducao = $request->post('nr_carta_conducao');

        $model = new Veiculo();
        $model->marca = "tesete";
        $model->modelo = "tesete";
        $model->combustivel = "tesete";
        $model->preco = 123;
        $model->matricula = "tesete";
        $model->descricao = "tesete";
        $model->estado = "pronto";
        $model->tipo_veiculo_id = 1;
        $model->localizacao_id = 1;
        $model->franquia = 12;
        if ($model->save()) {
            return [
                'status' => 'success',
                'message' => 'Profile created successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Error creating profile.'
            ];
        }
    }
}
