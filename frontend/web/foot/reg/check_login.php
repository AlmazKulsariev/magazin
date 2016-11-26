 <?php
 if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require_once("../include/db_connect.php");
    require_once("../function/functions.php");
 
 $login=clear_string($_POST['reg_login']);
 
 $result=mysql_query("SELECT login FROM reg_user WHERE login='$login'",$link);      
 if(mysql_num_rows($result)>0)
 {
    echo 'false';
 }   
 else
 {
    echo'true';
 }
}	

?>