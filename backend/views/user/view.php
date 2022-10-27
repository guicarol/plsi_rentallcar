<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        'model' => $model->profile,
        'attributes' => [
            'nome',
            'apelido',
            'telemovel',
            'nif',
            'nrCartaConducao',
        ],
    ])?>

    <?php
        echo '<p><strong>' . 'ID: ' . '</strong>' . $model->id .'</p>';
        echo '<p><strong>' . 'Nome: ' . '</strong>' . $model->profile->nome .'</p>';
        echo '<p><strong>' . 'Apelido: ' . '</strong>' . $model->profile->apelido .'</p>';
        echo '<p><strong>' . 'Username: ' . '</strong>' . $model->username .'</p>';
        echo '<p><strong>' . 'Email: ' . '</strong>' . $model->email .'</p>';
        echo '<p><strong>' . 'Telemóvel: ' . '</strong>' . $model->profile->telemovel .'</p>';
        echo '<p><strong>' . 'Nif: ' . '</strong>' . $model->profile->nif .'</p>';
        echo '<p><strong>' . 'Nr Carta Condução: ' . '</strong>' . $model->profile->nrCartaConducao .'</p>';
    ?>

</div>
