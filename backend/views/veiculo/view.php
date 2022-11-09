<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = $model->idVeiculo;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="veiculo-view">

    <p>
        <?= Html::a('Update', ['update', 'idVeiculo' => $model->idVeiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idVeiculo' => $model->idVeiculo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idVeiculo',
            'marca',
            'modelo',
            'combustivel',
            'preco',
            'matricula',
            'descricao',
            'idTipoVeiculo',
        ],
    ]) ?>

    <table>
        <?php
        echo '<tr><td><strong> ID </strong></td><td>' . $model->idVeiculo . '</td></tr>';
        echo '<tr><td><strong> Marca </strong></td><td>' . $model->marca . '</td></tr>';
        echo '<tr><td><strong> Modelo </strong></td><td>' . $model->modelo . '</td></tr>';
        echo '<tr><td><strong> Combustivel </strong></td><td>' . $model->combustivel . '</td></tr>';
        echo '<tr><td><strong> Preço </strong></td><td>' . $model->preco . '</td></tr>';
        echo '<tr><td><strong> Matricula </strong></td><td>' . $model->matricula . '</td></tr>';
        echo '<tr><td><strong> Descricao </strong></td><td>' . $model->descricao . '</td></tr>';
        echo '<tr><td><strong> Tipo de veiculo </strong></td><td>' . $model->idTipoVeiculo0->categoria . '</td></tr>';


        echo '</table>';
        ?>

</div>
