<?php
include 'db_connect.php';
if(isset($_POST['create_tournament'])) {
    $tournamentName = $_POST['tournamentName'];
    $query = msqli_query($conn, "INSERT INTO TOURNAMENTS VALUE (DEFAULT, 'tournamentName')");
    if($query) {
        echo "Tournament created successfully!";
    } else {
        echo "Error creating tournament: " . mysqli_error($conn);
    }
}
if(isset($_POST['create_competitor'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $tournamentID = $_POST['tournamentID'];
    $query = msqli_query($conn, "INSERT INTO COMPETITORS VALUE (DEFAULT, '$firstName', '$lastName', '$tournamentID')");
    if($query) {
        echo "Competitor created successfully!";
    } else {
        echo "Error creating competitor: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Tournament Manager</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <!-- header -->
    <div class="top-bar">
        <h1>Tournament Manager</h1>

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
    <form method="POST" action="manager.php">
        <input type="text" name="tournamentName" placeholder="Tournament Name" required>
        <button type="submit" name="create_tournament">Create Tournament</button>
    </form>

    <!-- COMPETITORS SECTION -->
    <h2>
        <img src="http://cdn-container/tournament.png">
        Competitors
    </h2>
    <form method="POST" action="manager.php">
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="number" name="tournamentID" placeholder="Tournament ID" required>
        <button type="submit" name="create_competitor">Create Competitor</button>
    </form>
    </body>
</html>