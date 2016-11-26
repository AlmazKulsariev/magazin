<div id="right-block">
<div class="right-menu">
        <ul class="main-manu-list">
            <li><a id="index1"><img src="images/icon2.png"/><strong>Kлубная форма</strong><span>&#9660;</span></a>
                <ul class="inmain-manu-list">
                    <li><a href="view_cat.php?type=club_kit"> &raquo;Показать все</a></li>
                    
<?php

$result=mysql_query("SELECT * FROM category WHERE type='club_kit' ",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    echo'
   
      <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li> 
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>

                </ul>
            </li>
            

            <li><a id="index2"><img src="images/icon3.png"/><strong>Форма Сборных</strong><span>&#9660;</span></a>
            <ul class="inmain-manu-list">
                    <li><a href="view_cat.php?type=country_kit"> &raquo;Показать все</a></li>
<?php

$result=mysql_query("SELECT * FROM category WHERE type='country_kit'",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    echo'
   
      <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li> 
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>
            </ul>
            </li>
           <!-- <li class="right-menu-tittle"><a href=""><img src="images/icon2.png"/><strong>Клубная Атрибутика</strong><span>&#9660;</span></a></li>-->
           <li><a id="index3"><img src="images/icon5.png"/><strong>Клубная одежда</strong><span>&#9660;</span></a>
           <ul class="inmain-manu-list">
                    <li><a href="view_cat.php?type=club_clothes"> &raquo;Показать все</a></li>

<?php

$result=mysql_query("SELECT * FROM category WHERE type='club_clothes'",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    echo'
   
      <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li> 
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>                    
            </ul>
           </li>
            <li><a href="view_cat.php?type="id="index4"><img src="images/icon1.png"/><strong>Сувениры/Подарки</strong></a>
            </li>
            <li><a id="index5"><img src="images/icon2.png"/><strong>Женская форма</strong><span>&#9660;</span></a>
            <ul class="inmain-manu-list">
                    <li><a href="view_cat.php?type=women_kit"> &raquo;Показать все</a></li>
                    
<?php

$result=mysql_query("SELECT * FROM category WHERE type='women_kit'",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    echo'
   
      <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li> 
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>

            </ul>
            </li>
            <li><a id="index6"><img src="images/icon3.png"/><strong>Детская форма</strong><span>&#9660;</span></a>
            <ul class="inmain-manu-list">
                    <li><a href="view_cat.php?type=kid_kit"> &raquo;Показать все</a></li>
                    
<?php

$result=mysql_query("SELECT * FROM category WHERE type='kid_kit'",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    echo'
   
      <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li> 
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>
                    
            </ul>
            </li>
            <li><a id="index7"><img src="images/icon4.png"/><strong>Тренировочная</strong><span>&#9660;</span></a>
            <ul class="inmain-manu-list">
                    <li><a href="view_cat.php?type=training_kit"> &raquo;Показать все</a></li>
                    
                    
<?php

$result=mysql_query("SELECT * FROM category WHERE type='training_kit'",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    echo'
   
      <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li> 
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>
                    
            </ul>
            </li>
            
        </ul>
        
     </div>
</div>
 
<script type="text/javascript">
$(document).ready(function() {
	    $('#block-trackbar').trackbar({
	onMove : function() {
    document.getElementById("start-price").value = this.leftValue;
	document.getElementById("end-price").value = this.rightValue;	
	},
	width : 160,
	leftLimit : 100,
	leftValue : <?php
	if((int)$_GET["start_price"]>=100 AND (int)$_GET["start_price"]<=20000) 
    {
        echo(int)$_GET["start_price"];
    }else
    {
        echo"100";
    }
    
?>,
    rightLimit:20000,
    rightValue:<?php
	if((int)$_GET["end_price"]>=100 AND (int)$_GET["end_price"]<=20000) 
    {
        echo(int)$_GET["end_price"];
    }else
    {
        echo"3000";
    }
    
?>,
    roundUp:100
 });
 });
 </script>
     
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

<p align="center" class="search-check">Поиск по командам</p>    
    
    <ul id="checkbox-list">
    
<?php

$result=mysql_query("SELECT * FROM category WHERE type='club_kit'",$link);

if(mysql_num_rows($result)>0)
{
$row=mysql_fetch_array($result);
}
do{
    $checked_brand=""; /*обнуляем перед циклом каждый раз*/
    
    if($_GET["brand"])
    {
        if(in_array($row["id"],$_GET["brand"]))/*in_array ищет значение в массиве(совпадение) через запятую где будем искать совпадение*/
        {
            $checked_brand="checked";
        }
    }
    
    
    echo'
   
      <li><input '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkteam'.$row["id"].'"/><label for="checkteam'.$row["id"].'">'.$row["brand"].'</label></li>
        
        '; 
}while($row=mysql_fetch_array($result));

	
?>    

        
        
    </ul>    
        <center><input type="submit" name="checksubmit" value="Искать" id="checksubmit"/></center>


</form>



</div>

