<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Assistencia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="assistencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dataPedido')->textInput() ?>

    <?= $form->field($model, 'mensagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localizacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'veiculo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
