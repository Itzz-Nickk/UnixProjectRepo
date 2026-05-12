<?php

// connect to database
include 'db_connect.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tournament Brackets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <img src="localhost:8082/imagesFolder/logo.png" alt="logo" />
<h1>Tournament Brackets</h1>

<div class="container">
    <a href="index.php">Back to Index</a>
    <a href="manager.php">Manage Tournaments</a>
</div>

<?php

// get tournaments
$tournaments = $conn->query("SELECT * FROM TOURNAMENTS");

// display tournaments
while ($tournament = $tournaments->fetch_assoc()) {

    echo "<div class='card'>";
<img src="localhost:8082/imagesFolder/tournament_small.png" alt="tournament_pic" />
    echo "<h2>" . $tournament['tournamentName'] . "</h2>";

    $tournamentID = $tournament['tournamentID'];

    // get competitors for this tournament
    $competitors = $conn->query(
        "SELECT * FROM COMPETITORS WHERE tournamentID = $tournamentID"
    );
<img src="localhost:8082/imagesFolder/competitor_small.png" alt="competitor_pic" />
    echo "<h3>Competitors</h3>";

    echo "<table>";

    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
          </tr>";

    while ($competitor = $competitors->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $competitor['competitorID'] . "</td>";
        echo "<td>" . $competitor['competitorFirstName'] . "</td>";
        echo "<td>" . $competitor['competitorLastName'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}

$conn->close();

?>

</body>
</html>
