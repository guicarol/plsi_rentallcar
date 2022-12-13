<?php

namespace backend\controllers;

use common\models\DetalhesAluguer;

class FaturaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate($id_detalhes_aluguer){
        $detalhesAluguer = new DetalhesAluguer();
        $detalhesAluguer->find()->where(['id_detalhes_aluguer' => $id_detalhes_aluguer]);

        var_dump($detalhesAluguer);die;

        return $this->render('index');
    }
}
