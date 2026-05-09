<?php

// database settings
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "tournamentDB";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// set encoding
$conn->set_charset("utf8");

?>