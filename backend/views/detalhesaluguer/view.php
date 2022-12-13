<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Detalhesaluguer $model */

$this->title = $model->id_detalhes_aluguer;
$this->params['breadcrumbs'][] = ['label' => 'Detalhesaluguers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalhesaluguer-view">

    <p>
        <?= Html::a('Update', ['update', 'id_detalhes_aluguer' => $model->id_detalhes_aluguer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_detalhes_aluguer' => $model->id_detalhes_aluguer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Emitir fatura', ['fatura/create', 'id_detalhes_aluguer' => $model->id_detalhes_aluguer], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'data_inicio',
            'data_fim',
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
            ], [
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
                    foreach ($model->extraDetalhesAluguers as $extraDetalhesAluguer)
                        if ($extraDetalhesAluguer->extra != null) {

                            $teste = array($extraDetalhesAluguer->extra['descricao']);

                            $string = join(",", $teste);
                            return $string;
                        }
                    return 'Nenhum extra';
                }
            ],
        ],
    ]) ?>

</div>