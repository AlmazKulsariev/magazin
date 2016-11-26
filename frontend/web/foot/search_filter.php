<?php 
    require_once('include/db_connect.php');
    require_once('function/functions.php');
    session_start();
    require_once('include/auth_cookie.php');
    $cat=clear_string($_GET["cat"]);
    $type=clear_string($_GET["type"]);
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>auto</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/reset.css" type="text/css"/>
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/script.js"></script>
   <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
   <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <!-- 1. Link to jQuery (1.8 or later), -->
    <!-- fotorama.css & fotorama.js. -->
    <link href="css/fotorama.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/fotorama.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>


</head>
<body>
<header>
    <div class="main-top-block">
    <div id="top-block">
        <a href="https://www.google.kz/" id="mail"><p>Almazfrom@gmail.com</p></a>
        
       
        
        
        
<?php
	if($_SESSION['auth']=='yes_auth')
    {
        echo'<p class="hello-admin" align="right">Привет, '.$_SESSION['name'].'<img src="images/profile-icon.png"id="profile-icon"></p>';
    }
    else
    {
        echo'<ul id="list-auth">
            
            <li><a href="registration.php">Зарегистрироваться</a></li>
             <li><a href="index.php?auth">Войти</a><span>|</span></li>
             <li><img src="images/icon-auth.png"/></li>
        </ul>';
    }
?>    
    </div>
    </div>
    
    <div class="top-middle-block">  
        <div id="top-middle-blockin">
                    
            <img src="images/logo.png" alt="logo" id="logo"/>
           <!-- <p>Футбольная экипировка по самым низким ценам!</p>-->
           <div id="block-for-join"> 
           <div id="search-block">
               <form action="" name="search">
                <input type="text" name="search" placeholder="Поиск по сайту"/>
                <button type="submit" name="search_button" value=" " id="search-button" ></button>
               </form>
            </div>
            
            <div id="cart">
               <ul>
                <li><a href="">Корзина</a><span>5</span></li>
                <li><p>4500c</p></li>
               </ul>
            </div>
            </div>
       </div> 
    </div>
<?php
require_once('include/menu.php');	
?>      
      
</header>

<div class="clear"></div>
<div class="wrapper">
<div class="wrapper2">
<div class="inwrapper">


<!-- 2. Add images to <div class="fotorama"></div>. -->
<!--
<div class="fotorama">
  <img src="http://s.fotorama.io/1.jpg">
  <img src="http://s.fotorama.io/2.jpg">
</div>
-->
<div class="fotorama" data-autoplay="true">
    <img src="images/slide01.jpg" alt="slide" id="1"/>
    <img src="images/slide02.jpg" alt="slide" id="2" />
    <img src="images/slide03.jpg" alt="slide" id="3"/>
    <img src="images/slide04.jpg" alt="slide" id="4" />
    <img src="images/slide05.jpg" alt="slide" id="5" />
</div>
<nav id="nav-sort">
    <ul id="list-sort">
        <li><a href="index.php?sort=popular">Популярные</a></li>
        <li><a href="index.php?sort=news">Новинки</a></li>
        <li><a href="index.php?sort=sale">Распоража</a></li>
        <li><a id="price">По цене:</a>
            <ul id="price-sort">
                <li><a href="index.php?sort=price-asc">От дешёвых</a></li>
                <li><a href="index.php?sort=price-desk">От дорогих</a></li>
            </ul>
        </li>
    </ul>
    
    <div id="call-now">
        <h2>Закажи бесплатный звонок</h2>
        <img src="images/phone.png"/>
   
    </div>    
</nav>

<div class="clear"></div>

<div id="block-main">
<?php
require_once('include/right_menu.php');	
?>
        
<div class="main-content">
<ul class="block-tovar-grid">
<?php
	
if($_GET["brand"])
{
    $check_team=implode(',',$_GET["brand"]);/*здесьобработываем массив превращаем ее
                                            в сторку и разделяем полученные данные запятым*/
}

$start_price=(int)$_GET["start_price"];
$end_price=(int)$_GET["end_price"];

if(!empty($check_team)||!empty($end_price))   
{
    if(!empty($check_team)) $query_team="brand_id IN($check_team) AND "; 
    if(!empty($end_price))  $query_price="price BETWEEN $start_price AND $end_price";

}   

    
$result=mysql_query("SELECT * FROM table_products WHERE $query_team $query_price ORDER BY products_id DESC",$link);
if(mysql_num_rows($result)>0){
    $row=mysql_fetch_array($result);
    do{
        
         if  ($row["image"] != "" && file_exists("./upload-images/".$row["image"])) {
            $img_path = './upload-images/'.$row["image"];
            $max_width = 210; 
            $max_height = 210; 
            list($width, $height) = getimagesize($img_path); 
            $ratioh = $max_height/$height; 
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh, $ratiow); 
            $width = intval($ratio*$width); 
            $height = intval($ratio*$height);    
        }else {
            $img_path = "/images/no-image.jpg";
            $width = 200;
            $height = 200;
        }
        
        
        echo'
          <li>
          <div class="img-grid">
          <ul class="rewies-and-comment">
            <li><img src="/images/eye-icon.png"/><span>0</span></li>
            <li><img src="/images/comment.png"/><span>1</span></li>
          </ul>
          <div id="block-for-img">
            <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
          </div>  
            <div class="hover-cart-grid">
              <a href=""><span>Добавить в корзину</span></a>        
          </div>
          <p class="price-grid"><a href=""><strong>'.$row[price].'</strong> сом</a></p>
          <p class="tittle-grid">'.$row[tittle].'</p>
          </div>
          </li>  
        
        
        ';
        
    }while( $row=mysql_fetch_array($result));
    
}else
{
    echo'Данного товара нет в наличии';
}





?>
</ul>


</div>



</div>
</div>



   

</div>


</div>
<footer>
    <footer class="infooter">
        <img src="images/logo.png"/>
        
        <p>&copy;<?php echo date(' Y')?> Footstore | Все права защищены</p>    
    </footer>
</footer>


<script>
 $('.right-menu > ul > li > a').click(function(){
               	        
            if ($(this).attr('class') != 'active'){
                
			$('.right-menu  > ul > li > ul').slideUp(400);
            $(this).next().slideToggle(400);
            
                    $('.right-menu > ul > li > a').removeClass('active');
					$(this).addClass('active');
                    $.cookie('select_cat', $(this).attr('id'));
                    
				}else
                {
                                   
                    $('.right-menu > ul > li > a').removeClass('active');
                    $('.right-menu > ul > li > ul').slideUp(400);
                    $.cookie('select_cat', '');   
                }                                  
});

if ($.cookie('select_cat') != '')
{
$('.right-menu > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
}

$("#price").click(function(){
$("#price-sort").slideToggle(400);    
});
</script>






</body>
</html>