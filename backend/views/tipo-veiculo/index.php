<?php

use common\models\TipoVeiculo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TipoVeiculoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Veiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Veiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipo_veiculo',
            'categoria',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoVeiculo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tipo_veiculo' => $model->id_tipo_veiculo]);
                 }
            ],
        ],
    ]); ?>


</div>
