<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Imagem $model */

$this->title = 'Update Imagem: ' . $model->idImagem;
$this->params['breadcrumbs'][] = ['label' => 'Imagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idImagem, 'url' => ['view', 'idImagem' => $model->idImagem]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imagem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
