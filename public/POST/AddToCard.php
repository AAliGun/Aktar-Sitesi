<?php
session_start();
$UserID = $_SESSION['UserID'];
$page = $_GET['page'];
$ProductID = $_GET['ProductID'];
include 'API.php';
CartInsert($UserID, $ProductID, 1);
echo '<meta http-equiv="refresh" content="0;URL=shop.php?page='.$page.'">';
