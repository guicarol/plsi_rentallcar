<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = 'Update Profile: ' . $model->idProfile;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProfile, 'url' => ['view', 'idProfile' => $model->idProfile]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
