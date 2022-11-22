<?php

use common\models\Detalhesaluguer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

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

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id_detalhes_aluguer), ['view', 'id_detalhes_aluguer' => $model->id_detalhes_aluguer]);
        },
    ]) ?>


</div>
