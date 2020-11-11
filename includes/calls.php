<?php
    session_start();
    include 'db_config.php';
    include '../lib/Coupon.php';

    if (isset($_POST['addToCart']))
    {
        $cart = $_SESSION['cart'];
        $id = $_POST['id'];
        $response = '';

        if ($cart != array() && in_array($id, $cart)){
            $response = 'Item already in your cart';
        }
        else{
            array_push($_SESSION['cart'], $id);
            $response = 'Item added to cart';
        }
    //        $data = array();
        $data['id'] = $_POST['id'];
        $data['response'] = $response;
        $data['cart'] = $_SESSION['cart'];
        $data['size'] = sizeof($_SESSION['cart']);
        print_r($data);
    }

    if (isset($_POST['validateCoupon']))
    {
        $coupon = $_POST['coupon'];
        $cartTotal = $_POST['cart_total'];
        $quantity = $_POST['quantity'];

        echo Coupon::validateCoupon($coupon, $quantity, $cartTotal);
    }