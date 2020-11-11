<?php
    include 'views/header.php';

    $products = $connection->query('Select * from items');
?>
    <div class="row col-md-12">
        <div class="row col-md-12" style="margin-right: auto; margin-left: auto">
            <a id="cart-link" href="cart.php" title="Go to cart">Go to cart</a>
        </div>

        <div class="row col-md-10" style="margin-left: auto; margin-right: auto">
            <?php
                while ($item = $products->fetch_assoc()){
                    ?>
                    <div class="col-sm-3 store_container">
                        <div>
                            <img class="store_img" src="<?php echo IMAGE_DIR . $item['image'] ?>">
                        </div>
                        <div>
                            <span><?php echo $item['product'] ?></span>
                        </div>
                        <div>
                            <span><?php echo $item['price'] ?></span>
                        </div>
                        <div>
                            <a href="#" class="btn btn-secondary" onclick="addToCart([<?php echo $item['id'] . ',' . $item['price']; ?>])">
                                <i class="fa fa-shopping-cart">Add To Cart</i>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>

    </div>
<?php
    include 'views/footer.php';