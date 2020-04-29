<?php
include("includes/constants.php");

class DbConnect {
    public
    function connection() {
        try {
            $connection = new PDO('mysql:host=' . DATABASE_HOST . '; dbname=' . DATABASE_NAME,
                DATABASE_USERNAME, DATABASE_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $exception){
            echo 'Database Error: ' . $exception->getMessage();
        }
}
}
