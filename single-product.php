<?php
include('admin/Class/functions.php');
$result = new AdminInfo();
$row = $result->CategorySelect_with_product();
$product = array();
while($setData = mysqli_fetch_assoc($row)){
    $product[] = $setData;
}
if(isset($_GET['status'])){
    $show_id = $_GET['id'];
    
    if($_GET['status']=='single'){
        
        $dataProduct = $result->getsingleProduct($show_id);
        $getData = array();
        while ($showData = mysqli_fetch_assoc($dataProduct)){
            $getData[]=$showData;
            
        }
    }
}
?>

<?php include('include/header.php');?>
<body class="biolife-body">
    <?php include('include/prereloader.php');?>
    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <?php include_once('include/header_top.php');?>
        <?php include_once('include/header_miedal.php');?>
        <?php include('include/header_buttom.php'); ?>
    </header>
    <!-- Page Contain -->
    <!--Hero Section-->
    <div class="hero-section hero-background">
    <?php foreach ($getData as $single){ 
        ?>
        <h1 class="page-title"><?php echo $single['Cat_Name'] ?></h1>
        <?php }?>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <?php foreach ($getData as $single){ 
         ?>
             <li class="nav-item"><a href="index.php" class="permal-link"><?php echo $single['Cat_Name'] ?></a></li>
        <?php }?>
               
            </ul>
        </nav>
    </div>

    <div class="page-contain single-product">
        <div class="container">

            <!-- Main content -->
            <div id="main-content" class="main-content">
                
                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <div class="media">
                        <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                            <li><img src="assets/images/details-product/p01.jpg" alt="" width="500" height="500"></li>
                            <li><img src="assets/images/details-product/p02.jpg" alt="" width="500" height="500"></li>
                            <li><img src="assets/images/details-product/p03.jpg" alt="" width="500" height="500"></li>
                            <li><img src="assets/images/details-product/p06.jpg" alt="" width="500" height="500"></li>
                            <li><img src="assets/images/details-product/p07.jpg" alt="" width="500" height="500"></li>
                        </ul>
                        <ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                            <li><img src="assets/images/details-product/thumb_p01.jpg" alt="" width="88" height="88"></li>
                            <li><img src="assets/images/details-product/thumb_p02.jpg" alt="" width="88" height="88"></li>
                            <li><img src="assets/images/details-product/thumb_p03.jpg" alt="" width="88" height="88"></li>
                            <li><img src="assets/images/details-product/thumb_p06.jpg" alt="" width="88" height="88"></li>
                            <li><img src="assets/images/details-product/thumb_p07.jpg" alt="" width="88" height="88"></li>
                        </ul>
                    </div>
                    <?php foreach ($getData as $product){ ?>
                    <div class="product-attribute">
                        <h3 class="title"><?php echo $product['pdt_name'] ?></h3>
                        <div class="rating">
                            <p class="star-rating"><span class="width-80percent"></span></p>
                            <span class="review-count">(04 Reviews)</span>
                            <span class="qa-text">Q&amp;A</span>
                            <b class="category">By: Natural food</b>
                        </div>
                        <span class="sku">Sku: #76584HH</span>
                        <p class="excerpt"><?php echo $product['pdt_des'] ?></p>
                        <div class="price">
                            <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo $product['pdt_price'] ?> Taka</span></ins>
                        </div>
                        <div class="shipping-info">
                            <p class="shipping-day">3-Day Shipping</p>
                            <p class="for-today">Pree Pickup Today</p>
                        </div>
                    </div>
                <?php } ?>

                    <div class="action-form">
                        <div class="quantity-box">
                            <span class="title">Quantity:</span>
                            <div class="qty-input">
                                <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1" data-step="1">
                                <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="#" class="btn add-to-cart-btn">add to cart</a>
                            <p class="pull-row">
                                <a href="#" class="btn wishlist-btn">wishlist</a>
                                <a href="#" class="btn compare-btn">compare</a>
                            </p>
                        </div>
                        <div class="location-shipping-to">
                            <span class="title">Ship to:</span>
                            <select name="shipping_to" class="country">
                                <option value="-1">Select Country</option>
                                <option value="america">America</option>
                                <option value="france">France</option>
                                <option value="germany">Germany</option>
                                <option value="japan">Japan</option>
                            </select>
                        </div>
                        <div class="social-media">
                            <ul class="social-list">
                                <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="acepted-payment-methods">
                            <ul class="payment-methods">
                                <li><img src="assets/images/card1.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/card2.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/card3.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/card4.jpg" alt="" width="51" height="36"></li>
                            </ul>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
<br>
    
    <!-- FOOTER -->
    <footer id="footer" class="footer layout-03">
        <div class="footer-content background-footer-03">
            <div class="container">
                <?php include_once('include/footer_top.php'); ?>
                <?php include_once('include/footer_button.php'); ?>
            </div>
        </div>
    </footer>
    <!--Footer For Mobile-->
    <?php include_once('include/mobile_footer.php'); ?> 
    <?php include_once('include/footer_script.php'); ?> 
</body>

</html>