<?php


function SendPost($url, $data) {
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
function ProductLastFiveQuery(){
    /*Success : {1: {'ProductID': 15, 'Name': 'Tarhun', 'Price': 13.0, 'Content': 'Tarhun açıklaması', 'Stok': 147, 'Category': 'baharat'},
        2: {'ProductID': 14, 'Name': 'Yenibahar', 'Price': 321.0, 'Content': 'Yenibahar açıklaması', 'Stok': 55, 'Category': 'ot'},
        3: {'ProductID': 13, 'Name': 'Zencefil', 'Price': 130.0, 'Content': 'Zencefil açıklaması', 'Stok': 74, 'Category': 'ot'},
        4: {'ProductID': 12, 'Name': 'Beyaz Biber', 'Price': 56.0, 'Content': 'Beyaz Biber açıklaması', 'Stok': 110, 'Category': 'ot'},
        5: {'ProductID': 11, 'Name': 'Nane', 'Price': 74.0, 'Content': 'Nane açıklaması', 'Stok': 85, 'Category': 'ot'}}
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('product_last_five_query',''), true);
}
function ImageQuery($ProductID){
    $data = array(
        'product_id' => $ProductID
    );
    /*Success : {1: {'ProductID': 1, 'URL': 'url1'},
        2: {'ProductID': 1, 'URL': 'url1'},
        3: {'ProductID': 1, 'URL': 'url2'}}
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('image_query',$data), true);
}
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

