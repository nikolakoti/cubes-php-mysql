<?php

session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}

require_once __DIR__ . '/models/m_sections.php';

if (empty($_GET['id'])) {
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];


$section = sectionsFetchOneById($id);

if (empty($section)) {

    die('Izabrali ste nepostojecu sekciju');
}

if (isset($_POST["task"]) && $_POST["task"] == "delete") {

    sectionsDeleteOneById($id);

    header('Location: /crud-section-list.php');
    die();
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-section-delete.php';
require_once __DIR__ . '/views/layout/footer.php';



