<?php

// Variables to access database
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "root";
$mysql_db = "master-thesis";

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

if (!$conn) {
    die("Connection failed");
}