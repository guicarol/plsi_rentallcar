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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
