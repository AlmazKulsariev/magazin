<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\TableProducts;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!--link rel="stylesheet" href="css/style.css"/-->
    <!--link rel="stylesheet" href="css/reset.css"/-->
    <!--link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" /-->
    <!--link href="/foot/css/fotorama.css" rel="stylesheet" type="text/css"/-->
    <!--link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"--> <!-- 3 KB -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
    <!--script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script-->
    <!-- 1. Link to jQuery (1.8 or later), -->
    <!-- fotorama.css & fotorama.js. -->
    <!--script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script--> <!-- 16 KB -->
    <script type="text/javascript" src="/foot/js/fotorama.js"></script>
    <!--script type="text/javascript" src="/js/jquery.cookie.min.js"></script-->
    <!--script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script-->
    <!--script type="text/javascript" src="/js/script.js"></script-->
    <title>footstore</title>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>

<header id="header1">

    <div class="main-top-block">
        <div id="top-block">
            <a href="https://www.google.kg/" id="mail"><p>Almazfrom@gmail.com</p></a>

            <ul id="list-auth">
            <li><a href="registration.php">reg</a></li>
             <li><a href="index.php?auth">auth</a><span>|</span></li>
             <li><img src="/foot/images/icon-auth.png"/></li>
            </ul>
        </div>
    </div>

    <div class="top-middle-block">
        <div id="profile-block">
            <div id="corner2"><img src="/foot/images/bulleticon.png"/></div>
            <div id="block-user">
                <ul>
                    <li><img src="/foot/images/user_info.png"/><a href="profile.php">dsadas</a></li>
                    <li><img src="/foot/images/logout.png"/><a href="#" id="logout">sadasd</a></li>
                </ul>
            </div>
        </div>
        <div id="top-middle-blockin">

            <a href="<?= \yii\helpers\Url::toRoute(['site/index'])?>"><img src="/foot/images/logo.png" alt="logo" id="logo"/></a>
            <!-- <p>���������� ���������� �� ����� ������ �����!</p>-->
            <div id="block-for-join">
                <div id="search-block">
                    <form action="" name="search">
                        <input type="text" name="search" placeholder="search"/>
                        <button type="submit" name="search_button" value=" " id="search-button" ></button>
                    </form>
                </div>
                <div id="cart123">
                    <ul><?php

                        $session=Yii::$app->session;
                        $session->open();
                       /* $infocart=$session['cart'];
                        $totalAmount=$total=0;
                        foreach ($infocart as $key=>$value ){
                            $totalAmount+=$value['qty'];
                            $total+=$value['price']*$value['qty'];
                        }*/
                        ?>
                        <li><a href="#" onclick="return getCart()">cart</a><span id="qtycart"><?=$session['cart.qty']?></span></li>
                        <li><p id="sumcart"><?=$session['cart.sum']?></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php print_r($session['cart'])?>
    <div id="main-menu">
        <div id="blockin-main-menu">
            <ul>
                <li><a href="index.php">Main</a></li>
                <li><a href="">Others</a></li>
                <li><a href="">Others</a></li>
                <li><a href="">Others</a></li>
                <li><a href="">Others</a></li>
                <li><a href="">Others</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Others</a></li>
            </ul>
        </div>


    </div>

</header>

