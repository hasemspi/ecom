<?php
$result = new AdminInfo();

if(isset($_GET['status'])){
    $get_id = $_GET['id'];
    if($_GET['status']=='edit'){
       $return_data = $result->EditCate($get_id);
    }
}
if(isset($_POST['u_ctg_btn'])){
    $return_msg = $result->update_category($_POST);
}


?>
<form action="" method="post">
<?php
if(isset($return_msg)){
    echo $return_msg;
}
?>

<div class="form-group">
        <input hidden type="text" name="u_ctg_id" class="form-control" value="<?php echo $return_data['cat_id']; ?>">
    </div>

    <div class="form-group">
        <label for="u_ctg_name">Category Name</label>
        <input type="text" name="u_ctg_name" class="form-control" value="<?php echo $return_data['Cat_Name']; ?>">
    </div>
    <div class="form-group">
        <label for="u_ctg_des">Category Description</label>
        <input type="text" name="u_ctg_des" class="form-control" value="<?php echo $return_data['Cat_description']; ?>">
    </div>
    <input type="submit" value="Update Category" name="u_ctg_btn" class="btn btn-primary">

</form>