<?php
// Check that an action has been set
if (isset($_POST['action'])) {
    session_start();
    require "classes/AllItems.php";
    require "classes/Cart.php";
    switch ($_POST['action']) {
        case 'add':

            $objAllItems = new AllItems();
            $objAllItems->setId($_POST['itemId']);
            $item = $objAllItems->getItemById();

            # Creating an instance of the cart object
            $objCart = new Cart();
            $objCart->setCustomerId($_SESSION['customerId']);
            $objCart->setItemId($item['id']);
            $objCart->setName($item['name']);
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
