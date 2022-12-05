<?php
$this->title = 'Página inicial';
?>

<div class="container-fluid">
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif;
    $total = \common\models\Detalhesaluguer::find()->where([])->count();
    $total1 = \common\models\Veiculo::find()->where([])->count();
    $total2 = \common\models\Profile::find()->where([])->count(); ?>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $total,
                'text' => 'Novos pedidos',
                'icon' => 'fas fa-shopping-cart',
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?php $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                'title' => $total1,
                'text' => 'Veiculos totais',
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success'
            ]) ?>

            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $total2,
                'text' => 'Utilizadores registados',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
            ]) ?>
        </div>
    </div>
</div>