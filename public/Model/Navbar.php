<?php
$html = '<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
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
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop page</a></li>
                        <li><a href="single-product.php">Single product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li>
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
    else if ($page == "shop.php"){
        //replace the <a href="shop.php"> with <a  class="active" href="shop.php">
        $navbar = str_replace("<li><a href=\"shop.php\">", "<li class=\"active\"><a class=\"active\" href=\"shop.php\">", $GLOBALS['html']);
    }
    else if ($page == "single-product.php"){
        //replace the <a href="single-product.php"> with <a  class="active" href="single-product.php">
        $navbar = str_replace("<li><a href=\"single-product.php\">", "<li class=\"active\"><a class=\"active\" href=\"single-product.php\">", $GLOBALS['html']);
    }
    else if ($page == "cart.php"){
        //replace the <a href="cart.php"> with <a  class="active" href="cart.php">
        $navbar = str_replace("<li><a href=\"cart.php\">", "<li class=\"active\"><a class=\"active\" href=\"cart.php\">", $GLOBALS['html']);
    }
    else if ($page == "checkout.php"){
        //replace the <a href="checkout.php"> with <a  class="active" href="checkout.php">
        $navbar = str_replace("<li><a href=\"checkout.php\">", "<li class=\"active\"><a class=\"active\" href=\"checkout.php\">", $GLOBALS['html']);
    }
    else {
        $navbar = $GLOBALS['html'];
    }

    return $navbar;
}
