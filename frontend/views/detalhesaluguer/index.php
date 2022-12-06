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
            ['class' => 'yii\grid\SerialColumn'],

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

    <?php
    $model = \common\models\Detalhesaluguer::find()->all();
    foreach($model->profile_id=$ as $value){
        echo '<tr>';
        echo '<td>' . $value->data_inicio . '</th>';
        echo '<td>' . $value->data_fim . '</td>';
        echo '<td>' . $value->veiculo->marca ." ".$value->veiculo->modelo . '</th>';
        echo '<td>' . $value->seguro->cobertura . '</th>';
        echo '<td>' . $value->localizacaoLevantamento->morada . '</td>';
        echo '<td>' . $value->localizacaoDevolucao->morada . '</th>';
        echo '<td>' . Html::a('View', ['detalhesaluguer/view', 'id_detalhes_aluguer' => $value->id_detalhes_aluguer], ['class' => 'btn btn-primary']) .'<td>';
        echo '<td>' . Html::a('Update', ['detalhesaluguer/update', 'id_detalhes_aluguer' => $value->id_detalhes_aluguer], ['class' => 'btn btn-primary']) .'<td>';
        echo '<td>' . Html::a('Delete', ['detalhesaluguer/delete', 'id_detalhes_aluguer' => $value->id_detalhes_aluguer], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) .'<td>';

        echo '</tr>';
        echo '</br>';

        //var_dump($value->code . ' ' . $value->name . ' ' . $value->population);
        //var_dump($value);
    }
    echo '</table>';
    ?>

</div>
