<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Imagem $model */

$this->title = $model->id_imagem;
$this->params['breadcrumbs'][] = ['label' => 'Imagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="imagem-view">


    <p>
        <?= Html::a('Update', ['update', 'id_imagem' => $model->id_imagem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_imagem' => $model->id_imagem], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_imagem',

            [
                'attribute' => 'imagem',
                'value' => Html::img( Yii::getAlias('@frontend') . '/web/uploads/' . $model->imagem, ['class' => "img-fluid mb-4"]) ,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            'veiculo_id',
        ],
    ]) ?>

</div>
