<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Imagem $model */

$this->title = $model->idImagem;
$this->params['breadcrumbs'][] = ['label' => 'Imagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="imagem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idImagem' => $model->idImagem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idImagem' => $model->idImagem], [
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
            'idImagem',
            [
                'attribute' => 'imagem',
                'value' => Yii::getAlias('@carImgUrl') . '/' . $model->imagem,
                'format' => ['image', ['width' => '100', 'height' => '100']]
            ],
            'idVeiculo',
        ],
    ]) ?>

</div>
