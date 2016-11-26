<?php
/**
 * Created by PhpStorm.
 * User: almaz
 * Date: 11/19/16
 * Time: 2:39 AM
 */
?>
<div class="main-content">
    <ul class="block-tovar-grid">
            <li>
                <div class="img-grid">
                    <ul class="rewies-and-comment">
                        <li><img src="/foot/images/eye-icon.png"/><span>0</span></li>
                        <li><img src="/foot/images/comment.png"/><span>1</span></li>
                    </ul>
                    <div id="block-for-img">
                        <a href=""><img src="/foot/upload-images/<?=$full->image?>" width="300" height="320"/></a>
                    </div>
                    <input type="text" value="1" id="qty">
                    <div class="hover-cart-grid">
                        <a href="#" data-id="<?=$full->products_id?>"  class="add-to-cart cart addd"><span>add to cart</span></a>
                    </div>
                    <p class="price-grid"><a><strong><?=$full->price?></strong> cом</a></p>
                    <p class="tittle-grid"><?=$full->tittle?></p>
                </div>
            </li>
    </ul>
</div>
