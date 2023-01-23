<?php

// if bad request give die respons
if($_SERVER['REQUEST_METHOD'] != "GET") {
    die("Invalid request");
}

// else import db.php and run script
require_once './db.php';

$query = "SELECT * FROM products";

$result = mysqli_query($conn, $query) or die("Select query failed");
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

header('Content-Type: application/json; charset=utf-8', "Access-Control-Allow-Origin: *");

// if get request is succesfull
if ($products) {
    http_response_code(200);
    echo json_encode($products);
}
// else send response code and error message
else {
    http_response_code(404);
    echo json_encode("Not found");
}