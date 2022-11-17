<?php

use yii\helpers\Html;

?>
<!-- Navbar
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        -->
      <!--  <?php if(array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))[0] == "admin") {?>

            <li class="nav-item d-none d-sm-inline-block">
                <?= Html::a('Users', ['/user/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
            </li>
        <?php } ?>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Localizações', ['/localizacao/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Extras', ['/extra/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Veiculos', ['/veiculo/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('TiposVeiculos', ['/tipo-veiculo/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Imagens', ['/imagem/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Seguros', ['/seguro/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Pedidos de Asssitência', ['/assistencia/index'], ['data-method' => 'post', 'class' => 'nav-link'])?>
        </li>
    </ul>


    <ul class="navbar-nav ml-auto">

        <li class="nav-item">

            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>-->

        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>

   <!-- </ul>
</nav>
navbar -->