<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\TipoVeiculo $model */

$this->title = $model->idTipoVeiculo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-veiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTipoVeiculo' => $model->idTipoVeiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTipoVeiculo' => $model->idTipoVeiculo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTipoVeiculo',
            'categoria',
        ],
    ]) ?>

</div>
