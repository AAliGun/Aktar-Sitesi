<?php
include 'API.php';
session_start();

$user = $_SESSION['user'] ?? $_GET['user'] ?? 6;
$page = $_GET['page'] ?? "..\index.php";

echo CartToOrder($user);

echo '<meta http-equiv="refresh" content="0;URL='.$page.'">';
