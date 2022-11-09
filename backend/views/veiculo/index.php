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
            'idVeiculo',
            'marca',
            'modelo',
            'combustivel',
            'preco',
            'matricula',
            'descricao',
            [
                'label' => 'Tipoveiculo',
                'value' => function ($model) {
                    {
                        return $model->idTipoVeiculo0->categoria ;
                    }
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Veiculo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idVeiculo' => $model->idVeiculo]);
                }
            ],
        ],
    ]); ?>


</div>
