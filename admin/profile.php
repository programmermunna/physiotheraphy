<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}

if(isset($_POST['save'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $logo_text = $_POST['logo_text'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file_name");

  $sql = "UPDATE admin_info SET logo_text='$logo_text',name='$name',phone='$phone',img='$file_name',time=$time WHERE id=$id";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated your Profile";
    header("location:profile.php?msg=$msg");

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
                                            <span class="text"> Admin Setting </span>
                                        </h6>
                                        <?php if(isset($msg)){ ?><div class="alert_info">
                                          <?php if(isset($msg)){echo $msg;}?>
                                          </div>
                                        <?php }?>

                                    </div>
                            </div>

                            <div class="dc_box_container">
                                <div>
                                    <label for="twitter_p"> LOGO TEXT</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-brands fa-drupal"></i>
                                            </span>
                                        </div>
                                        <input name="logo_text" type="text" value="<?php echo $show['logo_text'];?>"
                                            id="twitter_p" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Name</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-file-signature"></i>
                                            </span>
                                        </div>
                                        <input name="name" type="text" value="<?php echo $show['name'];?>"
                                            id="twitter_p" />
                                    </div>
                                </div>
                                <br />
                                <div>
                                    <label for="twitter_p"> Phone</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-phone"></i>
                                            </span>
                                        </div>
                                        <input name="phone" type="text" value="<?php echo $show['phone'];?>"
                                            id="twitter_p" />
                                    </div>
                                </div>
                                <br />
                                <div>
                                    <label for="twitter_p">Photo</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                        <input style="padding-top:10px;" name="file" type="file" required />
                                    </div>
                                </div>
                                <br />
                                <input onclick="alert('Are you sure?')" name="save" type="submit" class="base_btn"
                                    value="Save" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>