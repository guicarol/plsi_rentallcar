<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Seguro $model */

$this->title = 'Create Seguro';
$this->params['breadcrumbs'][] = ['label' => 'Seguros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
