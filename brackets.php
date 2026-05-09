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

<div class="top-bar">
    <h1>Tournament Viewer</h1>
    <img src="http://localhost:8081/logo.png">
</div>

<h2>
    <img src="http://localhost:8081/tournament.png">
    Tournaments
</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
</tr>

<?php

$sql = "SELECT * FROM TOURNAMENTS";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['tournamentID']."</td>";
    echo "<td>".$row['tournamentName']."</td>";
    echo "</tr>";
}

?>

</table>

<h2>
    <img src="http://localhost:8081/player.png">
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

$sql = "SELECT * FROM COMPETITORS";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['competitorID']."</td>";
    echo "<td>".$row['competitorFirstName']."</td>";
    echo "<td>".$row['competitorLastName']."</td>";
    echo "<td>".$row['tournamentID']."</td>";
    echo "</tr>";
}

?>

</table>

<h2>Bracket Preview</h2>

<?php

$result = $conn->query("SELECT * FROM COMPETITORS");

while ($row = $result->fetch_assoc()) {
    echo "<div class='bracket-box'>";
    echo $row['competitorFirstName']." ".$row['competitorLastName'];
    echo "</div>";
}

$conn->close();

?>

</body>
</html>