<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Analise $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="analise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'classificacao')->textInput(['type'=>'number'])?>

    <?= $form->field($model, 'classificacao')->widget(\alfa6661\widgets\Raty::className(), [
        'options' => [
            // the HTML attributes for the widget container
        ],
        'pluginOptions' => [
            // the options for the underlying jQuery Raty plugin
            // see : https://github.com/wbotelhos/raty#options
        ]
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
