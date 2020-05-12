<?php
// Check that an action has been set
if (isset($_POST['action'])) {
    session_start();

    require_once('includes/DbConnect.php');
    $db = new DbConnect();
    $connect = $db->connection();

    require "classes/AllItems.php";
    require "classes/Cart.php";

    $objAllItems = new AllItems($connect);
    $objAllItems->setId($_POST['item_id']);
    $item = $objAllItems->getItemById();
    # Creating an instance of the cart object
    $objCart = new Cart();
    switch ($_POST['action']) {
        case 'add':
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
                echo json_encode(["status" => 0, "message" => "Sorry something went wrong."]);
                exit;
            }
            break;

        case 'update':
            $objCart->setCustomerId($_SESSION['customer_id']);
            $objCart->setItemId($item['id']);
            $objCart->setQuantity($_POST['quantity']);
            $objCart->setTotalAmount($item['price'] * $_POST['quantity']);
            $objCart->setCreatedOn(date('Y-m-d H:i:s'));

            # Calling the add to cart function contained in the Cart object
            if ($objCart->updateItem()) {
                $cartItems = $objCart->getAllCartItems();
                # Calculating subtotals and total amount
                $sub_total = 0;
                $quantity = 0;

                foreach ($cartItems as $key => $cartItem) {
                    $sub_total += $cartItem['total_amount'];
                    $quantity += $cartItem['quantity'];
                }
                $total_price = number_format($objCart->getTotalAmount(), 2);
                $final_price = number_format($sub_total, 2);
                $sub_total = number_format($sub_total, 2);

                # Creating the array
                $data = ['total_price' => $total_price, 'final_price' => $final_price, 'sub_total' => $sub_total];
                echo json_encode(["status" => 1, "message" => "Cart updated.", 'data' => $data]);
                exit;
            } else {
                echo json_encode(["status" => 0, "message" => "Sorry something went wrong."]);
                exit;
            }
//            break;
        default:
            # code goes here
            break;

    }
} else {
    header("location: index.php");
}
