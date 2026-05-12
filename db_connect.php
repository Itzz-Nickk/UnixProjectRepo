<?php

// database settings 
$servername = "Unnamed"; // change to actual container name later
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