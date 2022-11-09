<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Localizacao $model */

$this->title = 'Update Localizacao: ' . $model->idLocalizacao;
$this->params['breadcrumbs'][] = ['label' => 'Localizacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLocalizacao, 'url' => ['view', 'idLocalizacao' => $model->idLocalizacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localizacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
