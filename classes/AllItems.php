<?php
class AllItems {
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $merchant_id;
    private $merchant_name;
    private $on_sale;
    private $dbConnection;

    function getId() {return $this->id;}

    function setId($id) {$this->id = $id;return $this;}

    function getName() {return $this->name;}

    function setName($name) {$this->name = $name;return $this;}

    function getDescription() {return $this->description;}

    function setDescription($description) {$this->description = $description;return $this;}

    function getPrice() {return $this->price;}

    function setPrice($price) {$this->price = $price;return $this;}

    function getImage() {return $this->image;}


    function setImage($image) {$this->image = $image;return $this;}

    function getMerchantId() {return $this->merchant_id;}

    function setMerchantId($merchant_id) {$this->merchant_id = $merchant_id;return $this;}

    function getMerchantName() {return $this->merchant_name;}

    function setMerchantName($merchant_name) {$this->merchant_name = $merchant_name;return $this;}


    function getOnSale() {return $this->on_sale;}

    function setOnSale($on_sale) {$this->on_sale = $on_sale; return $this;}


    public function __construct($connection) {
        // Create a connection instance
        $this->dbConnection = $connection;
    }

    public function getAllItems() {
        $query = "SELECT * FROM all_items";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemById() {
        $query = "SELECT * FROM all_items WHERE id = :itemId";
        $statement = $this->dbConnection->prepare($query);
        $statement->bindParam('itemId', $this->id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}
