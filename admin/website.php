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
    $gmail = $_POST['gmail'];
    $linkedin = $_POST['linkedin'];
    $f_text = $_POST['f_text'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");

    if(empty($file_name)){
        $sql = "UPDATE website SET logo_text='$logo_text', gmail='$gmail', linkedin='$linkedin', f_text='$f_text' WHERE id=1";
    }else{
        $sql = "UPDATE website SET logo='$file_name',logo_text='$logo_text', gmail='$gmail', linkedin='$linkedin', f_text='$f_text' WHERE id=1";
    }
    
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
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                            <span class="text"> Website setting </span>
                                        </h6>
                                    </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="f_name">Logo</label>
                                        <input style="padding-top:10px;" name="file" type="file" class="base_input" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Logo Text</label>
                                        <input name="logo_text" type="text" class="base_input" value="<?php echo $website['logo_text'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                <div class="input_area">
                                        <label for="l_name">Gmail</label>
                                        <input name="gmail" type="text" class="base_input" value="<?php echo $website['logo_text'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Linkedin</label>
                                        <input name="linkedin" type="text" class="base_input" value="<?php echo $website['logo_text'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="smtp_user_name">Footer Text</label>
                                        <input name="f_text" type="text" class="base_input"value="<?php echo $website['f_text'];?>" />
                                    </div>
                                </div>
                                <br />
                                <input name="save" type="submit" class="base_btn"
                                    value="Save" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>