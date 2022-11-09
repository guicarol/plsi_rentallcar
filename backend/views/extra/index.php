<?php

use common\models\Extra;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ExtraSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Extras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extra-index">

    <p>
        <?= Html::a('Create Extra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idExtra',
            'descricao',
            'preco',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Extra $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idExtra' => $model->idExtra]);
                 }
            ],
        ],
    ]); ?>


</div>
