<?php include('common/header.php');?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ready_mail WHERE id=$id"));

if(isset($_POST['submit'])){
    $subject =$_POST['subject'];
    $message =$_POST['message'];
    $row = mysqli_query($conn,"UPDATE ready_mail SET subject='$subject', message='$message' WHERE id=$id");
    if($row){
    $msg = "Successfully Updated";
    header("location:ready-mail-edit.php?id=$id&&msg=$msg");
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
                                            <span class="text">Add Mail Content </span>
                                        </h6>                                        
                                    </div>
                                </div>

                                <div class="dc_box_container">
                                    <div class="input_area">
                                        <label for="current_p">Subject</label>
                                        <input required name="subject" type="text" class="base_input" value="<?php echo $data['subject']?>" />
                                    </div>
                                    <br />

                                    <div class="input_area">
                                        <label for="new_p">Message</label>
                                        <textarea name="message" class="textarea"><?php echo $data['message']?></textarea>
                                    </div>
                                    <br />
                                    <input name="submit" type="submit" class="base_btn" value="Save" />
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
