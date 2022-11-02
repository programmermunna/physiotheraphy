<?php include('common/header.php');?>
<?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $delete = mysqli_query($conn,"DELETE FROM disease WHERE id=$id");
  if($delete){
    $msg = "disease has been deleted!";
    header("location:disease.php?msg=$msg");
  }else{
  }

?>