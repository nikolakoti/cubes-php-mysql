<?php

session_start();

require_once __DIR__ . '/models/m_news.php';


$page = 1;

if (isset($_GET['page'])) {

    $page = (int) $_GET['page'];
}

$rowsPerPage = 3;

$totalRows = newsGetCount();

$totalPages = ceil($totalRows / $rowsPerPage);


if ($page < 1) {
    
    $page = 1;
} else if ($page > $totalPages) {
    
    $page = $totalPages;
}




$news = newsFetchAllByPage($page, $rowsPerPage);



require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_all-news.php';
require_once __DIR__ . '/views/layout/footer.php';
