<?php
$database_host = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "ekko";
$database_connection = mysqli_connect($database_host, $database_username, $database_password, $database_name);

// A condition that checks whether a database connection was made or not
if (!$database_connection) {
    die("Connection to the databse could not be made. " . mysqli_connect_error());
}
