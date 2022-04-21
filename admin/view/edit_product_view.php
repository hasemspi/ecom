<?php
$result = new AdminInfo();
$data = $result->CategorySelect_with_product();
if(isset($_GET['prostatus'])){
    $pdt_id = $_GET['id'];
    if($_GET['prostatus'] =='edit'){
       $row = $result->Edit_product($pdt_id);

    }
}
if(isset($_POST['Update'])){
    $mas = $result->update_product($_POST);
}
?>
<h1>Edit Product Page</h1>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <?php
    if(isset($mas)){
        echo $mas;
    }
    ?>
    <div class="form-group">
        <input hidden type="text" name="u_pdt_id" class="form-control" value="<?php echo $row['pdt_id']; ?>">
    </div>
    <div class="form-group">
        <label for="pdt_name">Product Name</label>
        <input type="text" name="U_pdt_name" value="<?php echo $row['pdt_name'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_price">Product Price</label>
        <input type="number" name="U_pdt_price" value="<?php echo $row['pdt_price'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_des">Product Description</label>
        <textarea class="form-control" name="U_pdt_des" rows="3" ><?php echo $row['pdt_des'];?></textarea>
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Product Category</label>
        <select name="U_pdt_ctg" class="form-control">
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
        <input type="file" name="U_pdt_image" value="<?php echo $row['pdt_ctg'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_status">Product Status</label>
        <select name="U_pdt_status" value="<?php echo $row['pdt_status'];?>" class="form-control">
       
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input name="Update" type="submit" value="Update Product" class="btn btn-primary btn-block">
</form>