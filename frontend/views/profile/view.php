<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var common\models\User $user */


$this->title = $model->idProfile;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idProfile' => $model->idProfile], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idProfile' => $model->idProfile], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=DetailView::widget([
        'model' => $model->idProfile0,
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
            'idProfile',
            'nome',
            'apelido',
            'telemovel',
            'nif',
            'nrCartaConducao',
        ],
    ]) ?>





</div>