<div class="wrapper">
    <div class="wrapper2">
        <div class="inwrapper">
            <div class="clear"></div>

            <!-- 2. Add images to <div class="fotorama"></div>. -->
            <!--
            <div class="fotorama">
              <img src="http://s.fotorama.io/1.jpg">
              <img src="http://s.fotorama.io/2.jpg">
            </div>
            -->
            <div class="fotorama" data-autoplay="true">
                <img src="/foot/images/slide01.jpg" alt="slide" id="1"/>
                <img src="/foot/images/slide02.jpg" alt="slide" id="2" />
                <img src="/foot/images/slide03.jpg" alt="slide" id="3"/>
                <img src="/foot/images/slide04.jpg" alt="slide" id="4" />
                <img src="/foot/images/slide05.jpg" alt="slide" id="5" />
            </div>
            <nav id="nav-sort">
                <ul id="list-sort">
                    <li><a href="index.php?sort=popular">Популярные</a></li>
                    <li><a href="<?=\yii\helpers\Url::to(['site/index','filter'=>'news'])?>">Новые</a></li>
                    <li><a href="index.php?sort=sale">Распрадажа</a></li>
                    <li><a id="price">По цене:</a>
                        <ul id="price-sort">

                            <li><a href="<?=\yii\helpers\Url::to(['site/index','filter'=>'cheep'])?>">от дешевых</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['site/index','filter'=>'expen'])?>">От дорогих</a></li>
                        </ul>
                    </li>
                </ul>
                <script>
                    $("#price").click(function(){
                        $("#price-sort").slideToggle(400);
                    });
                </script>

                <div id="call-now">
                    <h2>Закажи бесплатный звонок</h2>
                    <img src="/foot/images/phone.png"/>

                </div>
            </nav>

            <div class="clear"></div>

            <div id="block-main">
                <div id="right-block">
                    <div class="right-menu">
                        <ul class="main-manu-list">
                            <li><a id="index1"><img src="/foot/images/icon2.png"/><strong>Клубная форма</strong><span>&#9660;</span></a>
                                <ul class="inmain-manu-list">
                                    <?php $clubs = \app\models\Category::find()->where(['type'=>'club_kit'])->orderBy(['brand'=>SORT_ASC])->all();?>
                                    <li><a href="<?=\yii\helpers\Url::to(['site/index','filter'=>'club_kit'])?>"> &raquo;Показать все</a></li>
                                    <?php foreach ($clubs as $club){ ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['site/index','search'=>$club->brand,'type'=>$club->type])?>"><?=$club->brand?></a></li>
                                    <?php } ?>

                                </ul>
                            </li>


                            <li><a id="index2"><img src="/foot/images/icon3.png"/><strong>Сборная форма</strong><span>&#9660;</span></a>
                                <ul class="inmain-manu-list">
                                    <li><a href="view_cat.php?type=country_kit"> &raquo;Показать все</a></li>
                                    <?php $country = \app\models\Category::find()->where(['type'=>'country_kit'])->orderBy(['brand'=>SORT_ASC])->all();?>
                                    <?php foreach ($country as $countr){ ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['site/index','search'=>$countr->brand,'type'=>$countr->type])?>"><?=$countr->brand?></a></li>
                                    <?php } ?>

                                </ul>
                            </li>
                            <!-- <li class="right-menu-tittle"><a href=""><img src="images/icon2.png"/><strong>������� ����������</strong><span>&#9660;</span></a></li>-->
                            <li><a id="index3"><img src="/foot/images/icon5.png"/><strong>Клубная одежда</strong><span>&#9660;</span></a>
                                <ul class="inmain-manu-list">
                                    <li><a href="view_cat.php?type=club_clothes"> &raquo;Показать все</a></li>
                                    <?php $clothes = \app\models\Category::find()->where(['type'=>'club_clothes'])->orderBy(['brand'=>SORT_ASC])->all();?>
                                    <?php foreach ($clothes as $clothe){ ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['site/index','search'=>$clothe->brand,'type'=>$clothe->type])?>"><?=$clothe->brand?></a></li>
                                    <?php } ?>

                                </ul>
                            </li>
                            <li><a href="view_cat.php?type="id="index4"><img src="/foot/images/icon1.png"/><strong>Подарки / Сувениры</strong></a>
                            </li>
                            <li><a id="index5"><img src="/foot/images/icon2.png"/><strong>Женская форма</strong><span>&#9660;</span></a>
                                <ul class="inmain-manu-list">
                                    <li><a href="view_cat.php?type=women_kit"> &raquo;Показать все</a></li>
                                    <?php $women = \app\models\Category::find()->where(['type'=>'women_kit'])->orderBy(['brand'=>SORT_ASC])->all();?>
                                    <?php foreach ($women as $wom){ ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['site/index','search'=>$wom->brand,'type'=>$wom->type])?>"><?=$wom->brand?></a></li>
                                    <?php } ?>

                                </ul>
                            </li>
                            <li><a id="index6"><img src="/foot/images/icon3.png"/><strong>Детская форма</strong><span>&#9660;</span></a>
                                <ul class="inmain-manu-list">
                                    <li><a href="view_cat.php?type=kid_kit"> &raquo;Показать все</a></li>
                                    <?php $kids = \app\models\Category::find()->where(['type'=>'kid_kit'])->orderBy(['brand'=>SORT_ASC])->all();?>
                                    <?php foreach ($kids as $kid){ ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['site/index','search'=>$kid->brand,'type'=>$kid->type])?>"><?=$kid->brand?></a></li>
                                    <?php } ?>

                                </ul>
                            </li>
                            <li><a id="index7"><img src="/foot/images/icon4.png"/><strong>Тренировочная</strong><span>&#9660;</span></a>
                                <ul class="inmain-manu-list">
                                    <li><a href="view_cat.php?type=training_kit"> &raquo;Показать все</a></li>
                                    <?php $training = \app\models\Category::find()->where(['type'=>'training_kit'])->orderBy(['brand'=>SORT_ASC])->all();?>
                                    <?php foreach ($training as $train){ ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['site/index','search'=>$train->brand,'type'=>$train->type])?>"><?=$train->brand?></a></li>
                                    <?php } ?>

                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>


                <div id="bar-shadow">
                    <div id="block-parameter">
                        <p>Поиск по параметрам</p>
                    </div>
                    <p align="center" class="search-check">Стоимость</p>
                    <form action="search_filter.php" method="GET">
                        <div id="block-search-parameter">
                            <ul>
                                <li><p>от</p></li>
                                <li><input type="text" name="start_price" value="100" id="start-price"/></li>
                                <li><p>до</p></li>
                                <li><input type="text" name="end_price" value="3000" id="end-price"/></li>
                                <li><p>сом</p></li>
                            </ul>

                            <div id="block-trackbar">

                            </div>
                        </div>

                        <p align="center" class="search-check"></p>

                        <!--ul id="checkbox-list">

      <li><input '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkteam'.$row["id"].'"/><label for="checkteam'.$row["id"].'">'.$row["brand"].'</label></li>
                        </ul-->
                        <center><input type="submit" name="checksubmit" value="ssss" id="checksubmit"/></center>
                    </form>
                </div>
                <?= $content ?>



            </div>

        </div>
    </div>

