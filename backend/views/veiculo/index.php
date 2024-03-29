<?php

use common\models\Veiculo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\VeiculoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Veiculos';
$this->params['breadcrumbs'][] = $this->title;

// \yii\helpers\ArrayHelper::map(\common\models\Genre::find()->asArray()->all(), 'id', 'name')


?>
<div class="veiculo-index">


    <p>
        <?= Html::a('Create Veiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'marca',
            'modelo',
            'combustivel',
            [
                'label' => 'Preço',
                'value' => function ($model) {
                    return $model->preco.'€';
                }
            ],
            'matricula',
            'descricao',
            'franquia',
            //'tipoVeiculo.categoria',
            //'id_tipo_veiculo',
            [
                'label' => 'Tipo Veiculo',
                'attribute' => 'tipoVeiculos',
                'format' => 'raw',
                'filter' => $tipoVeiculos,
                'value' => function ($model) {
                    {
                        return $model->tipoVeiculo->categoria ;
                    }
                }
            ],
            [
                'label' => 'Estado',
                'attribute' => 'estado',
                'format' => 'raw',
                //'filter' => $model,
                'value' => function ($model) {
                    {
                        return $model->estado ;
                    }
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Veiculo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_veiculo' => $model->id_veiculo]);
                }
            ],
        ],
    ]); ?>


</div>
