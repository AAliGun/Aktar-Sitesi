<?php
Session_start();
include($_SERVER['DOCUMENT_ROOT'].'/Admin/API/API.php');
$user = $_SESSION['admin'] ?? 6;

$URL = '172.105.73.62';
$PORT = '5000';

$html = '<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                             <li><a href="Profile.php"><i class="fa fa-user"></i>Hesabım</a></li>
                            <li><a href="Login.php"><i class="fa fa-user"></i>Giriş Yap</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- End header area -->
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="../API"><img src="img/logo.png"></a></h1>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- End site branding area -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Ana Sayfa</a></li>
                        <li><a href="Product.php">Ürün</a></li>
                        <li><a href="UserManage.php">Kullanıcılar</a></li>
                        <li><a href="Order.php">Siparişler</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->';



//create function to get the navbar params id
function getNavbar($page) {
    $navbar = "";
    if($page == "index.php") {
        //replace the <a href="index.php"> with <a  class="active" href="index.php">
        $navbar = str_replace("<li><a href=\"index.php\">", "<li class=\"active\"><a  href=\"index.php\">", $GLOBALS['html']);
    }
    else if ($page == "Product.php"){
        //replace the <a href="shop.php"> with <a  class="active" href="shop.php">
        $navbar = str_replace("<li><a href=\"Product.php\">", "<li class=\"active\"><a class=\"active\" href=\"Product.php\">", $GLOBALS['html']);
    }
    else if ($page == "UserManage.php"){
        //replace the <a href="single-product.php"> with <a  class="active" href="single-product.php">
        $navbar = str_replace("<li><a href=\"UserManage.php\">", "<li class=\"active\"><a class=\"active\" href=\"UserManage.php\">", $GLOBALS['html']);
    }
    else if ($page == "Order.php"){
        //replace the <a href="cart.php"> with <a  class="active" href="cart.php">
        $navbar = str_replace("<li><a href=\"Order.php\">", "<li class=\"active\"><a class=\"active\" href=\"Order.php\">", $GLOBALS['html']);
    }
    else {
        $navbar = $GLOBALS['html'];
    }

    return $navbar;
}
