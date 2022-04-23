<?php
session_start();

$user = $_SESSION['user'] ?? 6;
$page = $_GET['page'] ?? "..\index.php";
$ProductID = $_GET['ProductID'] ?? $_POST['ProductID'];
$count = $_POST['quantity'] ?? 1;

echo $user."<br>";
echo $ProductID."<br>";
echo $page."<br>";
echo $count."<br>";

//CartInsert($user, $ProductID, $_POST['quantity'] ?? 1);

echo '<meta http-equiv="refresh" content="0;URL='.$page.'">';
