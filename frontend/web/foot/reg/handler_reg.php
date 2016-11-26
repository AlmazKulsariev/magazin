<?php
 if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
 session_start();/*включение сессии*/
 include("../include/db_connect.php");
 include("../function/functions.php");
 
     $error = array();/*создание из переменной массив для того чтобы добавлять много выводить ошибок*/
         
        
 /*занессение в переменные значение полей которые мы получили от пользоватедя и сразу очищаем
  iconv("UTF-8", "cp1251",эти значения убрать когда будем размещать сайт в интернет это кодировки русс языка для локального компа */
        $login = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_login']))); /*занессение в переменные значение полей*/
        $pass = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_password']))); 
        $surname = iconv("UTF-8", "cp1251",clear_string($_POST['reg_surname'])); 
        
        $name = iconv("UTF-8", "cp1251",clear_string($_POST['reg_name'])); 
        $email = iconv("UTF-8", "cp1251",clear_string($_POST['reg_email'])); 
        
        $phone = iconv("UTF-8", "cp1251",clear_string($_POST['reg_phone'])); 
        $adress = iconv("UTF-8", "cp1251",clear_string($_POST['reg_adress'])); 
 
 
    if (strlen($login) < 4 or strlen($login) > 15)
    {
       $error[] = "Логин должен быть от 4 до 15 символов!"; 
    }
    else
    {   
     $result = mysql_query("SELECT login FROM reg_user WHERE login = '$login'",$link);
    If (mysql_num_rows($result) > 0)
    {
       $error[] = "Логин занят!";
    }
            
    }
     
    if (strlen($pass) < 6 or strlen($pass) > 15) $error[] = "Укажите пароль от 6 до 15 символов!";
    if (strlen($surname) < 3 or strlen($surname) > 20) $error[] = "Укажите Фамилию от 3 до 20 символов!";
    if (strlen($name) < 2 or strlen($name) > 15) $error[] = "Укажите Имя от 2 до 15 символов!";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Укажите корректный email!";
    if (!$phone) $error[] = "Укажите номер телефона!";
    if (!$adress) $error[] = "Необходимо указать адрес доставки!";
    
    if($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) $error[] = "Неверный код с картинки!";
    unset($_SESSION['img_captcha']);
    
   if (count($error))
   {
    
 echo implode('<br />',$error);   /*implofe  преобразует массив строки и разделяем с помощью </br>*/
     
   }else
   {   
        $pass   = md5($pass);/*зашифровываем пароль */  
        $pass   = strrev($pass);    /*перевернем пароль*/
        $pass   = "9nm2rv8q4w4w4w".$pass."2yo6z5dfs64";  /*и еще добавляем эти значения для сложности*/
        
        $ip = $_SERVER['REMOTE_ADDR'];
		
		mysql_query("	INSERT INTO reg_user(login,password,surname,name,email,phone,adress,datetime,ip)
						VALUES(
						
							'".$login."',
							'".$pass."',
							'".$surname."',
							'".$name."',
                            '".$email."',
                            '".$phone."',
                            '".$adress."',
                            NOW(),             
                            '".$ip."'							
						)",$link);

 echo 'true';           /*NOW это дата и время дататайм*/
 }        


}
?>