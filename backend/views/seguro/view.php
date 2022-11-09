<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Seguro $model */

$this->title = $model->idSeguro;
$this->params['breadcrumbs'][] = ['label' => 'Seguros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="seguro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idSeguro' => $model->idSeguro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idSeguro' => $model->idSeguro], [
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
            'idSeguro',
            'marca',
            'cobertura',
            'preco',
        ],
    ]) ?>

</div>
