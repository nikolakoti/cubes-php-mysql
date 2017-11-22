<?php

session_start();

require_once __DIR__ . '/models/m_users.php'; 

if (!isUserLoggedIn()) {
    header('Location: /login.php'); 
    die();
}

require_once __DIR__ . '/models/m_categories.php';

if (empty($_GET['id'])) {
    die('morate proslediti id');
}

$id = (int) $_GET['id'];


$category = categoriesFetchOneById($id);

if (empty($category)) {

    die('Izabrali ste nepostojecu kategoriju');
}

if (isset($_POST["task"]) && $_POST["task"] == "delete") {

    categoriesDeleteOneById($id);
    
     $_SESSION['system_message'] = 'Uspesno ste obrisali kategoriju';
    
    categoriesFileRedirect();
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-delete.php';
require_once __DIR__ . '/views/layout/footer.php';
