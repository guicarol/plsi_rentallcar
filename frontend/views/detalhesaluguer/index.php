<?php

use common\models\Detalhesaluguer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\DetalhesaluguerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Detalhesaluguers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalhesaluguer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detalhesaluguer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'data_inicio',
            'data_fim',
            [
                'label' => 'Carro',
                'value' => function ($model) {
                    return $model->veiculo->marca ." ".$model->veiculo->modelo;
                }
            ],
            [
                'label' => 'Tipo de seguro',
                'value' => function ($model) {
                    return $model->seguro->cobertura;
                }
            ],
            [
                'label' => 'Localizacao de recolha',
                'value' => function ($model) {
                    return $model->localizacaoLevantamento->morada;
                }
            ],
            [
                'label' => 'Localizacao de devolucao',
                'value' => function ($model) {
                    return $model->localizacaoDevolucao->morada;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detalhesaluguer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_detalhes_aluguer' => $model->id_detalhes_aluguer]);
                }
            ],
        ],
    ]); ?>

   

</div>
