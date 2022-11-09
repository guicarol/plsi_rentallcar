<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Seguro $model */

$this->title = 'Update Seguro: ' . $model->idSeguro;
$this->params['breadcrumbs'][] = ['label' => 'Seguros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSeguro, 'url' => ['view', 'idSeguro' => $model->idSeguro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seguro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
