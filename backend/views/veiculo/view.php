<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = $model->marca . " " . $model->modelo;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="veiculo-view">

    <p>
        <?= Html::a('Update', ['update', 'id_veiculo' => $model->id_veiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_veiculo' => $model->id_veiculo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <p>        <?= Html::a('Ver imagens', ['imagem/index', 'id_veiculo' => $model->id_veiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Alterar Estado', ['veiculo/updateestado','id_veiculo' => $model->id_veiculo], ['class' => 'btn btn-success']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_veiculo',
            'marca',
            'modelo',
            'combustivel',
            'preco',
            'matricula',
            'descricao',
            'tipo_veiculo_id',
            'estado',
        ],
    ]) ?>

    <!-- <table>
        <?php
        echo '<tr><td><strong> ID </strong></td><td>' . $model->id_veiculo . '</td></tr>';
        echo '<tr><td><strong> Marca </strong></td><td>' . $model->marca . '</td></tr>';
        echo '<tr><td><strong> Modelo </strong></td><td>' . $model->modelo . '</td></tr>';
        echo '<tr><td><strong> Combustivel </strong></td><td>' . $model->combustivel . '</td></tr>';
        echo '<tr><td><strong> Preço </strong></td><td>' . $model->preco . '</td></tr>';
        echo '<tr><td><strong> Matricula </strong></td><td>' . $model->matricula . '</td></tr>';
        echo '<tr><td><strong> Descricao </strong></td><td>' . $model->descricao . '</td></tr>';
        //echo '<tr><td><strong> Tipo de veiculo </strong></td><td>' . $model->id_tipo_veiculo0->categoria . '</td></tr>';
        echo '<tr><td><strong> Tipo de veiculo </strong></td><td>' . $model->tipoVeiculo->categoria . '</td></tr>';
        echo '</table>';
        ?>-->

</div>
