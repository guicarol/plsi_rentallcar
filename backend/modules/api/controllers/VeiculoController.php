<?php

namespace backend\modules\api\controllers;

use common\models\DetalhesAluguer;
use common\models\ExtraDetalhesAluguer;
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
    public function actionCreate($data_inicio, $data_fim ,$veiculo_id, $profile_id, $seguro_id, $localizacaol, $localizacaod)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new DetalhesAluguer();
      //  $model->extras = $this->request->post()['DetalhesAluguer']['extras'];
/*
        if ($selecteditems != null)
            foreach ($selecteditems as $extradetalhes) {
                $extradetalhesaluguer = new ExtraDetalhesAluguer();
                $extradetalhesaluguer->extra_id = $extradetalhes;
                $extradetalhesaluguer->detalhes_aluguer_id = $model->id_detalhes_aluguer;
                $extradetalhesaluguer->save();
            }*/
        $model->data_inicio = date('Y-m-d H:i', strtotime($data_inicio));
        $model->data_fim = date('Y-m-d H:i', strtotime($data_fim));
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
                'message' => 'detalhes has been created successfully.',
                'idreserva' => $model->id_detalhes_aluguer
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
                'message' => 'Reserva created successfully.'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Error creating profile.'
            ];
        }
    }
}
