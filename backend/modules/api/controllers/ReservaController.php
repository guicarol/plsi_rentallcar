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


class ReservaController extends \yii\web\Controller{

    public function actionReservas($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $reservas = DetalhesAluguer::find()->where(['profile_id'=>$id])->orderBy(['data_inicio'=>SORT_DESC])->all();

        $reserva=array();
        foreach ($reservas as $i ){
            $reserva[] = Array(
                "id_reserva" => $i->id_detalhes_aluguer,
                "data_inicio" => date("d-m-Y", strtotime($i->data_inicio)),
                "data_fim" => date("d-m-Y", strtotime($i->data_fim)),
                "veiculo_id" => $i->veiculo_id,
                "marca" => $i->veiculo->marca,
                "modelo" => $i->veiculo->modelo,
                "profile_id" => $i->profile_id,
                "seguro_id" => $i->seguro_id,
                "seguro" => $i->seguro->cobertura,
                "localizacao_levantamento" => $i->localizacaoLevantamento->localizacao,
                "localizacao_devolucao" => $i->localizacaoLevantamento->localizacao,
            );
        }
        return $reserva;

    }
}
