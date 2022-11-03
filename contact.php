<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}

$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail WHERE id=1"));
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $time = time();
  
  $headers = 'From: '.$email;    
  $to = $mail['site_replay_email'];
  $send = mail($to, $subject, $message, $headers);

  if($send){
    $msg = "Send Message Successfully";
    header("location:contact.php?msg=$msg");
  }else{
    $msg = "Something is wrong!";
    header("location:contact.php?msg=$msg");
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
                                            <span class="text"> Contact Us </span>
                                        </h6>

                                    </div>
                            </div>

                            <div class="dc_box_container">

                                <div>
                                    <label for="twitter_p"> Name</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-file-signature"></i>
                                            </span>
                                        </div>
                                        <input name="name" type="text" />
                                    </div>
                                </div>
                                <br />                                
                                <div>
                                    <label for="twitter_p"> Email</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input name="email" type="email" />
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <label for="twitter_p"> Subject</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-at"></i>
                                            </span>
                                        </div>
                                        <input name="subject" type="text" />
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <label for="twitter_p">Message</label>
                                    <div class="base_input_icon">
                                        <textarea name="message" class="textarea"></textarea>
                                    </div>
                                </div>
                                <br />
                                <input name="submit" type="submit" class="base_btn"
                                    value="Send Message" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
