<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TipoVeiculo $model */

$this->title = 'Update Tipo Veiculo: ' . $model->idTipoVeiculo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoVeiculo, 'url' => ['view', 'idTipoVeiculo' => $model->idTipoVeiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-veiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
