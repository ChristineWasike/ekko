<?php

class Cart {
    private $id;
    private $customer_id;
    private $item_id;
    private $item_name;
    private $quantity;
    private $total_amount;
    private $created_on;
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

    function getItemName() {
        return $this->item_name;
    }

    function setItemName($item_name) {
        $this->item_name = $item_name;
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
        return $this->total_amount;
    }

    function setTotalAmount($total_amount) {
        $this->total_amount = $total_amount;
        return $this;
    }

    function getCreatedOn() {
        return $this->created_on;
    }

    function setCreatedOn($created_on) {
        $this->created_on = $created_on;
        return $this;
    }

    public function __construct() {
        // Create a connection instance
        require_once('includes/DbConnect.php');
        $db = new DbConnect();
        $this->dbConnection = $db->connection();
    }

    public function addItem() {
        $query = "INSERT INTO `cart`(`id`, `customer_id`, `item_id`, `item_name`, `quantity`, `total_amount`, 
                `created_on`) VALUES (null, :customer_id, :item_id, :item_name, :quantity, :total_amount, 
                :created_on)";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindParam(':customer_id', $this->customer_id);
        $statement->bindParam(':item_id', $this->item_id);
        $statement->bindParam(':item_name', $this->item_name);
        $statement->bindParam(':quantity', $this->quantity);
        $statement->bindParam(':total_amount', $this->total_amount);
        $statement->bindParam(':created_on', $this->created_on);
        try {
            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function updateItem() {

    }

    public function removeItem() {

    }

    public function removeAllItems() {

    }

    public function getAllCartItems() {
        $query = "SELECT c.*, a.price, a.description, a.image FROM cart c JOIN all_items a on c.item_id = a.id " .
            "WHERE customer_id = :customer_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindParam('customer_id', $this->customer_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
