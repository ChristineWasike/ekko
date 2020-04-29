<?php

class Validation {

    public function verifyUsername($username) {
        // Create a connection instance
        $mysqli = connectToDatabase();

        $query = "SELECT username FROM users WHERE username='" . $username . "'";

        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyUsernameAndPassword($username, $password) {
        // Create connection instance
        $mysqli = connectToDatabase();
        $hashed_password = md5($password);

        $query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $hashed_password . "'";

        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
