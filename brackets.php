<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tournament Brackets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- header -->
<div class="top-bar">
    <h1>Tournament Viewer</h1>

    <!-- logo from CDN container -->
    <img src="http://cdn-container/logo.png">
</div>

    <!-- navigation link -->
    <a href="index.php">Back to Index</a>

<!-- TOURNAMENTS SECTION -->
<h2>
    <img src="http://cdn-container/tournament.png">
    Tournaments
</h2>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
</tr>

<?php

// get tournaments
$result = $conn->query("SELECT * FROM TOURNAMENTS");

// check query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// display tournaments
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['tournamentID']}</td>";
    echo "<td>{$row['tournamentName']}</td>";
    echo "</tr>";
}

?>

</table>

<!-- COMPETITORS SECTION -->
<h2>
    <img src="http://cdn-container/player.png">
    Competitors
</h2>

<table>

<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Tournament ID</th>
</tr>

<?php

// get competitors
$result = $conn->query("SELECT * FROM COMPETITORS");

// check query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// display competitors
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['competitorID']}</td>";
    echo "<td>{$row['competitorFirstName']}</td>";
    echo "<td>{$row['competitorLastName']}</td>";
    echo "<td>{$row['tournamentID']}</td>";
    echo "</tr>";
}

?>

</table>

<!-- BRACKET PREVIEW -->
<h2>Bracket Preview</h2>

<?php

// simple bracket display
$result = $conn->query("SELECT competitorFirstName, competitorLastName FROM COMPETITORS");

if (!$result) {
    die("Query failed: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {

    echo "<div class='bracket-box'>";

    echo "Competitor: {$row['competitorFirstName']} {$row['competitorLastName']}";

    echo "</div>";
}

// close connection
$conn->close();

?>

</body>
</html>