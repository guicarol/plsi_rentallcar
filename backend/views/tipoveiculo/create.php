<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TipoVeiculo $model */

$this->title = 'Create Tipo Veiculo';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-veiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
