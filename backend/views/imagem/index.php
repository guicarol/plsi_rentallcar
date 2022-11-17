<?php

use common\models\Imagem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ImagemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Imagem';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagem-index">

    <h1><?= Html::encode($this->title) ?></h1> 

    <p>
        <?= Html::a('Create Imagem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_imagem',
            'imagem',
            [
                'label' => 'Veiculo ',
                'value' => function ($model) {
                    {
                        return "{$model->veiculo->marca} {$model->veiculo->modelo}";

                    }
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Imagem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_imagem' => $model->id_imagem]);
                 }
            ],
        ],
    ]); ?>


</div>
