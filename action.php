<?php
// Check that an action has been set
if (isset($_POST['action'])) {
    session_start();
    require_once ('includes/DbConnect.php');
    $db = new DbConnect();
    $connection = $db->connection();
    require "classes/AllItems.php";
    require "classes/Cart.php";

    switch ($_POST['action']) {
        case 'add':

            $objAllItems = new AllItems();
            $objAllItems->setId($_POST['item_id']);
            $item = $objAllItems->getItemById();

            # Creating an instance of the cart object
            $objCart = new Cart($connection);
            $objCart->setCustomerId($_SESSION['customer_id']);
            $objCart->setItemId($item['id']);
            $objCart->setItemName($item['name']);
            $objCart->setQuantity(1);
            $objCart->setTotalAmount($item['price']);
            $objCart->setCreatedOn(date('Y-m-d H:i:s'));

            # Calling the add to cart function contained in the Cart object
            if ($objCart->addItem()) {
                echo json_encode(["status" => 1, "message" => "Added to cart."]);
                exit;
            } else {
                echo json_encode(["status" => 0, "message" => "Sorry, something went wrong."]);
                exit;
            }
            break;
        default:
            # code goes here
            break;

    }
} else {
    header("location: index.php");
}
