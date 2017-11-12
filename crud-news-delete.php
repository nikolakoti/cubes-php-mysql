<?php
session_start();
require_once __DIR__ . '/models/m_users.php';


if(!isUserLoggedIn()) {
    header('location: /login.php');
    die();
}

require_once __DIR__ . '/models/m_news.php';
require_once __DIR__ . '/models/m_sections.php';

if (empty($_GET['id'])) {
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$oneNews = newsFetchOneById($id);


if (empty($oneNews)) {
    die('Trazena vest ne postoji!');
}

$sections = sectionsFetchAll();
print_r($sections);

if (isset($_POST["task"]) && $_POST["task"] == "delete") {

    newsDeleteOneById($oneNews['id']);

    header('location: /crud-news-list.php');
    die();
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-news-delete.php';
require_once __DIR__ . '/views/layout/footer.php';

