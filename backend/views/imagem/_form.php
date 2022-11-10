<?php

use common\models\Veiculo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Imagem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="imagem-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>


    <?= $form->field($model, 'idVeiculo')->dropDownList(
        ArrayHelper::map(Veiculo::find()->all(),'idVeiculo','modelo','marca'),
        ['prompt'=>'Selecione']
    )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
