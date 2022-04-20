<?php
$result = new AdminInfo();
$data = $result->CategorySelect();

// if(isset($_FILES['pdt_image'])){
//     echo "<pre>";
//     print_r($_FILES);
//     echo "</pre>";
// }
if(isset($_POST['pdt_btn'])){
    $return_msg = $result->AddProduct($_POST);
}

?>


<h2>Add Product</h2>
<?php 
    if(isset($return_msg)){
        echo $return_msg;
    }
?>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pdt_name">Product Name</label>
        <input type="text" name="pdt_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_price">Product Price</label>
        <input type="number" name="pdt_price" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_des">Product Description</label>
        <textarea class="form-control" name="pdt_des" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Product Category</label>
        <select name="pdt_ctg" class="form-control">
            <option>Please Select a Category</option>
            <?php 
                while($ctg= mysqli_fetch_assoc($data)){
                
            ?>
            <option value="<?php echo $ctg['cat_id']; ?>"><?php echo $ctg['Cat_Name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="pdt_image">Product Image</label>
        <input type="file" name="pdt_image" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_status">Product Status</label>
        <select name="pdt_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input name="pdt_btn" type="submit" value="Add Product" class="btn btn-primary btn-block">
</form>