<?php

// if bad request give die respons
if($_SERVER['REQUEST_METHOD'] != "POST") {
    die("Invalid request");
}

// else import db.php and run script
require_once './db.php';

$input_json = file_get_contents("php://input");

$input = json_decode($input_json, TRUE);

$query = "INSERT INTO `messages` (`name`, `email`, `message`) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param("sss", $input["name"], $input["email"], $input["message"]);

$success = $stmt->execute();

header('Content-Type: application/json; charset=utf-8');

// if message created succesfully
if($success) {
    http_response_code(201);
    echo json_encode("Message created!");
}
else {
    http_response_code(500);
    echo json_encode($stmt->errno);
}