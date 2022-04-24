<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<?php include 'Model/Head.php'; ?>
<body>
<?php include 'Model/Navbar.php';
echo getNavbar("cart.php")?>


    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sepet</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php include 'Model/LeftProduct.php';
                echo LeftProduct();?>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Ürüm</th>
                                            <th class="product-price">Fiyat</th>
                                            <th class="product-quantity">Sayı</th>
                                            <th class="product-subtotal">Toplam</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $cart = CartQuery($_SESSION['user']??6);
                                    $total = 0;
                                    foreach ($cart as $product){
                                        $images = ImageQuery($product['ProductID']['ProductID']);
                                        $image = $images[1] ?? array('URL' => 'img/product-thumb-2.jpg');

                                        echo '<tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="Model/RemoveCart.php?id='.$product['ProductID']['ProductID'].'">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.php"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="'.$image['URL'].'"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">'.$product['ProductID']['Name'].'</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">'.$product['ProductID']['Price'].' TL</span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="'.$product['Count'].'" min="0" step="1">
                                                    <input type="button" class="plus" value="+">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">'.$product['ProductID']['Price']*$product['Count'].' TL</span>
                                            </td>
                                        </tr>';
                                        $total += $product['ProductID']['Price']*$product['Count'];
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </form>


                            <div class="cart_totals">
                                <h2>Sepet Toplamı</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th><input type="text" placeholder="Kupon Kodu" value="" id="coupon_code" class="input-text" name="coupon_code"></th>
                                            <td><input type="submit" value="İşle" name="apply_coupon" class="button"></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Sepet Toplamı</th>
                                            <td><span class="amount"><?php echo $total." TL" ?></span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Kargo</th>
                                             <td>Bedava</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Ödeme Toplamı</th>
                                            <td><strong><span class="amount"><?php echo $total." TL" ?></span></strong> </td>
                                        </tr>
                                        <tr class="order-total"  >
                                            <th><input type="submit" value="Sepeti Güncelle" name="update_cart" class="button"></th>
                                            <td><a href="POST/CartToOrder.php" class="float-right">Öde</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <?php
    include 'Model/Footer.php';
    include 'Model/Scripts.php'
    ?>
  </body>
</html>
