<?php

// connect to database
include 'db_connect.php';

// success or error message
$message = "";

/* create tournament */
if (isset($_POST['create_tournament'])) {

    // get form value
    $tournamentName =
        $_POST['tournamentName'];

    // sql query
    $sql =
        "INSERT INTO TOURNAMENTS
        (tournamentName)
        VALUES (?)";

    // prepare query
    $stmt = $conn->prepare($sql);

    // bind parameter
    $stmt->bind_param(
        "s",
        $tournamentName
    );

    // execute query
    if ($stmt->execute()) {

        $message =
            "Tournament created successfully!";

    } else {

        $message =
            "Error creating tournament.";
    }

    // close statement
    $stmt->close();
}

/* create competitor */
if (isset($_POST['create_competitor'])) {

    // get form values
    $firstName =
        $_POST['firstName'];

    $lastName =
        $_POST['lastName'];

    $tournamentID =
        $_POST['tournamentID'];

    // sql query
    $sql =
        "INSERT INTO COMPETITORS
        (
            competitorFirstName,
            competitorLastName,
            tournamentID
        )
        VALUES (?, ?, ?)";

    // prepare query
    $stmt = $conn->prepare($sql);

    // bind parameters
    $stmt->bind_param(
        "ssi",
        $firstName,
        $lastName,
        $tournamentID
    );

    // execute query
    if ($stmt->execute()) {

        $message =
            "Competitor created successfully!";

    } else {

        $message =
            "Error creating competitor.";
    }

    // close statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>

    <!-- page title -->
    <title>Tournament Manager</title>

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<!-- page heading -->
<h1>Tournament Manager</h1>

<!-- navigation links -->
<div class="container">

    <a href="index.php">
        Back to Index
    </a>

    <a href="brackets.php">
        View Brackets
    </a>

</div>

<?php

// display success/error message
if ($message != "") {

    echo
        "<p class='message'>
        <strong>$message</strong>
        </p>";
}

?>

<!-- tournament form -->
<div class="card">

    <h2>Create Tournament</h2>

    <form
        method="POST"
        action="manager.php">

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

<!-- competitor form -->
<div class="card">

    <h2>Create Competitor</h2>

    <form
        method="POST"
        action="manager.php">

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

        // get tournaments
        $result =
            $conn->query(
                "SELECT * FROM TOURNAMENTS"
            );

        // display tournaments
        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo
                "<td>"
                . $row['tournamentID']
                . "</td>";

            echo
                "<td>"
                . $row['tournamentName']
                . "</td>";

            echo "</tr>";
        }

        ?>

    </table>

</div>