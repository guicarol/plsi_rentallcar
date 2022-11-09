<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = 'Update Veiculo: ' . $model->idVeiculo;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVeiculo, 'url' => ['view', 'idVeiculo' => $model->idVeiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="veiculo-update">


    <?= $this->render('_form', [
        'model' => $model,
        'combustivel' => array('diesel' => 'Diesel', 'gasolina' => 'Gasolina', 'hibrido' => 'Hibrido'),

    ]) ?>

</div>
