<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<?php include 'Model/Head.php'; ?>
<body>
<?php include 'Model/Navbar.php';
echo getNavbar("shop.php")?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Ürünler</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php
                $page = $_GET['page'] ?? 1;
                // include 'Model/ProductCard.php';
                $products = ProductListQuery($page);
                foreach ($products as $product ){
                    echo getProductCard($product,$page);
                }
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="shop.php?page=<?php echo ($page-1)?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="shop.php?page=1">1</a></li>
                            <li><a href="shop.php?page=2">2</a></li>
                            <li>
                              <a href="shop.php?page=<?php echo ($page+1)?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'Model/Footer.php';
    include 'Model/Scripts.php'
    ?>
  </body>
</html>
