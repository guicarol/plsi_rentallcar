<?php

use common\models\Fatura;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Detalhesaluguer $model */

$this->title = $model->id_detalhes_aluguer;
$this->params['breadcrumbs'][] = ['label' => 'Detalhesaluguers', 'url' => ['/detalhesaluguer/index', 'id_user' => Yii::$app->user->getId()]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalhesaluguer-view">

    <h1><?= Html::encode($this->title)?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'data_inicio',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'data_fim',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'label' => 'Carro',
                'value' => function ($model) {
                    return $model->veiculo->marca . " " . $model->veiculo->modelo;
                }
            ],
            [
                'label' => 'Nome',
                'value' => function ($model) {
                    return Yii::$app->user->identity->username;
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
                'label' => 'Extra',
                'value' => function ($model) {
                    $testeArray = '';

                    foreach ($model->extraDetalhesAluguers as $extraDetalhesAl) {

                        if (count($model->extraDetalhesAluguers) > 1) {
                            $testeArray = $testeArray . $extraDetalhesAl->extra->descricao . ', ';
                        } else {
                            $testeArray = $extraDetalhesAl->extra->descricao;
                        }
                    }
                    return $testeArray;
                }
            ],
            [
                'label' => 'Preço total a pagar',
                'value' => function ($model) {

                    $testeArray = 0;

                    foreach ($model->extraDetalhesAluguers as $extraDetalhesAl) {

                        if (count($model->extraDetalhesAluguers) > 1) {
                            $testeArray += $extraDetalhesAl->extra->preco;
                        } else {
                            $testeArray = $extraDetalhesAl->extra->preco;
                        }
                    }
                    return ($model->veiculo->preco + $testeArray) * $model->dias;
                }
            ],
        ],
    ]);

    ?>

    <?php
    if ($fatura != null){?>
       <?= Html::a('Ver fatura', ['fatura/view', 'detalhes_aluguer_fatura_id' => $model->id_detalhes_aluguer], ['class' => 'btn btn-primary']);
    }
    ?>


</div>
