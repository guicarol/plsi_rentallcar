<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Veiculo $model */

$this->title = 'Create Veiculo';
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veiculo-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelupload'=>$modelupload,
        'combustivel' => array('diesel' => 'Diesel', 'gasolina' => 'Gasolina', 'hibrido' => 'Hibrido'),
    ]) ?>

</div>
