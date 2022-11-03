<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website WHERE id=1"));

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $logo_text = $_POST['logo_text'];
    $gmail = $_POST['gmail'];
    $facebook = $_POST['facebook'];
    $youtube = $_POST['youtube'];
    $linkedin = $_POST['linkedin'];
    $f_text = $_POST['f_text'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");

    $favicon_name = $_FILES['favicon']['name'];
    $favicon_tmp = $_FILES['favicon']['tmp_name'];
    move_uploaded_file($favicon_tmp,"../upload/$favicon_name");

    if(empty($file_name)){
        $sql = "UPDATE website SET favicon='$favicon_name',title='$title',logo_text='$logo_text', gmail='$gmail', facebook='$facebook', youtube='$youtube', linkedin='$linkedin', f_text='$f_text' WHERE id=1";
    }elseif(empty($favicon_name)){
        $sql = "UPDATE website SET logo='$file_name',title='$title',logo_text='$logo_text', gmail='$gmail', facebook='$facebook', youtube='$youtube', linkedin='$linkedin', f_text='$f_text' WHERE id=1";
    }elseif(empty($favicon_name) || empty($file_name)){
        $sql = "UPDATE website SET title='$title',logo_text='$logo_text', gmail='$gmail', facebook='$facebook', youtube='$youtube', linkedin='$linkedin', f_text='$f_text' WHERE id=1";
    }else{
        $sql = "UPDATE website SET favicon='$favicon_name',title='$title',logo='$file_name',logo_text='$logo_text', gmail='$gmail', facebook='$facebook', youtube='$youtube', linkedin='$linkedin', f_text='$f_text' WHERE id=1";
    }
    
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated your Profile";
    header("location:website.php?msg=$msg");
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
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                            <span class="text"> Website setting </span>
                                        </h6>
                                    </div>
                            </div>

                            <div class="dc_box_container">

                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label>Favicon</label>
                                        <input style="padding-top:10px;" name="favicon" type="file" class="base_input" />
                                    </div>
                                    <div class="input_area">
                                        <label>Logo</label>
                                        <input style="padding-top:10px;" name="file" type="file" class="base_input" />
                                    </div>
                                </div>
                                <br>                                
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label>Title</label>
                                        <input name="title" type="text" class="base_input" value="<?php echo $website['title'];?>" />

                                    </div>
                                    <div class="input_area">
                                        <label>Logo Text</label>
                                        <input name="logo_text" type="text" class="base_input" value="<?php echo $website['logo_text'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label>Gmail</label>
                                        <input name="gmail" type="text" class="base_input" value="<?php echo $website['gmail'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label>Facebook</label>
                                        <input name="facebook" type="text" class="base_input" value="<?php echo $website['facebook'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label>Youtube</label>
                                        <input name="youtube" type="text" class="base_input" value="<?php echo $website['youtube'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label>Linkedin</label>
                                        <input name="linkedin" type="text" class="base_input" value="<?php echo $website['linkedin'];?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <labelfor="smtp_user_name">Footer Text</labelfor=>
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
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
