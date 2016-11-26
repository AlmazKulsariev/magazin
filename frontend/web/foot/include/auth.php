<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require_once("db_connect.php");
    require_once("../function/functions.php");
    
    $login=clear_string($_POST["login"]);
    $password=md5(clear_string($_POST["password"]));
    $password=strrev($password);
    $password=strtolower("9nm2rv8q4w4w4w".$password."2yo6z5dfs64"); 
    
    if($_POST["rememberme"]=="yes")
    {
        setcookie('rememberme',$login.'+'.$password,time()+3600*24*31,"/");
        
    } 
    
    
    $result=mysql_query("SELECT * FROM reg_user WHERE (login='$login'OR email='$login')AND password='$password'",$link);
    if(mysql_num_rows($result)>0){
    $row=mysql_fetch_array($result);
    session_start();
    $_SESSION['auth']='yes_auth';
    $_SESSION['auth_login']=$row["login"];
    $_SESSION['auth_password']=$row["password"];
    $_SESSION['surname']=$row["surname"];
    $_SESSION['name']=$row["name"];
    $_SESSION['adress']=$row["adress"];
    $_SESSION['phone']=$row["phone"];
    $_SESSION['email']=$row["email"];
    echo'yes_auth';
    }
    else
    {
        echo'no_auth';
    }
}


?>