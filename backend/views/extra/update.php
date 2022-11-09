<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Extra $model */

$this->title = 'Update Extra: ' . $model->idExtra;
$this->params['breadcrumbs'][] = ['label' => 'Extras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idExtra, 'url' => ['view', 'idExtra' => $model->idExtra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="extra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
