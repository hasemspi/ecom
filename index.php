<?php
include('admin/Class/functions.php');
$result = new AdminInfo();
$row = $result->CategorySelect_with_product();
$product = array();
while($setData = mysqli_fetch_assoc($row)){
    $product[] = $setData;
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
    <div class="page-contain">
    <!-- Main content -->
    <div id="main-content" class="main-content">
        <!--Block 01: Main Slide-->
        <?php include_once('include/main_slider.php'); ?>
        <!--Block 02: Banners-->
        <?php include_once('include/main_banner.php'); ?>
        <!--Block 03: Product Tabs-->
        <?php include_once('include/related_Product.php'); ?>
        <!--Block 06: Products-->
        <?php include_once('include/top_releted_product.php'); ?>
        <!--Block 07: Brands-->
        <?php include_once('include/main_brand.php'); ?>
        <!--Block 08: Blog Posts-->
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