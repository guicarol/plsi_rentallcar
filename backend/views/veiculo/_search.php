<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\VeiculoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="veiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_veiculo') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'combustivel') ?>

    <?= $form->field($model, 'preco') ?>

    <?php // echo $form->field($model, 'matricula') ?>

    <?php // echo $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'id_tipo_veiculo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
