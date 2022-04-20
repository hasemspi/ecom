<?php include("includes/header.php");?>
<?php 
include('Class/functions.php');

session_start();
$loginId = $_SESSION['id'];
//User Email show varibul
$UserEmail = $_SESSION['Email'];

if($loginId == null){
    header('location:index.php');
}
//logout code here
if(isset($_GET['logoutAdmin'])){
    $lotOut = new AdminInfo();
    $lotOut->AdminLogOut();
}

?>
  <body>
	  <div class="fixed-button">
		<a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
		</a>
	  </div>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

        <?php include_once("includes/header-nav.php");?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

             <?php include_once("includes/sidebar-nav.php");?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">

                                    <?php
                                    if($views){
                                        if($views === "dashboard"){
                                            include("view/dashboard-view.php");
                                        }
                                        elseif ($views === "add-cat"){
                                            include ("view/add-category-view.php");
                                        }
                                        elseif($views === "manage-cat"){
                                            include("view/manage-category-view.php");
                                        }
                                        elseif($views ==="add-product"){
                                            include("view/add-product-view.php");
                                        }
                                        elseif($views === "manage-product"){
                                            include("view/manage-product-view.php");
                                        }
                                        elseif($views === "edit-cat"){
                                            include("view/edit_cat_view.php");
                                        }
                                        elseif($views === "edit-produc"){
                                            include("view/edit_product_view.php");
                                        }
                                    }
                                    
                                    ?>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("includes/footer.php");?>