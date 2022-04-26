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
    if($_GET['status']=='cat_show'){
        $dataProduct = $result->getcatshowProducts($show_id);
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
    <?php foreach ($getData as $single){ ?>
        <h1 class="page-title"><?php echo $single['Cat_Name'] ?></h1>
        <?php }?>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="#" class="permal-link">Natural Organic</a></li>
                <li class="nav-item"><span class="current-page">Fresh Fruit</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="product-category grid-style">
                        <div class="row">
                            <ul class="products-list">
                            <?php foreach ($getData as $rows){ 
                                                             
                                ?>
                                
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="single-product.php?status=single&&id=<?php echo $rows['pdt_id'];?>" class="link-to-product">
                                                <img src="admin/upload/<?php echo $rows['pdt_img'] ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories"><?php echo $rows['Cat_Name'] ?></b>
                                            <h4 class="product-title"><a href="#" class="pr-name"> <?php echo $rows['pdt_name'] ?></a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">$</span><?php echo $rows['pdt_price'] ?></span></ins>
                                                
                                            </div>
                                            <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Pree Pickup Today</p>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message"><?php echo $rows['pdt_des'] ?></p>
                                                <div class="buttons">
                                                    <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                    <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                    <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <li><span class="current-page">1</span></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><span class="sep">....</span></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    
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