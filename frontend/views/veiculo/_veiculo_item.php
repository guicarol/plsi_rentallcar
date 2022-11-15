<?php

/** @var common\models\Veiculo $model */

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

?>
<div>

    <?= $model->marca;  ?>
    <?= $model->modelo; ?>
    <?= $model->tipoVeiculo->categoria?>
    <?= Html::a('Ver informação', ['veiculo/view', 'idVeiculo' => $model->idVeiculo], ['class' => 'btn btn-primary']);?>
</div>