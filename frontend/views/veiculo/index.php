<?php

use common\models\Veiculo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */
/** @var common\models\VeiculoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Veiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    /*ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_veiculo_item',
    ])*/
    ?>
    <div class="row">

        <?php
        foreach ($model as $veiculo) { ?>
        <div class="col-4"  style="margin-bottom: 10vh">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $veiculo->marca?> <?= $veiculo->modelo?></h5>
                    <p class="card-text"><?= $veiculo->descricao ?></p>
                    <a >    <?= Html::a('Ver informação', ['veiculo/view', 'id_veiculo' => $veiculo->id_veiculo], ['class' => 'btn btn-primary']);?>
                    </a>
                </div>
            </div>
        </div>
            <?php
        }

        ?>

    </div>
</div>
