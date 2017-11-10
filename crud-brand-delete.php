<?php

session_start();

require_once __DIR__ . '/models/m_users.php'; 

if (!isUserLoggedIn()) {
    header('Location: /login.php'); 
    die();
}

require_once __DIR__ . '/models/m_brands.php';

if (empty($_GET['id'])) {
    die('morate proslediti id');
}

$id = (int) $_GET['id'];



$brand = brandsFetchOneById($id);

if (empty($brand)) {
    die('Trazeni brend ne postoji');
}

if (isset($_POST["task"]) && $_POST["task"] == "delete") {

    brandsDeleteOneById($id);

    header('Location: /crud-brand-list.php');
    die();
}



require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-brand-delete.php';
require_once __DIR__ . '/views/layout/footer.php';


