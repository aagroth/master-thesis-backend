<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
    
    /* CREATE new message */
    require './post-message.php';
}
else if ($method == "GET") {
    
    /* GET all products */
    require './get-products.php';
}
else {
    /* invalid method */
    echo "Invalid method.";
}