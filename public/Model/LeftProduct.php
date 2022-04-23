<?php
$URL = '172.105.73.62';
$PORT = '5000';

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
function RandomProductQuery($count){
    $data = array(
        'count' => $count
    );
    /*Success : {1: {'ProductID': 15, 'Name': 'Tarhun', 'Price': 13.0, 'Content': 'Tarhun açıklaması', 'Stok': 147, 'Category': 'baharat'},
        2: {'ProductID': 14, 'Name': 'Yenibahar', 'Price': 321.0, 'Content': 'Yenibahar açıklaması', 'Stok': 55, 'Category': 'ot'},
        3: {'ProductID': 13, 'Name': 'Zencefil', 'Price': 130.0, 'Content': 'Zencefil açıklaması', 'Stok': 74, 'Category': 'ot'},
        4: {'ProductID': 12, 'Name': 'Beyaz Biber', 'Price': 56.0, 'Content': 'Beyaz Biber açıklaması', 'Stok': 110, 'Category': 'ot'},
        5: {'ProductID': 11, 'Name': 'Nane', 'Price': 74.0, 'Content': 'Nane açıklaması', 'Stok': 85, 'Category': 'ot'}}
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('random_product_query',$data), true);
}
function LeftProduct(): string
{
    $products = RandomProductQuery(4);
    $html = '<div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>';
    foreach ($products as $product) {
        $html .= '<div class="thubmnail-recent">
                        <img src="https://thumbs.dreamstime.com/b/attention-sign-175914219.jpg" class="recent-thumb" alt="">
                        <h2><a href="product.php?id=' . $product['ProductID'] . '">' . $product['Name'] . '</a></h2>
                        <div class="product-sidebar-price">
                            <ins>' . $product['Price'] . ' TL</ins>
                        </div>
                    </div>';
    }
 $html .= '</div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>';
    $posts = RandomProductQuery(4);
    foreach ($posts as $post) {
        $html .= '<li><a href="product.php?id=' . $post['ProductID'] . '">' . $post['Name'] . '</a></li>';
    }
    $html .= '</ul>
                    </div>
                </div>';

    return $html;
}

function LeftProductExample() : string
{
    return '<div class="col-md-4">


                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>';
}

