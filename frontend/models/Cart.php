<?php
/**
 * Created by PhpStorm.
 * User: almaz
 * Date: 11/20/16
 * Time: 10:37 AM
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product,$qty=1){
        if(isset($_SESSION['cart'][$product->products_id])){
            $_SESSION['cart'][$product->products_id]['qty']+=$qty;
        }else{
            $_SESSION['cart'][$product->products_id]=[
                'qty'=>$qty,
                'tittle'=>$product->tittle,
                'price'=>$product->price,
                'image'=>$product->image
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty:$qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty*$product->price:$qty*$product->price;
    }

    public function recalc($id){
        if(!isset($_SESSION['cart'][$id])) return false;
        $qtyminus = $_SESSION['cart'][$id]['qty'];
        $summinus = $_SESSION['cart'][$id]['qty']*
            $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty']-=$qtyminus;
        $_SESSION['cart.sum']-=$summinus;
        unset($_SESSION['cart'][$id]);
    }
}
