<?php

$servername = "192.254.231.187";
$username = "imenigma_ezrec";
$password = "H3xqEGu10c0!";
$dbname = "imenigma_ezrecipes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




?>