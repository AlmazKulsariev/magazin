<?php 
    session_start();
    require_once('include/db_connect.php');
    require_once('function/functions.php');
    require_once('include/auth_cookie.php');

    $cat=clear_string($_GET["cat"]);
    $type=clear_string($_GET["type"]);
    
    
$sorting=$_GET["sort"];    

switch($sorting)
{
    case 'price-asc';
    $sorting='price ASC';
    $sort_name='От дешевых';break;
    
    case 'price-desk';
    $sorting='price DESC';
    $sort_name='От дорогих';break;
    
    case 'popular';
    $sorting='count DESC';
    break;
    
    case 'news';
    $sorting='datetime DESC';
    break;
    
    default:
    $sorting='count DESC';
    break;
}
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
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>


</head>
<body>
<div id="wrapper">
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
                    
            <a href="index.php"><img src="images/logo.png" alt="logo" id="logo"/></a>
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
<?php  

    	
 if (!empty($cat) && !empty($type)) 
 {
     $querycat = "brand='$cat' AND type='$type'";
     $catlink = "cat=$cat&"; 
            $forpage="brand=".$cat."&type=".$type;
            
 }else
 {
    
    if (!empty($type))
    {
       $querycat = "type='$type'"; 
       $forpage = "type=".$type; 
    }else
    {
       $querycat = ""; 
    }
   
       if (!empty($cat))
    {
       $catlink = "cat=$cat&"; 
    }else
    {
       $catlink = ""; 
    } 
    
      
 }  
    $num = 9; // Здесь указываем сколько хотим выводить товаров.
    $page = (int)$_GET['page'];  
    
    $sql = "SELECT COUNT(*) FROM table_products WHERE ".$querycat;
                
    $count = mysql_query($sql,$link);
	/*$count = mysql_query("SELECT COUNT(*) FROM table_products WHERE $querycat",$link);*/
    $temp = mysql_fetch_array($count);

	If ($temp[0] > 0)
	{  
	$tempcount = $temp[0];

	// Находим общее число страниц
	$total = (($tempcount - 1) / $num) + 1;
	$total =  intval($total);

	$page = intval($page);

	if(empty($page) or $page < 0) $page = 1;  
       
	if($page > $total) $page = $total;
	 
	// Вычисляем начиная с какого номера
    // следует выводить товары 
	$start = $page * $num - $num;

	$qury_start_num = "LIMIT $start, $num"; 
	}


echo'<ul class="block-tovar-grid">';
/*  $result = mysql_query("SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting $qury_start_num",$link); */
$result=mysql_query("SELECT * FROM table_products WHERE $querycat $qury_start_num",$link);    
/*$result=mysql_query("SELECT * FROM table_products WHERE $querycat $qury_start_num",$link);*/
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


echo'
</ul> 
</div>
';

if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="view_cat.php?'.$forpage.'&page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="view_cat.php?'.$forpage.'&page='.($page + 1).'">&gt;</a></li>';


// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href="view_cat.php?'.$forpage.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="view_cat.php?'.$forpage.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="view_cat.php?'.$forpage.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="view_cat.php?'.$forpage.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="view_cat.php?'.$forpage.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="view_cat.php?'.$forpage.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="view_cat.php?'.$forpage.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="view_cat.php?'.$forpage.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="view_cat.php?'.$forpage.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="view_cat.php?'.$forpage.'&page='.($page + 1).'">'.($page + 1).'</a></li>';


if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="view_cat.php?'.$forpage.'&page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='view_cat.php?".$querycat."&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
}

?>


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