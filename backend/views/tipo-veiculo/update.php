<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TipoVeiculo $model */

$this->title = 'Update Tipo Veiculo: ' . $model->id_tipo_veiculo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_veiculo, 'url' => ['view', 'id_tipo_veiculo' => $model->id_tipo_veiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-veiculo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
