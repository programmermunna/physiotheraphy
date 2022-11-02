<?php include('common/header.php');?>
<?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $delete = mysqli_query($conn,"DELETE FROM treatment WHERE id=$id");
  if($delete){
    $msg = "treatment has been deleted!";
    header("location:treatment.php?msg=$msg");
  }else{
  }

?>