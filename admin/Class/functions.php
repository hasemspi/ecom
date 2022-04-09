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

}

?>