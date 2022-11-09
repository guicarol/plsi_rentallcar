<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Imagem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="imagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idVeiculo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
