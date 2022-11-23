<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = $model->id_veiculo;
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
            'preco',
            'matricula',
            'descricao',
            [
                'label' => 'Tipo Veiculo',
                'attribute' => 'tipoVeiculos',
                'format' => 'raw',
                'value' => function ($model) {
                    {
                        return $model->tipoVeiculo->categoria;
                    }
                }
            ],
        ],
    ]) ?>

    <?= Html::a('Reservar', ['/detalhesaluguer/create','id_veiculo'=>$model->id_veiculo], ['class' => 'btn btn-primary']); ?>
</div>
