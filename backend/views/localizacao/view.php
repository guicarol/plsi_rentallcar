<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Localizacao $model */

$this->title = $model->idLocalizacao;
$this->params['breadcrumbs'][] = ['label' => 'Localizacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="localizacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idLocalizacao' => $model->idLocalizacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idLocalizacao' => $model->idLocalizacao], [
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
            'idLocalizacao',
            'morada',
            'codPostal',
        ],
    ]) ?>

</div>
