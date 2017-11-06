<?php

$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');

if ($link === false) {
	die('MySQL Error: ' . mysqli_connect_error());
}



//ulazni parametar 

$categoryId = $_GET['category_id'];

//ulazni parametar
$query = "SELECT * FROM products WHERE category_id = '" . mysqli_real_escape_string($link, $categoryId) . "' ORDER BY price DESC"; 
die($query);

$result = mysqli_query($link, $query);

if ($result === false) {
	die('MySQL Error: ' . mysqli_error($link));
}

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


print_r($products);
