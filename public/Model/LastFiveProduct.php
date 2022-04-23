<?php

include($_SERVER['DOCUMENT_ROOT'].'/POST/API.php');

function GetLastFiveProduct(): string
{
    $last_products = ProductLastFiveQuery();
    $html = "";
    foreach ($last_products as $product) {
        $images = ImageQuery($product['ProductID']);
        $image = $images[2] ?? array('URL' => '../img/product-1.jpg');

        $html .= '<div class="single-product">
                                <div class="product-f-image">
                                    <img src="' . $image['URL'] . '" alt="">
                                    <div class="product-hover">
                                        <a href="POST/AddToCard.php?ProductID=' . $product['ProductID'] . '" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
                                        <a href="single-product.php?id=' . $product['ProductID'] . '" class="view-details-link"><i class="fa fa-link"></i>Detay</a>
                                    </div>
                                </div>

                                <h2><a href="single-product.php?id=' . $product['ProductID'] . '">' . $product['Name'] . '</a></h2>

                                <div class="product-carousel-price">
                                    <ins>' . $product['Price'] . ' TL</ins>
                                </div>
                            </div>';
    }
    return $html;
}

