<?php
$result = new AdminInfo();




if(isset($_POST['cat_submit'])){
    //$returnMassage = $result->AddCategory($_POST);
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST['cat_name'])){
		$cat_nameEr = "Please Insert Category Name";
	}else{
		$catName = $data['cat_name'];
	}
	if(empty($_POST['cat_des'])){
		$cat_Des = "Please Insert Description Name";
	}else{
		$catDescripion = $data['cat_des'];
	}
}
     $result->AddCategory($_POST);
}

?>


<div class="row">
    <div class="col-md-6">
        <h2>Add Category</h2>
        <?php
  if(isset($returnMassage)){
      ?>
        <div class="alert alert-success" role="alert">
            <?php echo $returnMassage; ?>
        </div>
<?php } ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="cat_name" placeholder="Enter Category Name">
	<span class="alert-danger"><?php echo $cat_nameEr;?></span>
  </div>
  <div class="form-group">
    <label>Category Discription</label>
    <input type="text" class="form-control" name="cat_des" placeholder="EnterCategory Discription">
	<span class="alert-danger"><?php echo $cat_Des;?></span>
  </div>
  <div class="form-group">
    <label>Category Status</label>
    <select class="form-control form-control-lg" name="ctg_status" required>
		<option>Select Option</option>
        <option value="1">Published</option>
        <option value="0">Unpublished</option>
    </select>
  </div>
  <input type="submit" class="btn btn-primary" name="cat_submit" value="Submit">

</form>
</div>
</div>