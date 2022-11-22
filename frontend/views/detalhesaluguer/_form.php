<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Detalhesaluguer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalhesaluguer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_fim')->textInput() ?>

    <?= $form->field($model, 'veiculo_id')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'seguro_id')->textInput() ?>

    <?= $form->field($model, 'localizacao_levantamento_id')->textInput() ?>

    <?= $form->field($model, 'localizacao_devolucao_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
