<?php
ob_start();

//require MySQLi connection
require ("database/DBController.php");

//require Product class
require("database/Product.php");
 
//require cart
require("database/Cart.php"); 


//DBController object
$db = new DBController();


//Product obj
$product = new Product($db);
$product_shuffle = $product->getData(); //added the product shuffle global for all to use
//print_r($product->getData());
//$product->getData();



//create object of Cart 
$Cart = new Cart($db);
// $arr = array(
//     "user_id" => 1,
//     "item_id" => 2
// );
// $Cart->insertIntoCart($arr);
//print_r($Cart->getCartId($product->getData('cart')));