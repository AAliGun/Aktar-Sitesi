<?php

function single_wid_product_func( $product ) {
    $images = ImageQuery($product['ProductID']) ?? Array('URL' => '../../public/img/no-image.png');

    $image = $images[2] ?? Array('URL' => 'img/product-thumb-1.jpg');

    echo '<div class="single-wid-product">
                            <a href=single-product.php?id=' . $product['ProductID'] . '"><img src="'.$image['URL'].'" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php">' . $product['Name'] . '</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>' . $product['Price'] . ' TL</ins> <del>' . $product['Price'] * 1.5 . ' TL</del>
                            </div>
                        </div>';
}
function top_sellers_query() {
    $products = TopSellersQuery(5);
    foreach ($products as $product){
        single_wid_product_func($product);
    }
}
function random_product_query()
{
    $products = RandomProductQuery(5);
    foreach ($products as $product){
        single_wid_product_func($product);
    }
}

function last_product_query()
{
    $products = ProductLastFiveQuery();
    foreach ($products as $product){
        single_wid_product_func($product);
    }
}
