<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
}


$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  if(empty($file_name)){
      $sql = "UPDATE admin_info SET name='$name', email='$email' WHERE id = $id";      
    }else{
      $sql = "UPDATE admin_info SET name='$name', email='$email',img='$file_name' WHERE id = $id";
    }

  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Saved";
    header("location:my-account.php?msg=$msg");
  }
}


?>
<main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
        <div class="container">
            <div class="page_content">
                <div class="dashboard_layout">
                    <?php include('common/sidebar.php');?>
                    <div class="dashboard_content">
                        <div class="dc_box">
                            <div class="dc_box_header">

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="icon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <span class="text">My Account</span>
                                        </h6>
                                    </div>
                            </div>

                            <div class="dc_box_container">

                                <div>
                                    <label for="twitter_p"> Name</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-file-signature"></i></span></div>
                                        <input name="name" type="text" value="<?php echo $user['name']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Email</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-envelope"></i></span></div>
                                        <input name="email" type="text" value="<?php echo $user['email']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Photo</label>
                                    <div class="base_input_icon">
                                        <input type="file" name="file" style="margin:0;padding:0;padding-top:10px;padding-left:10px;">
                                    </div>
                                </div>
                                <br />

                                <input name="submit" type="submit" class="base_btn" value="Save" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>