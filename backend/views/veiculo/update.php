<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = 'Update Veiculo: ' . $model->marca . " " . $model->modelo;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_veiculo, 'url' => ['view', 'id_veiculo' => $model->id_veiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="veiculo-update">


    <?= $this->render('_form', [
        'model' => $model,
        'modelupload'=>$modelupload,
        'combustivel' => array('diesel' => 'Diesel', 'gasolina' => 'Gasolina', 'hibrido' => 'Hibrido'),
    ]) ?>

</div>
