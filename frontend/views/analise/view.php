<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Analise $model */

$this->title = $model->id_analise;
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['/analise/index', 'id_user' => Yii::$app->user->getId()]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="analise-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_analise' => $model->id_analise], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_analise' => $model->id_analise], [
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
            'id_analise',
            'comentario',
            'data_analise',
            'profile_id',

        ]]) ?>
    <?= \kartik\rating\StarRating::widget([
        'model' => $model,
        'attribute' => 'classificacao',
        'pluginOptions' => [
            'readonly' => true,
            'showClear' => false,
            'showCaption' => false,
        ],
    ]); ?>


</div>
