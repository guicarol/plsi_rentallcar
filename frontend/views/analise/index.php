<?php

use common\models\Analise;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AnaliseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Analises';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="analise-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Analise', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_analise',
            'comentario',
            'classificacao',
            'data_analise',
            'profile_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Analise $model, $key, $index, $column) {

                    return Url::toRoute([$action, 'id_analise' => $model->id_analise]);
                 }
            ],
        ],
    ]); ?>


</div>
