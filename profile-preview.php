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

if (isUserLoggedIn()) {
    
    $id = $_SESSION['logged_in_user']['id'];
}

$id = (int) $id;




$user = usersFetchOneById($id); 



require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_profile-preview.php';
require_once __DIR__ . '/views/layout/footer.php';
