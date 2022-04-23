<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <?php include 'Model/Head.php';?>
  <body>
  <?php include 'Model/Navbar.php';
  echo getNavbar("index.php")?>


    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/h4-slide.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Şimdi Al</a>
						</div>
					</li>
					<li><img src="img/h4-slide2.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Kara Biber <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">bitkilerin meyvelerinin kurutulup...</h4>
							<a class="caption button-radius" href="#2"><span class="icon"></span>Şimdi Al</a>
						</div>
					</li>
					<li><img src="img/h4-slide3.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Şimdi Al</a>
						</div>
					</li>
					<li><img src="img/h4-slide7.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Çörek Otu
							</h2>
							<h4 class="caption subtitle">Çörek ve OT</h4>
							<a class="caption button-radius" href="#8"><span class="icon"></span>Şimdi Al</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>İade Garantili</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Ücretsiz Kargo</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Güvenli Ödeme</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Yeni Ürünler</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Yeni Ürünler</h2>
                        <div class="product-carousel">
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/Model/LastFiveProduct.php');
                            echo GetLastFiveProduct();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->



    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">En Çok Satanlar</h2>
                        <a href="" class="wid-view-more">Gör</a>
                        <?php include 'Model/single-wid-product.php';
                        top_sellers_query();?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Önerilen Ürünler</h2>
                        <a href="#" class="wid-view-more">Gör</a>
                        <?php random_product_query(); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Son Ürünler</h2>
                        <a href="#" class="wid-view-more">Gör</a>
                        <?php last_product_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

    <?php
    include 'Model/Footer.php';
    include 'Model/Scripts.php'
    ?>



  </body>
</html>
