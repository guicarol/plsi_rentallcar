<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var common\models\User $user */


$this->title = $model->id_profile;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_profile' => $model->id_profile], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_profile' => $model->id_profile], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=DetailView::widget([
        'model' => $model->id_profile0,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
            'created_at',
            //'updated_at',
            //'verification_token',
        ],
    ]) ,

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_profile',
            'nome',
            'apelido',
            'telemovel',
            'nif',
            'nr_carta_conducao',
        ],
    ]) ?>





</div>
