<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail WHERE id=1"));

if(isset($_POST['save'])){
  $smtp_host = $_POST['smtp_host'];
  $smtp_port = $_POST['smtp_port'];
  $smtp_user_name = $_POST['smtp_user_name'];
  $smtp_user_pass = $_POST['smtp_user_pass'];
  $smtp_security = $_POST['smtp_security'];
  $site_email = $_POST['site_email'];
  $site_replay_email = $_POST['site_replay_email'];

  $sql = "UPDATE mail SET smtp_host='$smtp_host',smtp_port='$smtp_port',smtp_user_name='$smtp_user_name',smtp_user_pass='$smtp_user_pass',smtp_security='$smtp_security',site_email='$site_email',site_replay_email='$site_replay_email' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated your Profile";
    header("location:mail.php?msg=$msg");
  }else{
    $msg = "Something is wrong!";
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
                                            <span class="text"> Mail setting </span>
                                        </h6>

                                    </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="f_name">Smtp Host</label>
                                        <input name="smtp_host" id="f_name" type="text" class="base_input"
                                            value="<?php echo $mail['smtp_host'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Smtp Port</label>
                                        <input name="smtp_port" id="l_name" type="text" class="base_input"
                                            value="<?php echo $mail['smtp_port'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="smtp_user_name">Smtp Username</label>
                                        <input name="smtp_user_name" id="f_name" type="text" class="base_input"
                                            value="<?php echo $mail['smtp_user_name'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Smtp Password</label>
                                        <input name="smtp_user_pass" id="l_name" type="text" class="base_input"
                                            value="<?php echo $mail['smtp_user_pass'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="f_name">Smtp Security (SSL/TLS)</label>
                                        <input name="smtp_security" id="f_name" type="text" class="base_input"
                                            value="<?php echo $mail['smtp_security'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Site Email</label>
                                        <input name="site_email" id="f_name" type="text" class="base_input"
                                            value="<?php echo $mail['site_email'];?>" />
                                    </div>
                                </div>
                                <br />
                                <div>
                                    <label for="twitter_p">Site Replay Email</label>
                                    <input name="site_replay_email" id="f_name" type="text" class="base_input" 
                                        value="<?php echo $mail['site_replay_email'];?>" />
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
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
