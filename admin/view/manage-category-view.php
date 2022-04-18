<?php
$result = new AdminInfo();
$data = $result->CategorySelect();

if(isset($_GET['status'])){
    $get_id = $_GET['id'];

    if($_GET['status'] == 'unpublish'){
        $result->getcategory_Publish($get_id);
    }elseif($_GET['status'] == 'publish'){
        $result->getcat_unpublish($get_id);
    }elseif($_GET['status'] == 'delete'){
        $mgs = $result->cat_delete($get_id);
    }
    
}

?>

<div class="row">
    <div class="col-md-8">
        <h2>Manage Category</h2>
        <?php if(isset($mgs)){ ?>
        <span class="alert-danger" role="alert"><?php echo $mgs;?></span>
        <?php } ?>
       
 <table class="table table-striped border">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Description</th>
            <th scop="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
        <tbody>
        <?php 
        $i = 0;
        while($row = mysqli_fetch_assoc($data)) { $i++?>
            <tr>
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $row['Cat_Name'];?></td>
            <td><?php echo $row['Cat_description'];?></td>
            <td>

            <?php
            if($row['Cat_Status'] ==0){
                echo "Unpublish";
                ?>
                <a href="?status=unpublish&&id=<?php echo $row['cat_id'];?>" class="btn btn-info">Make Publish</a>
                <?php
            }else{
                echo "Publish";
                ?>
                 <a href="?status=publish&&id=<?php echo $row['cat_id'];?>" class="btn btn-danger"> Make Unpublish</a>
                <?php
            }
            ?>
            </td>
            <td>
            <a href="edit_cat.php?status=edit&&id=<?php echo $row['cat_id'];?>">
                <span><strong>Edit</strong></span>            
            </a>/
            <a href="?status=delete&&id=<?php echo $row['cat_id'];?>" >
                <span><strong>Delete</strong></span>            
            </a>
            </td>
            </tr>
            <?php } ?>
        </tbody>
</table>
    <div>
</div>