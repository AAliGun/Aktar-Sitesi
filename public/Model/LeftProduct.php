<?php
include '../POST/API.php';

function LeftProduct(): string
{
    $html = '<div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>';

    $products = RandomProductQuery(4);
    foreach ($products as $product) {
        $html .= '<div class="thubmnail-recent">
                            <img src="' . $product['image'] . '" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?id=' . $product['id'] . '">' . $product['name'] . '</a></h2>
                            <div class="product-sidebar-price">
                                <ins>' . $product['price'] . ' TL</ins>
                            </div>
                   </div>';

    }
    $html .= '</div>
            <div class="single-sidebar">
                <h2 class="sidebar-title">Recent Posts</h2>
                <ul>';

    $products = RandomProductQuery(4);
    foreach ($products as $product) {
        $html .= '<li><a href="single-product.php?id=' . $product['id'] . '">' . $product['name'] . '</a></li>';
    }
    $html .= '                </ul>
                    </div>
                </div>';

    return $html;
}

function LeftProductExample() : string
{
    return '<div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

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

