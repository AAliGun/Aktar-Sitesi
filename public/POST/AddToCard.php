<?php
session_start();
$UserID = $_SESSION['UserID'];
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = "../index.php";
}
$page = $_GET['page'];
$ProductID = $_GET['ProductID'];
//include 'API.php';
CartInsert($UserID, $ProductID, $_POST['quantity'] ?? 1);
if($page)
echo '<meta http-equiv="refresh" content="0;URL="'.$page.'">';
