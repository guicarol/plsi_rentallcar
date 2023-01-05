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
        if ($model == false) {
            echo '<h2>Não existem veiculos disponiveis com a sua pesquisa!</h2>';
        } else {
            foreach ($model as $veiculo) { ?>

                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <div class="carousel-inner">

                            <?php
                            foreach ($veiculo->imagems as $imagem) { ?>
                                    <?php $i=0;
                                    if($i==0) {?>
                                        <div class="carousel-item active">
                                            <?= Html::img('@web/uploads/' . $imagem->imagem, ['class' => "d-block w-100"]); ?>
                                        </div>
                                    <?php }else {?>
                                        <div class="carousel-item">
                                            <?= Html::img('@web/uploads/' . $imagem->imagem, ['class' => "d-block w-100"]); ?>
                                        </div>   <?php
                                    }
                                ?>
                                <?php
                            }
                            ?>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <h4 class="text-uppercase mb-4"><?= $veiculo->marca ?> <?= $veiculo->modelo ?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span><?= $veiculo->tipoVeiculo->categoria ?></span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span><?= $veiculo->combustivel ?></span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span><?= $veiculo->preco . '€' ?></span>
                            </div>
                        </div>
                        <a>    <?= Html::a('Ver informação', ['veiculo/view', 'id_veiculo' => $veiculo->id_veiculo], ['class' => 'btn btn-primary', 'name' => 'verVeiculo_' . $veiculo->id_veiculo]); ?>
                    </div>
                </div>
                <?php
            }
        } ?>
    </div>
</div>
