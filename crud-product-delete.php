<?php
session_start(); 

require_once __DIR__ . '/models/m_users.php'; 

if (!isUserLoggedIn()) {
    header('Location: /login.php'); 
    die();
} 

require_once __DIR__ . '/models/m_products.php';

if (empty($_GET['id'])) {
    die('morate proslediti id');
}

$id = (int) $_GET['id'];


$product = productsFetchOneById($id);

if (empty($product)) {

    die('Izabrali ste nepostojeci proizvod');
} 

if (isset($_POST["task"]) && $_POST["task"] == "delete") {

    productsDeleteOneById($product['id']);

    header('Location: /crud-product-list.php');
    die();
}



require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-product-delete.php';
require_once __DIR__ . '/views/layout/footer.php';


