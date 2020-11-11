<?php
    include 'views/header.php';
    include 'includes/c_cart.php';
?>
    <div class="row col-md-12">
        <div class="col-md-10">

            <form method="post">
                <table class="cart_table">
                    <thead>
                    <td colspan="3">
                        ORDER DETAILS
                    </td>
                    </thead>
                    <tbody>
                    <?php
                        $cartTotal = 0;
                        while ($item = $myCart->fetch_assoc()){
                            $cartTotal += $item['price'];
                            ?>
                            <tr>
                                <td>
                                    <img class="cart_thumbs" src="<?php echo IMAGE_DIR . $item['image'] ?>"
                                </td>
                                <td>
                                    <?php echo $item['product'] ?>
                                    <input type="hidden" name="product[]" value="<?php echo $item['id'] ?>">
                                </td>
                                <td>
                                    <?php echo $item['price'] ?>
                                    <input onchange="" type="hidden" name="price[]" value="<?php echo $item['price'] ?>">
                                </td>
                            </tr>
                            <?php
                        }
                    ?>

                        <tr>
                            <td colspan="2"> USE COUPON CODE</td>
                            <td>
                                <input name="coupon" type="text">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td> <?php echo $cartTotal; ?></td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
