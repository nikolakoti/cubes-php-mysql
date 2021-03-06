<?php
session_start(); 

require_once __DIR__ . '/models/m_users.php'; 

if (!isUserLoggedIn()) {
    header('Location: /login.php'); 
    die();
}

require_once __DIR__ . '/models/m_users.php';


if (isset($_SESSION['system_message'])) {
    
    $systemMesage = $_SESSION['system_message'];
    
    unset ($_SESSION['system_message']);
}

require_once __DIR__ . '/models/m_categories.php'; 

$categories = categoriesFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-list.php';
require_once __DIR__ . '/views/layout/footer.php';
