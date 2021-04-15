<div class="container checkout shop">
    <div>
        <h1>Checkout</h1>
        <a href="/">Go back to shop</a>
    </div>
    <div>
        <div class="thead">
            <p>Qty</p>
            <p>Description</p>
            <p>Price</p>
            <p>Action</p>
        </div>
        <div class="tbody">
        <?php 
        $total = 0;
        foreach($orders as $order){
            ?>
            <div>
                <form action="/orders/remove" method="post">
                    <p><?= $order->quantity ?></p>
                    <input type="hidden" name="order_id" value="<?= $order->id ?>">
                    <p><?= $order->name ?></p>
                    <p>$<?php 
                    $total += $order->price; 
                    echo $order->price;
                    ?></p>
                    <p> <input type="submit" value="Remove" class="btn danger"></p>
                </form>
            </div>
            <?php } ?>
            <div>
                <p></p>
                <p style="text-align:right;">Total:</p>
                <p>$<?= $total?></p>
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="container billing">
    <h1>Billing Info</h1>
    <form action="/orders/insert" method="post">
    <?php 
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
    );
    ?>
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Address</label>
            <input type="text" name="address">
        </div>
        <div>
            <label for="">Card#</label>
            <input type="text" name="card_no">
        </div>
        <?php if($this->session->flashdata('success')){?>
        <span class="success"><?= $this->session->flashdata('success') ?></span>
        <?php }?>
        <input type="submit" class="btn" value="Order">
    </form>
</div>