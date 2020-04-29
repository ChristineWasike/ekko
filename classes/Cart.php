<?php
include("includes/connect_to_db.php");

class Cart {
    private $id;
    private $customer_id;
    private $item_id;
    private $name;
    private $quantity;
    private $totalAmount;
    private $createdOn;
    private $dbConnection;


    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function getCustomerId() {
        return $this->customer_id;
    }

    function setCustomerId($customer_id) {
        $this->customer_id = $customer_id;
        return $this;
    }


    function getItemId() {
        return $this->item_id;
    }

    function setItemId($item_id) {
        $this->item_id = $item_id;
        return $this;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    function getTotalAmount() {
        return $this->totalAmount;
    }

    function setTotalAmount($totalAmount) {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    function getCreatedOn() {
        return $this->createdOn;
    }

    function setCreatedOn($createdOn) {
        $this->createdOn = $createdOn;
        return $this;
    }

    public function __construct() {
        // Create a connection instance
        require_once('includes/DbConnect.php');
        $db = new DbConnect();
        $this->dbConnection = $db->connection();
    }

    public function addItem() {
        
    }

    public function updateItem() {

    }

    public function removeItem() {

    }

    public function removeAllItems() {

    }
}
