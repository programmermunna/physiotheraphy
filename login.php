<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}


  if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['pass']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM admin_info WHERE email='$email' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $id = $row['id'];
            $_SESSION['user_id'] = $id;
            setcookie('user_id', $id , time()+9999999999);
            $msg = "Welcome! Successfull login.";
            header("location:index.php?msg=$msg");
        } else {
            $msg = "Your Email or password is wrong!";
            header("location:login.php?msg=$msg");
        }
    } else {
        $msg = "Your Email is not validate!";
        header("location:login.php?msg=$msg");
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
                                            <span class="text">Login Now</span>
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
                                <br />
                                <input name="submit" type="submit" class="base_btn" value="Login" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
