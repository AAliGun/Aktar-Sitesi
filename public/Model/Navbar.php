<?php
Session_start();
include($_SERVER['DOCUMENT_ROOT'].'/POST/API.php');
$user = $_SESSION['user'];
if(!isset($user)){
    $user = 6;
}
$URL = '172.105.73.62';
$PORT = '5000';

function GetCartData($url, $data) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://' . $GLOBALS['URL'] . ':' . $GLOBALS['PORT'] .'/'. $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
$data = array(
    'user_id' => $user
);
$cart = json_decode(GetCartData('cart_price_count_query', $data),true);

$html = '<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i>Hesabım</a></li>
                            <li><a href="login.php"><i class="fa fa-user"></i> Giriş Yap</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> Sepetim</a></li>
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
                        <a href="cart.php">Sepet - <span class="cart-amunt">'.$cart['total_price'].' TL</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">'.$cart['total_product'].'</span></a>
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
                        <li><a href="shop.php">Ürünler</a></li>
                        <li><a href="cart.php">Sepet</a></li>
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
