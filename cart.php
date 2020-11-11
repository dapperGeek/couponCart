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
//                        print_r($_SESSION['cart']);
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
                                    <input" type="hidden" name="price[]" value="<?php echo $item['price'] ?>">
                                </td>
                            </tr>
                            <?php
                        }
                    ?>

                        <tr>
                            <td colspan="2"> USE COUPON CODE</td>
                            <td>
                                <input onchange="validateCoupon([this.value, <?php echo sizeof($_SESSION['cart']). ',' . $cartTotal ?>])" name="coupon" type="text">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> TOTAL </td>
                            <td>
                                <input style="border-width: 0" readonly name="cart_total" id="cart_total" value="<?php echo $cartTotal; ?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
