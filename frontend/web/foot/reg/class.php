<?php
class First_class {
    protected $a;
    protected $b;
    public $c;
    private $y;
    function __construct($x,$y) {
        $this->a = $x;
        $this->b = $y;
    }
    function plus() {
        echo $this->a + $this->b; 
    }    
    function minus() {
        echo $this->a - $this->b; 
    }
    function out() {
        echo $this->a.' '.$this->b;  
    }
    function hello(){
        echo 'Hello';
    }
}

class Second_class extends First_class {
    function umnozh() {
        echo $this->a * $this->b;
    }
    function minus() {
        echo $this->b - $this->a; 
    }
}

$obj_1 = new First_class(4,6);
$obj_2 = new Second_class(4,6);

$obj_1->out();


echo '<br>';

$obj_1->plus();

echo '<br>';

$obj_1->minus();

//unset($obj_1);

First_class::hello();

echo '<br>';

$obj_2->out();

echo '<br>';

$obj_2->umnozh();

echo '<br>';

$obj_2->plus();

echo '<br>';
$obj_1->minus();
echo '<br>';
$obj_2->minus();

?>