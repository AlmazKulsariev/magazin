<?php

if($_SESSION['auth'] !='yes_auth' && $_COOKIE["rememberme"])
{
    $str=$_COOKIE["rememberme"];
    
    //��� ����� ������
    $all_len=strlen($str);
    //����� ������ ��� ��������
    $login_len=strpos($str,'+');
    //�������� ������ �� ����� � �������� �����
    $login=clear_string(substr($str,0,$login_len));
    
    //�������� ������
    $password=clear_string(substr($str,$login_len+1,$all_len));
    
    
    $result=mysql_query("SELECT * FROM reg_user WHERE (login='$login'or email='login') AND password='$password'",$link);
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

}
} 
?>