<?php
function getProductCard($product,$page) {

    $images = ImageQuery($product['ProductID']) ?? Array('URL' => '../../public/img/no-image.png');

    $image = $images[1] ?? Array('URL' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/OOjs_UI_icon_alert-warning.svg/1200px-OOjs_UI_icon_alert-warning.svg.png');
    return '<div class="col-md-3 col-sm-6">
<div class="square">
                                <div class="squarecontent">
                            <div class="single-shop-product">

                                    <img  src="' . $image['URL'] . '">

                                </div>
                                <h2><a href="single-product.php?id=' . $product['ProductID'] . '">' . $product['Name'] . '</a></h2>
                                <div class="product-carousel-price">
                                    <ins>' . $product['Price'] . ' TL</ins>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="POST/AddToCard.php?page=' . $page . '&ProductID=' . $product['ProductID'] . '">Sepete Ekle</a>
                                </div>
                            </div>
                        </div>
                        </div>';
}

