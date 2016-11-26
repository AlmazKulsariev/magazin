<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require_once("db_connect.php");
    require_once("../function/functions.php");
    $email=clear_string($_POST["email"]);
    
    if($email !="")
    {
        $result=mysql_query("SELECT email FROM reg_user WHERE email='$email'",$link);
        if(mysql_num_rows($result)>0)
        {
            $newpassword=funcgenpass();
            //шифрование
            $password=md5($newpassword);
            $password=strrev($password);
            $password = "9nm2rv8q4w4w4w".$password."2yo6z5dfs64";
        
    $update=mysql_query("UPDATE reg_user SET password='$password'WHERE email='$email'",$link);
    
    //отправка нового пароля
    
    send_mail('footstore@gmail.com',$email,'Новый пароль для сайта Footstore.kg'
    ,'Ваш пароль :'.$newpassword);
    echo'yes';
    
        }
        else
        {
        echo 'Данный E-mail не найден!';
        }
    }
    else
    {
    echo 'Укажите свой E-mail';
    }
}


?>