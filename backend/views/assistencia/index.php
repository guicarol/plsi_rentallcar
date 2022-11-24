<?php

use common\models\Assistencia;
use common\models\Veiculo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\AssistenciaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Assistencias';
$this->params['breadcrumbs'][] = $this->title;

$veiculos = ArrayHelper::map(Veiculo::find()->asArray()->all(), 'id_veiculo', function($model){
    return $model['marca']. ' ' . $model['modelo'];
});

$condicoes = ArrayHelper::map(Assistencia::find()->asArray()->all(), 'condicao', 'condicao');

?>
<div class="assistencia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'data_pedido',
            'mensagem',
            'localizacao',
            //'condicao',
            [
                'label' => 'Condicao',
                'attribute' => 'condicaoDrop',
                'format' => 'raw',
                'filter' => $condicoes,
                'value' => function($model){
                    return $model->condicao;
                }
            ],
            [
                'label' => 'Veiculo',
                'attribute' => 'veiculoDrop',
                'format' => 'raw',
                'filter' => $veiculos,
                'value' => function($model){
                    return $model->veiculo->marca . " " . $model->veiculo->modelo;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Assistencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_assistencia' => $model->id_assistencia]);
                 }
            ],
        ],
    ]); ?>


</div>
