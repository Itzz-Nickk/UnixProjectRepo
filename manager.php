<?php

// connect to database
include 'db_connect.php';

// success or error message
$message = "";

/* create tournament */
if (isset($_POST['create_tournament'])) {

    // get tournament name from form
    $tournamentName = $_POST['tournamentName'];

    // insert tournament into database
    $sql = "INSERT INTO TOURNAMENTS (tournamentName) VALUES (?)";

    // prepare statement
    $stmt = $conn->prepare($sql);

    // bind value
    $stmt->bind_param("s", $tournamentName);

    // execute query
    if ($stmt->execute()) {
        $message = "Tournament created successfully!";
    } else {
        $message = "Error creating tournament.";
    }

    // close statement
    $stmt->close();
}

/* create competitor */
if (isset($_POST['create_competitor'])) {

    // get competitor information from form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $tournamentID = $_POST['tournamentID'];

    // insert competitor into database
    $sql = "INSERT INTO COMPETITORS
            (competitorFirstName, competitorLastName, tournamentID)
            VALUES (?, ?, ?)";

    // prepare statement
    $stmt = $conn->prepare($sql);

    // bind values
    $stmt->bind_param("ssi", $firstName, $lastName, $tournamentID);

    // execute query
    if ($stmt->execute()) {
        $message = "Competitor created successfully!";
    } else {
        $message = "Error creating competitor.";
    }

    // close statement
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>

<head>

    <!-- page title -->
    <img src="localhost:8082/imagesFolder/logo.png" alt="logo" />
    <title>Tournament Manager</title>

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<!-- page heading -->
<h1>Tournament Manager</h1>

<!-- navigation links -->
<div class="container">

    <a href="index.php">Back to Index</a>

    <a href="brackets.php">View Brackets</a>

</div>

<?php

// display message after submitting forms
if ($message != "") {
    echo "<p class='message'><strong>$message</strong></p>";
}

?>

<!-- create tournament form -->
<div class="card">

    <img src="localhost:8082/imagesFolder/tournament_small.png" alt="tournament_pic" />
    <h2>Create Tournament</h2>

    <form method="POST" action="manager.php">

        <input
            type="text"
            name="tournamentName"
            placeholder="Tournament Name"
            required>

        <button
            type="submit"
            name="create_tournament">
            Create Tournament
        </button>

    </form>

</div>

<!-- create competitor form -->
<div class="card">

    <img src="localhost:8082/imagesFolder/competitor_small.png" alt="competitor_pic" />
    <h2>Create Competitor</h2>

    <form method="POST" action="manager.php">

        <input
            type="text"
            name="firstName"
            placeholder="First Name"
            required>

        <input
            type="text"
            name="lastName"
            placeholder="Last Name"
            required>

        <input
            type="number"
            name="tournamentID"
            placeholder="Tournament ID"
            required>

        <button
            type="submit"
            name="create_competitor">
            Create Competitor
        </button>

    </form>

</div>

<!-- tournaments table -->
<div class="card">

    <h2>Current Tournaments</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>

        <?php

        // get all tournaments
        $result = $conn->query("SELECT * FROM TOURNAMENTS");

        // display tournaments
        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row['tournamentID'] . "</td>";
            echo "<td>" . $row['tournamentName'] . "</td>";
            echo "</tr>";
        }

        ?>

    </table>

</div>

<!-- competitors table -->
<div class="card">

    <h2>Current Competitors</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Tournament ID</th>
        </tr>

        <?php

        // get all competitors
        $result = $conn->query("SELECT * FROM COMPETITORS");

        // display competitors
        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row['competitorID'] . "</td>";
            echo "<td>" . $row['competitorFirstName'] . "</td>";
            echo "<td>" . $row['competitorLastName'] . "</td>";
            echo "<td>" . $row['tournamentID'] . "</td>";
            echo "</tr>";
        }

        // close database connection
        $conn->close();

        ?>

    </table>

</div>

</body>
</html>
