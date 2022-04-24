<?php
function ASendPost($url, $data) {
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

function AdminLogin($username, $password) {
    $data = array(
        'admin_mail' => $username,
        'admin_password' => $password
    );
    $response = SendPost('admin_login_query', $data);
    /*Success : "True"
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode($response, true);
}


function ProductInsert($name,$price,$content,$stock,$category){{
    $data = array(
        'product_name' => $name,
        'product_price' => $price,
        'product_content' => $content,
        'product_stock' => $stock,
        'product_category' => $category
    );
    $response = ASendPost('product_insert', $data);
    /*Success : "True"
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode($response, true);
}

function ProductImageInsert($product_id,$image){
    $data = array(
        'product_id' => $product_id,
        'product_image_url' => $image
    );
    $response = ASendPost('product_image_url', $data);
    /*Success : "True"
    UnSuccess : "False"
    Error : "Exception"*/
    return json_decode($response, true);
}


}
