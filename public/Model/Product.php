<?php


function GetProduct($id): string
{

    $product = ProductQuery($id);
    $html = '<div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="../index.php">Ana Sayfa</a>
                            <a href="../shop.php">'.$product['Category'].'</a>
                            <a href="#">'.$product['Name'].'</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="img/product-2.jpg" alt="">
                                    </div>

                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">'.$product['Name'].'</h2>
                                    <div class="product-inner-price">
                                        '.$product['Price'].' TL
                                    </div>

                                    <form action="POST/AddToCard.php" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" readonly title="Qty" value="' . $product['ProductID'] . '" name="ProductID" >
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Sepete Ekle</button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Kategori: <a href="">'.$product['Category'].'</a> </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detay</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Ürün Açıklaması</h2>
                                                <p>'.$product['Content'].'</p>
</div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
    return $html;
}
