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

function getProductCard($product,$page) {
    // include '../POST/API.php';

    $images = ImageQuery($product['ProductID']) ?? Array('URL' => '../../public/img/no-image.png');

    $image = $images[1] ?? Array('URL' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/OOjs_UI_icon_alert-warning.svg/1200px-OOjs_UI_icon_alert-warning.svg.png');
    return '<div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="' . $image['URL'] . '" alt="">
                                </div>
                                <h2><a href="single-product.php?id=' . $product['ProductID'] . '">' . $product['Name'] . '</a></h2>
                                <div class="product-carousel-price">
                                    <ins>' . $product['Price'] . ' TL</ins> <del>' . $product['Price'] * 1.5 . ' TL</del>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="POST/AddToCard.php?page=' . $page . '&ProductID=' . $product['ProductID'] . '">Sepete Ekle</a>
                                </div>
                            </div>
                        </div>';
}

//Login

function UserLogin($username, $password) {
    $data = array(
        'user_mail' => $username,
        'user_password' => $password
    );
    $response = SendPost('user_login_query', $data);
    /*Success : "True"
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode($response, true);
}


//Product
function ProductInsert($Name, $Price, $Content, $Stok, $Category){
    $data = array(
        'product_name' => $Name,
        'product_price' => $Price,
        'product_content' => $Content,
        'product_stock' => $Stok,
        'product_category' => $Category
    );
    /*Success : "True"
    Error : "Exception"*/
    return json_decode(SendPost('product_insert',$data), true);
}
function ProductImageInsert($ProductID, $Image){
    $data = array(
        'product_id' => $ProductID,
        'product_image_url' => $Image
    );
    /*Success : "True"
    Error : "Exception"*/
    return json_decode(SendPost('product_image_insert',$data), true);
}
function ProductQuery($ProductID){
    $data = array(
        'product_id' => $ProductID
    );
    /*Success : {'ProductID': 1,
        'Name': 'test',
        'Price': 44.0,
        'Content': 'test açıklama',
        'Stok': 50,
        'Category': 'test category'}
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('product_query',$data), true);
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
function TopSellersQuery($count){
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
    return json_decode(SendPost('top_sellers_query',$data), true);
}
function ProductListQuery($page){
    $data = array(
        'page_number' => $page
    );
    /*Success : {1: {'ProductID': 12, 'Name': 'Beyaz Biber', 'Price': 56.0, 'Content': 'Beyaz Biber açıklaması', 'Stok': 110, 'Category': 'ot'},
            2: {'ProductID': 11, 'Name': 'Nane', 'Price': 74.0, 'Content': 'Nane açıklaması', 'Stok': 85, 'Category': 'ot'},
            3: {'ProductID': 10, 'Name': 'Köri', 'Price': 15.0, 'Content': 'Köri açıklaması', 'Stok': 36, 'Category': 'baharat'},
            4: {'ProductID': 9, 'Name': 'Kakule', 'Price': 90.0, 'Content': 'Kakule açıklaması', 'Stok': 312, 'Category': 'baharat'},
            5: {'ProductID': 8, 'Name': 'Çörek Otu', 'Price': 20.0, 'Content': 'Çörek Otu açıklaması', 'Stok': 80, 'Category': 'ot'},
            6: {'ProductID': 7, 'Name': 'Kekik', 'Price': 45.0, 'Content': 'Kekik açıklaması', 'Stok': 100, 'Category': 'baharat'},
            7: {'ProductID': 6, 'Name': 'Kimyon', 'Price': 70.0, 'Content': 'Kimyon açıklaması', 'Stok': 20, 'Category': 'baharat'},
            8: {'ProductID': 5, 'Name': 'Zerdeçal', 'Price': 40.0, 'Content': 'Zerdeçal açıklaması', 'Stok': 10, 'Category': 'baharat'},
            9: {'ProductID': 4, 'Name': 'Biber', 'Price': 90.0, 'Content': 'Biber açıklaması', 'Stok': 70, 'Category': 'baharat'},
            10: {'ProductID': 3, 'Name': 'Tuz', 'Price': 5.0, 'Content': 'Tuz açıklaması', 'Stok': 20, 'Category': 'baharat'},
            11: {'ProductID': 2, 'Name': 'karabiber', 'Price': 60.0, 'Content': 'karabiber açıklaması', 'Stok': 50, 'Category': 'baharat'},
            12: {'ProductID': 1, 'Name': 'test', 'Price': 44.0, 'Content': 'test açıklama', 'Stok': 50, 'Category': 'test category'}}
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('product_list_query',$data), true);
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
function ProductPriceQuery($ProductID , $count){
    $data = array(
        'product_id' => $ProductID,
        'count' => $count
    );
    /*Success : 180.0
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('product_price_query',$data), true);
}


//User Name, Surname, Email, Phone, Password, City, District, Address, Status
function UserInsert($Name, $Surname, $Email, $Phone, $Password, $City, $District, $Address, $Status){
    $data = array(
        'user_name' => $Name,
        'user_surname' => $Surname,
        'user_mail' => $Email,
        'user_phone' => $Phone,
        'user_pass' => $Password,
        'user_city' => $City,
        'user_district' => $District,
        'user_adress' => $Address,
        'user_status' => $Status
    );
    /*Success : "True"
    Error : "Exception"*/
    return json_decode(SendPost('user_insert',$data), true);
}
function UserQuery($mail){
    $data = array(
        'user_mail' => $mail
    );
    /*Success :
        {'id': 1,
        'Name': 'Yasin',
        'Surname': 'Şahin',
        'Mail': 'yasin@mail.com',
        'Phone': '0541884423',
        'Password': 'test123',
        'City': 'Samsun',
        'District': 'Hançerli mahallesi',
        'Adress': 'Test adres',
        'Status': 2}

    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode(SendPost('user_query',$data), true);
}


//Cart
function CartInsert($UserID, $ProductID, $count){
    $data = array(
        'user_id' => $UserID,
        'product_id' => $ProductID,
        'count' => $count
    );
    /*Success : "True"
    Error : "Exception"*/
    return json_decode(SendPost('cart_insert',$data), true);
}
function CartQuery($UserID){
    $data = array(
        'user_id' => $UserID
    );
    /*Success :
        [{'id': 1,
        'UserID': 1,
        'ProductID': {'ProductID': 2,
                                'Name': 'karabiber',
                                'Price': 60.0,
                                'Content': 'karabiber açıklaması',
                                'Stok': 50,
                                'Category': 'baharat'},
        'Count': 1}
        UnSuccess : "False"
        Error : "Exception"*/
    return json_decode(SendPost('cart_query',$data), true);
}
function CartToOrder($UserID){
    $data = array(
        'user_id' => $UserID
    );

    return json_decode(SendPost('cart_user_procedure',$data), true);
}
//Order
function OrderInsert($UserID, $status){
    $data = array(
        'user_id' => $UserID,
        'status' => $status,
    );
    /*Success : "True"
    Error : "Exception"*/
    return json_decode(SendPost('order_insert',$data), true);
}



