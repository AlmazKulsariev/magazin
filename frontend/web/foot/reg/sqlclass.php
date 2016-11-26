<?php
class sql{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_database; 
    private $link;
    
    public $data;
    
    function __construct(){
        $this->db_host ='localhost';
        $this->db_user = 'admin';
        $this->db_pass = 'kulsariev';
        $this->db_database = 'footstore'; 
    }
    function connect(){
        echo $this->db_host.$this->db_user.$this->db_pass.$this->db_database;
        $this->link = mysql_connect($this->db_host,$this->db_user,$this->db_pass); 
        mysql_select_db($this->db_database,$this->link) or die("Нет соединения с БД ".mysql_error());
        mysql_query("SET names cp1251");
    }  
    function select($table){
        $result=mysql_query("SELECT * FROM ".$table,$this->link);  
        $i = 1;
        if(mysql_num_rows($result)>0){
            do{
                $this->data[$i] = $row;  
                $i++;  
            }while($row=mysql_fetch_array($result));    
        }
    }
    
}

$ob1=new sql;
$ob1->connect();
$ob1->select('reg_user');

print_r($ob1->data);
$ob1->select('table_products');

echo '<hr>';

print_r($ob1->data);

?>