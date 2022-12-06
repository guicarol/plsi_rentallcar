<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;;
use common\models\Localizacao;
use common\models\TipoVeiculo;

/** @var common\models\Veiculo $model */


$this->title = 'RentAllCar';
?>
<div class="site-index">

        <!-- Search Start -->
        <div class="container-fluid bg-white pt-3 px-lg-5">
            <div class="row mx-n2">
                <form class="row">
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <h1>RentAllCar</h1>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select class="custom-select px-4 mb-3" style="height: 50px;">
                        <option selected="selected">Selecione</option>
                        <?php
                        // A sample product array
                        $products = ArrayHelper::map(Localizacao::find()->all(), 'id_localizacao', 'morada');

                        // Iterating through the product array
                        foreach ($products as $item) {
                            echo "<option value='strtolower($item)'>$item</option>";
                        }
                        ?>
                    </select>
                    <!-- <?= Html::dropDownList('null', 'null', ArrayHelper::map(Localizacao::find()->all(), 'id_localizacao', 'morada'),
                        ['prompt' => 'Selecione']) ?> -->
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <div class="date mb-3" id="date" data-target-input="nearest">
                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Data de Recolha"
                               data-target="#date" data-toggle="datetimepicker"/>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <div class="date" id="time" data-target-input="nearest">
                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Data de Entrega"
                               data-target="#time" data-toggle="datetimepicker"/>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select class="custom-select px-4 mb-3" style="height: 50px;">
                        <option selected="selected">Selecione</option>
                        <?php
                        // A sample product array
                        $products = ArrayHelper::map(Tipoveiculo::find()->all(), 'id_tipo_veiculo', 'categoria');

                        // Iterating through the product array
                        foreach ($products as $item) {
                            echo "<option value='strtolower($item)'>$item</option>";
                        }
                        //}
                        ?>
                    </select>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Procurar</button>
                </div>
                </form>
            </div>
        </div>
        <!-- Search End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">RentAllCar</h4>
                            <h1 class="display-1 text-white mb-md-4">Serviço de excelência</h1>
                            <?php echo Html::a('Faça a sua reserva agora!', ['veiculo/index'], ['class' => 'btn btn-primary py-md-3 px-md-5 mt-2']); ?>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">RentAllCar</h4>
                            <h1 class="display-1 text-white mb-md-4">Mais de 100 marcas e modelos disponiveis</h1>
                            <?php echo Html::a('Faça a sua reserva agora!', ['veiculo/index'], ['class' => 'btn btn-primary py-md-3 px-md-5 mt-2']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">01</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Welcome To <span
                        class="text-primary">RentAllCar</span></h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <img class="w-75 mb-4" src="img/about.png" alt="">
                    <p>Justo et eos et ut takimata sed sadipscing dolore lorem, et elitr labore labore voluptua no rebum
                        sed, stet voluptua amet sed elitr ea dolor dolores no clita. Dolores diam magna clita ea eos
                        amet, amet rebum voluptua vero vero sed clita accusam takimata. Nonumy labore ipsum sea voluptua
                        sea eos sit justo, no ipsum sanctus sanctus no et no ipsum amet, tempor labore est labore no.
                        Eos diam eirmod lorem ut eirmod, ipsum diam sadipscing stet dolores elitr elitr eirmod dolore.
                        Magna elitr accusam takimata labore, et at erat eirmod consetetur tempor eirmod invidunt est,
                        ipsum nonumy at et.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                             style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-headset text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">24/7 Car Rental Support</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-secondary p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                             style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-car text-secondary"></i>
                        </div>
                        <h4 class="text-light text-uppercase m-0">Car Reservation Anytime</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                             style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Lots Of Pickup Locations</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">02</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Our Services</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4"
                                 style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-money-check-alt text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">01</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Financing</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                            elitr dolor amet sit sea sed</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item active d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4"
                                 style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-taxi text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">02</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Rental</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                            elitr dolor amet sit sea sed</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4"
                                 style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-car text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">03</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Inspection</h4>
                        <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo
                            elitr dolor amet sit sea sed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">03</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Encontre o seu veiculo</h1>
            <div class="row">
                <?php
                $model = \common\models\Veiculo::find()->all();
                foreach ($model as $value) { ?>
                    <div class="col-4" style="margin-bottom: 10vh">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/car-rent-1.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value->marca ?> <?= $value->modelo ?></h5>
                                <p class="card-text"><?= $value->descricao ?></p>
                                <a>    <?= Html::a('Ver informação', ['veiculo/view', 'id_veiculo' => $value->id_veiculo], ['class' => 'btn btn-primary']); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Rent A Car End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-1 text-primary text-center">04</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Meet Our Team</h1>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Full Name</h4>
                        <p class="m-0">Designation</p>
                        <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Full Name</h4>
                        <p class="m-0">Designation</p>
                        <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Full Name</h4>
                        <p class="m-0">Designation</p>
                        <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Full Name</h4>
                        <p class="m-0">Designation</p>
                        <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-1 text-primary text-center">05</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Our Client's Say</h1>
            <div class="owl-carousel testimonial-carousel">
                <?php
                $model = \common\models\Analise::find()->all();
                foreach ($model as $value) { ?>

                <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <img class="img-fluid ml-n4" src="img/testimonial-2.jpg" alt="">
                        <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                    </div>
                    <h4 class="text-uppercase mb-2"><?= $value->profile->nome  ?></h4>
                    <i class="mb-2"><?= $value->classificacao  ?></i>
                    <p class="m-0"><?= $value->comentario  ?></p>
                </div>
                    <?php
                }
                ?>

                <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <img class="img-fluid ml-n4" src="img/testimonial-3.jpg" alt="">
                        <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                    </div>
                    <h4 class="text-uppercase mb-2">Client Name</h4>
                    <i class="mb-2">Profession</i>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr
                        dolor amet sit sea sed</p>
                </div>
                <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <img class="img-fluid ml-n4" src="img/testimonial-4.jpg" alt="">
                        <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                    </div>
                    <h4 class="text-uppercase mb-2">Client Name</h4>
                    <i class="mb-2">Profession</i>
                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr
                        dolor amet sit sea sed</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">06</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your Name"
                                           required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your Email"
                                           required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" placeholder="Message"
                                          required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4"
                         style="height: 435px;">
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Escritório principal</h5>
                                <p>Avenida Marquês de Pombal, Leiria, Portugal</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Branch Office</h5>
                                <p>123 Street, New York, USA</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Atendimento ao cliente</h5>
                                <p>rentallcar@gmail.com </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

</div>
