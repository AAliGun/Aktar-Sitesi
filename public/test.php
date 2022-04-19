<?php
$page = $_GET['page'] ?? 1;
include 'POST/API.php';
$products = ProductListQuery(1);
echo '<p>#'.$products.'#</p>';
