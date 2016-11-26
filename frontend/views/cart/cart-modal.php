
<?php if(!empty($session['cart'])){?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
  <thead>
    <tr>
        <th>Фото</th>
        <th>Имя</th>
        <th>Кол-во</th>
        <th>Цена</th>
        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id=>$item){ ?>
                <tr>
                    <td><img src="/foot/upload-images/<?=$item['image']?>" height="55"></td>
                    <td><?=$item['tittle']?></td>
                    <td><?=$item['qty']?></td>
                    <td><?=$item['price']?></td>
                    <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2">Итого количество: </td>
                <td><?=$session['cart.qty']?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Итого цена: </td>
                <td><?=$session['cart.sum']?></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
  </table>
</div>
<?php }else{ ?>
    <h2>Корзина пуста</h2>
<?php } ?>

