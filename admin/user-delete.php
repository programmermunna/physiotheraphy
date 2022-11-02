<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE id='$id'"));
$phone = $user['phone'];
$pass = $user['pass'];

$admin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE phone='$phone' AND pass='$pass'"));
$mod_id = $admin['id'];

$del_mod = mysqli_query($conn,"DELETE FROM admin_info WHERE id='$mod_id'");

    $user = "DELETE FROM user_info WHERE id = $id";
    $user = mysqli_query($conn,$user);
    if($user){
        if(isset($_COOKIE['user_id'])){
            setcookie('user_id',$id, time() - 86000);
        }
        
        if(!session_start()){session_start();}
        if(isset($_SESSION['user_id'])){
            unset($_SESSION['user_id']);
            session_destroy();
        }
        
        $msg = "User has been deleted Successfully!";
        header("location:all-user.php?msg=$msg");
    }

?>