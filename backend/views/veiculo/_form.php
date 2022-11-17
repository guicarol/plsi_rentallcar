<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\TipoVeiculo;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="veiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'combustivel')->dropDownList($combustivel); ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoVeiculo')->dropDownList(
            ArrayHelper::map(Tipoveiculo::find()->all(),'tipoVeiculo','categoria'),
        ['prompt'=>'Selecione']
    )?>

    <!-- <?= $form->field($model, 'id_tipo_veiculo')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
