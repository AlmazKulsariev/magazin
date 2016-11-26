<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>


<div class="main-content">
    <ul class="block-tovar-grid">
        <?php if (!empty($goods)){ ?>
        <?php foreach ($goods as $good){?>
        <li>
            <div class="img-grid">
                <ul class="rewies-and-comment">
                    <li><img src="/foot/images/eye-icon.png"/><span>0</span></li>
                    <li><img src="/foot/images/comment.png"/><span>1</span></li>
                </ul>
                <div id="block-for-img">
                    <a href="<?=\yii\helpers\Url::to(['site/full','id'=>$good->products_id])?>"><img src="/foot/upload-images/<?=$good->image?>" width="190" height="200"/></a>
                </div>
                <div class="hover-cart-grid">
                    <p><a  href="localhost:8080/cart/add?id=<?=$good->products_id//(['cart/add','id'=>$good->products_id])?>" class="addd" data-id="<?=$good->products_id?> "><span>add to cart</span></a></p>
                </div>
                <p class="price-grid"><a href=""><strong><?=$good->price?></strong> cом</a></p>
                <p class="tittle-grid"><?=$good->tittle?></p>
            </div>
        </li>
        <?php }?>
        <?php } else echo '<h2 id="not-found">Извените, данного товара нет в наличии ! ! !</h2>'?>

    </ul>
</div>

