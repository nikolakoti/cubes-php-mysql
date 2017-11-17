<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

require_once __DIR__ . '/models/m_users.php';

$users = usersFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-user-list.php';
require_once __DIR__ . '/views/layout/footer.php';