</div>


    <footer id="footer1">
        <footer class="infooter">
            <img src="/foot/images/logo.png"/>

            <p>&copy;<?php echo date(' Y')?> Footstore | </p>
        </footer>
    </footer>


</div>


<?php
\yii\bootstrap\Modal::begin([
    'header'=>'<h2>Корзина</h2>',
    'id'=>'cart',
    'size'=>'modal-lg',
    'footer'=>'<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить</button> 
    <button type="button" class="btn btn-primary">Оформить заказ</button>
    <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
]);
\yii\bootstrap\Modal::end();
?>


<?php $this->endBody() ?>

<script>

    function showCart(cart) {
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }
    
    function addCart(id) {
        $.get('<?= Yii::$app->homeUrl.'cart/add' ?>',{'id':id},
        function (data) {
           val=data.split("-");
            $("#qtycart").text(val[0]);
            $("#sumcart").text(val[1]);

        });
    }



    function clearCart() {
        $.ajax({
            url:'/cart/clear',
            type:'GET',
            success:function (res) {
                if(!res) alert('Ошибка !!!');
                showCart(res);
            },
            error:function () {
                alert('Error!');
            }
        });
    }


    $('.addd').on('click',function(event) {
        event. preventDefault();
        var id = $(this).data('id'),
            qty=$('#qty').val();
        $.ajax({
            url:'/cart/add',
            data:{id: id, qty: qty},
            type:'GET',
            success:function (res) {
                if(!res) alert('Ошибка !!!');
                showCart(res);

              //  $("#qtycart").val(<?php$session['cart.qty']?>);

            },
            error:function () {
                alert('Error!');
            }
        });
    });

    $('#cart .modal-body').on('click', '.del-item',function () {
        var id=$(this).data('id');
        $.ajax({
            url:'/cart/del-item',
            data:{id: id},
            type:'GET',
            success:function (res) {
                if(!res) alert('Ошибка !!!');
                showCart(res);
            },
            error:function () {
                alert('Error!');
            }
        });
    });
    
    function getCart() {
        $.ajax({
            url:'/cart/show',
            type:'GET',
            success:function (res) {
                if(!res) alert('Ошибка !!!');
                showCart(res);
            },
            error:function () {
                alert('Error!');
            }
        });
        return false;
        
    }



</script>

</html>
<?php $this->endPage() ?>
