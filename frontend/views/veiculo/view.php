<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = $model->marca . " " . $model->modelo;;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="veiculo-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'marca',
            'modelo',
            'combustivel',
            'matricula',
            'descricao',
            [
                'label' => 'Tipo Veiculo',
                'attribute' => 'tipoVeiculos',
                'value' => function ($model) {
                    {
                        return $model->tipoVeiculo->categoria;
                    }
                }
            ],
            [
                'label' => 'Preço diário',
                'value' => function ($model) {
                    {
                        return $model->preco .'€';
                    }
                }
            ],
            [
                'label' => 'Franquia',
                'value' => function ($model) {
                    {
                        return $model->franquia . '€';
                    }
                }
            ],
        ],
    ]) ?>

    <?= Html::a('Reservar', ['/detalhesaluguer/create', 'id_veiculo' => $model->id_veiculo], ['class' => 'btn btn-primary']); ?>

    <br>
    <br>
    <div class="owl-carousel testimonial-carousel">
        <?php
        foreach ($model->imagems as $imagem) { ?>
        <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                    <?= Html::img('@web/uploads/' . $imagem->imagem, ['class' => "h-100 w-100"]) ?>
            </div>

            <?php
        }
        ?>
    </div>


