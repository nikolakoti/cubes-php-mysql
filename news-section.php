<?php

session_start();

require_once __DIR__ . '/models/m_news.php';

require_once __DIR__ . '/models/m_sections.php';


if (!isset($_GET['id'])) {

    die("Morate proslediti ID sekcije");
}

$id = (int) $_GET['id'];

$section = sectionsFetchOneById($id);

if (empty($section)) {

    die('Izabrana sekcija ne postoji');
}


$page = 1;

if (isset($_GET['page'])) {

    $page = (int) $_GET['page'];
}



$rowsPerPage = 3;

$totalRows = newsGetCountBySection($section['id']);

$totalPages = ceil($totalRows / $rowsPerPage);

$news = newsFetchAllBySectionByPage($section['id'], $page, $rowsPerPage);


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_news-section.php';
require_once __DIR__ . '/views/layout/footer.php';

