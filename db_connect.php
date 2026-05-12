<?php

// docker database hostname
$servername = "db";

// mysql username
$username = "root";

// mysql password
$password = "password";

// database name
$dbname = "tournamentDB";

// create mysql connection
$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);

// check connection
if ($conn->connect_error) {

    die(
        "Connection failed: "
        . $conn->connect_error
    );
}

// set character encoding
$conn->set_charset("utf8");

?>