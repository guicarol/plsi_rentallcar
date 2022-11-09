<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Extra $model */

$this->title = 'Create Extra';
$this->params['breadcrumbs'][] = ['label' => 'Extras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
