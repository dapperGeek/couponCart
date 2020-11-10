<?php
    define('host', 'localhost');
    define('username', 'root');
    define('password', '');
    define('database', 'dbcart');

    $connection = new mysqli(host, username, password, database) or die('Cannot connect to server');