<?php

use common\models\Localizacao;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Detalhesaluguer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalhesaluguer-form">

    <?php $form = ActiveForm::begin();
    $ola=\common\models\Veiculo::findOne($model->veiculo_id)

    ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_fim')->textInput() ?>

    <?= $form->field($model, 'veiculo_id')->textInput(['value'=> $model->veiculo_id]); ?>

    <?= $form->field($model, 'id_user' )->textInput(['value' => Yii::$app->user->identity->getId()]); ?>

    <?= $form->field($model, 'seguro_id')->dropDownList(ArrayHelper::map(\common\models\Seguro::find()->all(),'id_seguro','cobertura'), ['prompt'=>''])?>

    <?= $form->field($model, 'localizacao_levantamento_id')->dropDownList(ArrayHelper::map(Localizacao::find()->all(),'id_localizacao','localizacao'), ['prompt'=>''])?>

    <?= $form->field($model, 'localizacao_devolucao_id')->dropDownList(ArrayHelper::map(Localizacao::find()->all(),'id_localizacao','localizacao'), ['prompt'=>''])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
