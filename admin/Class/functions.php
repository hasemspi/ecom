<?php
class AdminInfo{

    private $conn;

public function __construct(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "ecom_db";
    $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$this->conn){
        die("Database Connection is not sucessfully");
    }
}
public function logininfo($data){

    $Email = $data['Email'];
    $Password = md5($data['Password']);
    $query = "SELECT * FROM login WHERE Email = '$Email' AND Password = '$Password'";
    
    if(mysqli_query($this->conn,$query)){
        $result = mysqli_query($this->conn,$query);
        $login_info = mysqli_fetch_assoc($result);
    }
    if($login_info){
        header('location:dashboard.php');
        session_start();
        $_SESSION['id'] = $login_info['user_id'];
        $_SESSION['Email'] = $login_info['Email'];
        $_SESSION['Password'] = $login_info['Password'];
    }else{
        $remas = "Your username or Password is incorrect!";
        return $remas;
    }

}
public function AdminLogOut(){
    unset($_SESSION['id']);
    unset($_SESSION['Email']);
    unset($_SESSION['Password']);
    header('location:index.php');
}
public function AddCategory($data){
    $catName = $data['cat_name'];
    $catDescripion = $data['cat_des'];
    $cat_status =   $data['ctg_status'];

$query = "INSERT INTO `category`(`Cat_Name`, `Cat_description`, `Cat_Status`) VALUES ('$catName','$catDescripion','$cat_status')";

if(mysqli_query($this->conn,$query)){
    $meassage = "Add Category Is Sucessfully";
    return $meassage;
}else{
    $meassage = "Add Category Not Sucessfully";
    return $meassage;
}
}

public function CategorySelect(){
    $query = "SELECT * FROM category";
    if(mysqli_query($this->conn,$query)){
        $result = mysqli_query($this->conn,$query);
        return $result;
    }
}

public function getcategory_Publish($id){
    $publish = "UPDATE `category` SET `Cat_Status`= 1 WHERE cat_id=$id";
    if(mysqli_query($this->conn, $publish)){
        $publisss =mysqli_query($this->conn, $publish);
        return $publisss;
    }
}
public function getcat_unpublish($id){
    $unpublis = "UPDATE `category` SET `Cat_Status`=0 WHERE cat_id=$id";
    if(mysqli_query($this->conn, $unpublis)){
        $publisss =mysqli_query($this->conn, $unpublis);
        return $unpublis;
    }
}
public function cat_delete($id){
    $delte = "DELETE FROM `category` WHERE cat_id =$id";
    if(mysqli_query($this->conn,$delte)){
        $mgs = "Data has been Delete sucessfully";
        return $mgs;
    }
}
public function EditCate($id){
  $sql = "SELECT * FROM `category` WHERE cat_id = $id";

  if(mysqli_query($this->conn,$sql)){
      $result = mysqli_query($this->conn,$sql);
      $row = mysqli_fetch_assoc($result);
      return $row;
  }

}
public function update_category(){
    $ctg_id     = $_POST['u_ctg_id'];
    $u_ctg_name = $_POST['u_ctg_name'];
    $u_ctg_des  = $_POST['u_ctg_des'];
    $sql = "UPDATE `category` SET `Cat_Name`='$u_ctg_name',`Cat_description`='$u_ctg_des' WHERE cat_id = $ctg_id";
    if(mysqli_query($this->conn,$sql)){
        $return_msg = "Category Updated Successfully!";
        return $return_msg;
    }

}
public function AddProduct($data){
    $pdt_name = $data['pdt_name'];
    $pdt_price = $data['pdt_price'];
    $pdt_des = $data['pdt_des'];
    $pdt_ctg = $data['pdt_ctg'];
    $img_name = $_FILES['pdt_image']['name'];
    $pdt_tem = $_FILES['pdt_image']['tmp_name'];
    $pdt_size = $_FILES['pdt_image']['size'];
    $pdf_ext = pathinfo($img_name,PATHINFO_EXTENSION);
    $pdt_status = $data['pdt_status'];

    if($pdf_ext == 'jpg' or $pdf_ext== 'png' or $pdf_ext== 'jpeg'){

        if($pdt_size <=2097152){

            $sql = "INSERT INTO `products`(`pdt_name`, `pdt_price`, `pdt_des`, `pdt_ctg`, `pdt_img`, `pdt_status`) VALUES 
            ('$pdt_name','$pdt_price','$pdt_des','$pdt_ctg','$img_name','$pdt_status')";

            if(mysqli_query($this->conn,$sql)){
                move_uploaded_file($pdt_tem,'upload/'.$pdt_name);
                $msg = "Product Added Successfully!";
                return $msg;
            }
        }else{
            $msg = "Your File Size Should Be Less or Equal 2 MB!";
        }
    }else{
        $msg = "Your File Must Be a JPG or PNG File!";
        return $msg;
    }
}
public function ManageSelectProduct(){
    $sql = "SELECT a.pdt_id ,a.pdt_name,a.pdt_price,a.pdt_des,a.pdt_img,a.pdt_status,b.Cat_Name
    FROM `products` a
    INNER JOIN category AS b ON a.pdt_ctg = b.cat_id
    ORDER BY b.Cat_Name;";
    
    if(mysqli_query($this->conn,$sql)){
        $result = mysqli_query($this->conn,$sql);
        return $result;
    }
}



public function delete_product($id){
    $sql = "DELETE FROM `products` WHERE pdt_id=$id";
    if(mysqli_query($this->conn,$sql)){
        $result = "Delete is sucessfully";
        return $result;
    }
}
public function Edit_product($id){
    $sql = "SELECT * FROM `products` WHERE pdt_id = $id";

    if(mysqli_query($this->conn,$sql)){
        $result = mysqli_query($this->conn,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
  
  }


public function update_product($id){
    $pdt_name = $_POST['U_pdt_name'];
    $pdt_price = $_POST['U_pdt_price'];
    $pdt_des = $_POST['U_pdt_des'];
    $pdt_ctg = $_POST['U_pdt_ctg'];
    $img_name = $_FILES['U_pdt_image']['name'];
    $pdt_tem = $_FILES['U_pdt_image']['tmp_name'];
    $pdt_size = $_FILES['U_pdt_image']['size'];
    $pdf_ext = pathinfo($img_name,PATHINFO_EXTENSION);
    $pdt_status = $_POST['U_pdt_status'];
    $pdt_id = $_POST['u_pdt_id'];

    if($pdf_ext == 'jpg' or $pdf_ext== 'png' or $pdf_ext== 'jpeg'){

        if($pdt_size <=2097152){

            $sql = "UPDATE `products` SET `pdt_name`='$pdt_name',`pdt_price`='$pdt_price',`pdt_des`='$pdt_des',
            `pdt_img`='$img_name',`pdt_status`='$pdt_status',`pdt_ctg`='$pdt_ctg' WHERE pdt_id=$pdt_id";
            if(mysqli_query($this->conn,$sql)){
                move_uploaded_file($pdt_tem,'upload/'.$pdt_name);
                $msg = "Product Added Successfully!";
                return $msg;
            }
        }else{
            $msg = "Product Update is sucessfully";
        }
    }else{
        $msg = "Your File Must Be a JPG or PNG File!";
        return $msg;
    }
   }
}

?>