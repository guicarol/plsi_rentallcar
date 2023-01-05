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
    <p>       
        <?= Html::a('Ver imagens', ['imagem/index', 'id_veiculo' => $model->id_veiculo], ['class' => 'btn btn-primary']) ?>

        <?php if(array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))[0] == "gestor") {?>
        <!-- CENAS DO ADMIN -->
    <li class="nav-item d-none d-sm-inline-block">
        <?= Html::a('Alterar Estado', ['veiculo/updateestado','id_veiculo' => $model->id_veiculo], ['class' => 'btn btn-success'])?>
    </li>
    <?php } ?>

       
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
            [
                'label' => 'Tipo Veiculo',
                'attribute' => 'tipoVeiculos',
                'format' => 'raw',
                'value' => function ($model) {
                    {
                        return $model->tipoVeiculo->categoria;
                    }
                }
            ],            'estado',
            'franquia',
        ],
    ]) ?>


</div>
