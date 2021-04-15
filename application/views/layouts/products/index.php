<div class="container shop">
    <div>
        <h1>Products</h1>
        <a href="/orders">Your Cart (<?= $orders_count?>)</a>
    </div>
    <div>
        <div class="thead">
            <p>Description</p>
            <p>Price</p>
            <p>QTY</p>
            <p>Action</p>
        </div>
        <div class="tbody">
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
    );
        foreach($products as $product){?>
            <div>
                <form action="/orders/add" method="post">
                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    <p><?= $product->name ?></p>
                    <p>$<?= $product->price ?></p>
                    <p><input type="number" name="quantity" class="price" min="1" value="<?php 
                          $quantityOrder = 0;
                        // var_dump($quantityOrder);
                        if(isset($orders[$product->id])){
                            $quantityOrder = $orders[$product->id]->quantity;
                        }
                        echo $quantityOrder;
                    ?>"></p>
                    <p> <input type="submit" value="Order" class="btn"></p>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</div>