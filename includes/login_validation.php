<?php
include("connect_to_db.php");
include("validate.php");

# Fetch inputs
$user_name = $_POST['username'];
$password = $_POST['password'];
$hashed_password = md5($password);

echo $user_name;
echo $hashed_password;
//Message variable
$message = "";

//Action Page variable
$action_page = "";

// Creating a Validation constructor
$validate = new Validation();

$password_and_username_contained = $validate->verifyUsername($user_name);
echo $password_and_username_contained;

# Made it not true to negate it
if (!$password_and_username_contained) {
    $action_page = "../index.php";
} else {
    $message = "Sorry, your username or password are incorrect. Please try again";
    $action_page = "../login.php";
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

