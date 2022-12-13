<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\TipoVeiculo;
use common\models\Localizacao;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="veiculo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'combustivel')->dropDownList($combustivel); ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(['pronto' => 'Pronto', 'manutencao' => 'Manutencao',], ['prompt' => '']) ?>

    <?= $form->field($model, 'tipo_veiculo_id')->dropDownList(ArrayHelper::map(Tipoveiculo::find()->all(), 'id_tipo_veiculo', 'categoria'), ['prompt' => '']) ?>

    <!-- <?= $form->field($model, 'tipo_veiculo_id')->textInput() ?> -->

    <?= $form->field($model, 'localizacao_id')->dropDownList(ArrayHelper::map(Localizacao::find()->all(), 'id_localizacao', 'localizacao'), ['prompt' => '']) ?>

    <!-- <?= $form->field($model, 'localizacao_id')->textInput() ?> -->

    <?= $form->field($model, 'franquia')->textInput(['type' => 'number']) ?>

    <?= $form->field($modelupload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
