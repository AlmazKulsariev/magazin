<?php

namespace frontend\controllers;
use app\models\TableProducts;
use app\models\Cart;
use Yii;
use yii\web\Session;


class CartController extends \yii\web\Controller
{
    public function actionAdd()
    {
        $id=Yii::$app->request->get('id');
        $qty=(int)Yii::$app->request->get('qty');
        $qty=!$qty ? 1 :$qty;
        $product=TableProducts::findOne($id);
        if(empty($product)) return false;
        $session=Yii::$app->session;
        $session->open();
        $cart=new Cart();
        $cart->addToCart($product, $qty);
        $this->layout=false;
        return $this->render('cart-modal',[
            'session'=>$session]);
    }

    public function actionClear()
    {
        $session=Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout=false;
        return $this->render('cart-modal',[
            'session'=>$session]);
    }

    public function actionDelItem()
    {
        $id=Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout=false;
        return $this->render('cart-modal',[
            'session'=>$session]);
    }

    public function actionShow(){
        $session=Yii::$app->session;
        $session->open();
        $this->layout=false;
        return $this->render('cart-modal',[
            'session'=>$session]);
    }

    public function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}
    function debug($arr){
        echo'<pre>'.print_r($arr,true).'</pre>';
    }

