<?php

class Customer {
    private $id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $email;
    private $dbConnection;


    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function getFirstName() {
        return $this->first_name;
    }

    function setFirstName($first_name) {
        $this->first_name = $first_name;
        return $this;
    }

    function getLastName() {
        return $this->last_name;
    }

    function setLastName($last_name) {
        $this->last_name = $last_name;
        return $this;
    }


    function getUserName() {
        return $this->user_name;
    }


    function setUserName($user_name) {
        $this->user_name = $user_name;
        return $this;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function __construct($connection) {
        // Create a connection instance
        $this->dbConnection = $connection;
    }

    public function getCustomerByEmail() {
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindParam('email', $this->email);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}