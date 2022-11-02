<?php include('common/header.php');?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$ready_mail = mysqli_query($conn,"SELECT * FROM ready_mail");

if(isset($_POST['submit'])){    

$subject = $_POST['subject'];



$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail WHERE id=1"));
$appointment = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM appointment WHERE id=$id"));
$email =  $appointment['email'];

$smtp_host = $mail['smtp_host'];
$smtp_username = $mail['smtp_user_name'];
$smtp_password = $mail['smtp_user_pass'];
$smtp_port = $mail['smtp_port'];
$smtp_secure = $mail['smtp_security'];
$site_email = $mail['site_email'];
$site_name = $mail['site_replay_email'];

$address = $email;
$body = $message;
$subject = 'Your warranty has been Received';
$send = sendVarifyCode($smtp_host,$smtp_username,$smtp_password,$smtp_port,$smtp_secure,$site_email,$site_name,$address,$body,$subject);

$msg = 'Your Mail was sent successfully.';
header("location:pending-status.php?msg=$msg");

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
                                            <span class="text"> Send Mail </span>
                                        </h6>
                                    </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="input_area">
                                    <label for="current_p">Subject</label>
                                    <input name="subject" type="text" class="base_input" />
                                </div>
                                <br>
                                <div class="input_area"> 
                                    <label for="current_p">Message</label>
                                    <textarea class="textarea"></textarea>
                                </div>
                                <br>
                                <h5>OR</h5>
                                <br>
                                <div>
                                    <label for="twitter_p"> Select Text</label>
                                    <div class="base_input_icon">
                                        <select class="base_input" name="select">
                                            <option selected value="">Select Ready Message</option>      
                                        <?php 
                                            while($data = mysqli_fetch_assoc($ready_mail)){ ?>
                                            <option value="<?php echo $data['subject']?>"><?php echo $data['subject']?></option>
                                        <?php }?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <input name="submit" type="submit" class="base_btn"
                                    value="Send" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>