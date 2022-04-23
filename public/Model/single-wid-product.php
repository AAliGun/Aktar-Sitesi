<?php
function single_wid_product_func($product) {
    include '../POST/API.php';
    $images = ImageQuery($product['ProductID']) ?? Array('URL' => '../../public/img/no-image.png');

    $image = $images[1] ?? Array('URL' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/OOjs_UI_icon_alert-warning.svg/1200px-OOjs_UI_icon_alert-warning.svg.png');

    echo 'div class="single-wid-product">
                            <a href="single-product.php"><img src="'.$image['URL'].'" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php">Sony Smart TV - 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>';
}
