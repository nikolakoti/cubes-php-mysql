<?php
session_start();

require_once __DIR__ .  '/models/m_products.php';




$page = 1; 

if (isset($_GET['page'])) {
    
   $page = (int) $_GET['page']; 
}

$rowsPerPage = 4;


$totalRows = productsOnSaleGetCount();


$totalPages = ceil($totalRows / $rowsPerPage);


if ($page < 1) {
    
    $page = 1;
} else if ($page > $totalPages) {
    
    $page = $totalPages;
}



$productsOnSaleByPage = productsOnSaleFetchAllByPage($page, $rowsPerPage);

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_sale.php';
require_once __DIR__ . '/views/layout/footer.php';