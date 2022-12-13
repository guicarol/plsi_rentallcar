<?php

namespace backend\controllers;

use common\models\DetalhesAluguer;
use common\models\Fatura;

class FaturaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate($id_detalhes_aluguer){

        $detalhesAluguer = DetalhesAluguer::findOne($id_detalhes_aluguer);

        $model = new Fatura();

        $model->data_inicio_aluguer = $detalhesAluguer->data_inicio;
        $model->data_fim_aluguer = $detalhesAluguer->data_fim;
        $model->data_fatura = date("Y-m-d H:i:s");

        var_dump($model);die;

        //detalhes aluguer -> fatura (ainda nao existe)

        return $this->render('index');
    }
}
