<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
  }
$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website WHERE id=1"));

if(isset($_POST['save'])){
    $logo_text = $_POST['logo_text'];
    $f_text = $_POST['f_text'];
    $ticket_time = $_POST['ticket_time'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $youtube = $_POST['youtube'];
    $linkedin = $_POST['linkedin'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");
    
  $sql = "UPDATE website SET logo_text='$logo_text',f_text='$f_text',ticket_time='$ticket_time',facebook='$facebook',twitter='$twitter',youtube='$youtube',linkedin='$linkedin',logo='$file_name' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated your Profile";
    header("location:website.php?msg=$msg");
  }else{
    $msg = "Something is wrong!";
  }
}
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
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
                                            <span class="text"> Website setting </span>
                                        </h6>
                                        <?php if(isset($msg)){ ?><div class="alert_info">
                                            <?php if(isset($msg)){echo $msg;}?>
                                        </div>
                                        <?php }?>

                                    </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="f_name">Logo Image</label>
                                        <input style="padding-top:10px;" name="file" id="f_name" type="file" class="base_input"
                                            value="<?php echo $website['logo'];?>" required />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Logo Text</label>
                                        <input name="logo_text" id="l_name" type="text" class="base_input"
                                            value="<?php echo $website['logo_text'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="smtp_user_name">Footer Text</label>
                                        <input name="f_text" id="f_name" type="text" class="base_input"
                                            value="<?php echo $website['f_text'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="l_name">Phone</label>
                                        <input name="facebook" id="l_name" type="text" class="base_input"value="<?php echo $website['facebook'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Email</label>
                                        <input name="facebook" id="l_name" type="text" class="base_input"value="<?php echo $website['facebook'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Whats'app</label>
                                        <input name="facebook" id="l_name" type="text" class="base_input"value="<?php echo $website['facebook'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Messanger</label>
                                        <input name="facebook" id="l_name" type="text" class="base_input"value="<?php echo $website['facebook'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Facebook Page</label>
                                        <input name="facebook" id="l_name" type="text" class="base_input"value="<?php echo $website['facebook'];?>" />
                                    </div>
                                    <div class="input_area">
                                    <label for="twitter_p">Linkedin</label>
                                    <input name="linkedin" id="f_name" type="text" class="base_input" 
                                        value="<?php echo $website['linkedin'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="f_name">Twitter</label>
                                        <input name="twitter" id="f_name" type="text" class="base_input"
                                            value="<?php echo $website['twitter'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="f_name">Instagram</label>
                                        <input name="twitter" id="f_name" type="text" class="base_input"
                                            value="<?php echo $website['twitter'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="f_name">Viber</label>
                                        <input name="twitter" id="f_name" type="text" class="base_input"
                                            value="<?php echo $website['twitter'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Youtube</label>
                                        <input name="youtube" id="f_name" type="text" class="base_input"
                                            value="<?php echo $website['youtube'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Address</label>
                                        <input name="youtube" id="f_name" type="text" class="base_input"
                                            value="<?php echo $website['youtube'];?>" />
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