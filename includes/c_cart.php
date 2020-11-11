<?php

    $cart = '(' . implode(',', $_SESSION['cart']) .')' ;
    $sql = "Select * from items where id IN " . $cart;
    $myCart = $connection->query($sql);