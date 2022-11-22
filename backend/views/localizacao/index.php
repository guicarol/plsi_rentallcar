<?php

use common\models\Localizacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\LocalizacaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Localizacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localizacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Localizacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_localizacao',
            'localizacao',
            'morada',
            'cod_postal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Localizacao $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_localizacao' => $model->id_localizacao]);
                 }
            ],
        ],
    ]); ?>


</div>
