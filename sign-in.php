<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $u_pass = md5($_POST['pass']);
    $u_cpass = md5($_POST['cpass']);
    $time = time();

    $sign_check = "SELECT * FROM admin_info WHERE email='$email'";
    $sign_query = mysqli_query($conn, $sign_check);
    $sign_query = mysqli_fetch_assoc($sign_query);
    if ($sign_query > 0) {
        $msg = "You have an Account! Please login or forgot.";
        header("location:sign-in.php?msg=$msg");
    } else {
            if($u_pass==$u_cpass){
            $insert = "INSERT INTO admin_info(email,pass,role,time) VALUE('$email','$u_pass','User','$time')";
            $insert_query = mysqli_query($conn, $insert);
            if ($insert_query) {
                $sql = "SELECT * FROM admin_info WHERE email='$email' AND pass='$u_pass'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row > 0) {
                    $id = $row['id'];
                      $_SESSION['user_id'] = $id;
                      setcookie('user_id', $id , time()+9999999999);
                    header('location:index.php');
                }
            }
        }else{
            $msg = "Password And Confirm Password are not matched!";
            header("location:sign-in.php?msg=$msg");
        } 
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
                                            <span class="text">Sign In Now</span>
                                        </h6> 
                                    </div>
                            </div>

                            <div class="dc_box_container">
                                
                                <div>
                                    <label for="twitter_p">Email</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-file-signature"></i></span></div>
                                        <input name="email" type="email" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p">Password</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-file-signature"></i></span></div>
                                        <input name="pass" type="password" />
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <label for="twitter_p">Confirm Password</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-file-signature"></i></span></div>
                                        <input name="cpass" type="password" />
                                    </div>
                                </div>
                                <br />
                                <input name="submit" type="submit" class="base_btn" value="Sign In" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
        
