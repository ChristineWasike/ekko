<?php
class Validation{
    public function verifyUsername($username){
        // Create a connection instance
        $mysqli = connectToDatabse();

        $query = "SELECT username FROM users "
            . "WHERE username='" . $username . "'";

        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            // This means that the username already exists. We return false to prevent the same user from signing up a second time.
            return false;
        } else {
            return true;
        }
    }
}
