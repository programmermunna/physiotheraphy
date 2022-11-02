<?php include("../include/database.php");
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $id = $_GET['id'];
}
$msg = "$src Has Been Deleted!";
switch ($src) {
    case "disease-all":
      $query = mysqli_query($conn,"DELETE FROM disease WHERE id=$id");
      if($query){ header("location:$src.php?msg=$msg");}
      break;
    case "appointment":
      $query = mysqli_query($conn,"DELETE FROM $src WHERE id=$id");
      if($query){ header("location:$src.php?msg=$msg");}
      break;
    case "ready-mail":
      $query = mysqli_query($conn,"DELETE FROM ready_mail WHERE id=$id");
      if($query){ header("location:$src.php?msg=$msg");}
      break;
    default:
      $msg = "Something is error. Please try again leter";
      header("location:index.php?msg=$msg");
  }




?>