<?php
// Including the constants needed to connect to the database
include("constants.php");

// Creating a function to connect to the database
function connectToDatabase() {
    // Initializing the connection object
    $mysqli = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

    // Check if the connection was successful
    if (mysqli_connect_errno()) {

        //Returning an error message in case thee connection was unsuccessful
        echo "<br> Unable to connect to database.";
        mysqli_error($mysqli);

    } else {
        //Returning a response if the connection was successful
        #TODO Figure out what the variable $mysqli returns
        echo "Connection to database was successful";
        return $mysqli;
    }
}


// Function to disconnect from the Database(A security measure)
function disconnectFromDatabase($mysqli) {
    $mysqli->close();
}
