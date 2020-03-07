<?php
include("connect_to_db.php");
include("validate.php");

//Fetch inputs from the sign up form
$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$user_name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];



//Message variable
$message = "";

//Action Page variable
$action_page = "";

// Creating a Validation constructor
$validate = new Validation();

$username_not_in_use = $validate->verifyUsername($user_name);

if ($username_not_in_use) {
    // Create a connection object
    $mysqli = connectToDatabse();

    $query = "INSERT INTO users "
            . "(username, firstname, lastname, password, email)"
            . "VALUES ('" . $user_name . "',"
            . "'" . $first_name . "',"
            . "'" . $last_name . "',"
            . "PASSWORD('$password'),"
            . "'" . $email . "')";

    // Execute query
    $result = $mysqli->query($query);

    // Check if the query executed successfully
    if ($result) {
        // Redirect the user to the login page
        $action_page = "../login.php";
    } else {
        // Redirect them to the signup page and display an error message
        $message = "Unable to create an account. Please try again.";
        $action_page = "../signup.php";
    }
    
} else{
    $message = "Unable to create account. Please try again. Your password maybe already in use.";
    $action_page = "../signup.php";
}

// Redirect the user to as per the action page
echo '<form name="user_redirect" id="user_redirect" method="POST"'
. 'action="' . $action_page . '">'
. '<input type="text" name="message" value="' . $message . '" />'
. '</form>';

//create a script in Javascript to execute the form
echo '<script language="Javascript" type="text/javascript">'
. 'window.onload=function(){ '
. 'window.document.user_redirect.submit(); }'
. '</script>';