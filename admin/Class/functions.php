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

}

?>