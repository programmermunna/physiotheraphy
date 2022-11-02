<?php include('common/header.php');?>
<?php 
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
 $id = $show['id'];
 $oldpass = $show['pass'];

if(isset($_POST['change_pass'])){
  $crpass =md5($_POST['crpass']);
  $pass =md5($_POST['pass']);
  $cpass =md5($_POST['cpass']);

  if($crpass==$oldpass){
    if($pass==$cpass){
      $row = mysqli_query($conn,"UPDATE admin_info SET pass='$pass' WHERE id=$id");
      if($row){
        $msg = "Successfully Changed your Password";
        header("location:security.php?msg=$msg");

      }else{
        $msg = "Something worng. Please try again!";
      }
    }else{
      $msg = "Your Password and confirm password not same";
    }
  }else{
    $msg = "Current Password not found!";
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
                <form action="" method="POST">
                <div class="dc_box">
                  <div class="dc_box_header">
                    <div class="dc_box_container">
                      <h6>
                        
                        <span class="icon">
                          <i class="fa fa-user"></i>
                        </span>
                        <span class="text"> Change Password </span>
                      </h6>


                      <?php if(isset($msg)){ ?><div class="alert_info">
                      <?php if(isset($msg)){echo $msg;}?>
                      </div>
                    <?php }?>

                    </div>
                  </div>

                  <div class="dc_box_container">
                    <div class="input_area">
                      <label for="current_p">Current Password</label>
                      <input
                        required
                        name="crpass"
                        id="current_p"
                        type="password"
                        class="base_input"
                        placeholder="Current Password"
                      />
                    </div>
                    <br />

                    <div class="input_area">
                      <label for="new_p">New Password</label>
                      <input
                        required
                        name="pass"
                        id="new_p"
                        type="password"
                        class="base_input"
                        placeholder="New Password"
                      />
                    </div>
                    <br />
                    <div class="input_area">
                      <label for="confirm_p">Confirm Password</label>
                      <input
                        required
                        name="cpass"
                        id="confirm_p"
                        type="password"
                        class="base_input"
                        placeholder="Confirm Password"
                      />
                    </div>
                    <br />

                    <input name="change_pass" type="submit" class="base_btn" value="Save" />
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php include('common/footer.php');?>