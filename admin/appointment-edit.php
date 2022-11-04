<?php include('common/header.php');?>
<?php 


if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM appointment WHERE id=$id"));

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $message = $_POST['message'];
  $date = $_POST['date'];
  $time = time();  

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  if(empty($file_name)){
    $sql = "UPDATE appointment SET `name` = '$name', `phone` = '$phone', `email` = '$email', `address` = '$address', `message` = '$message', `date` = '$date', `time` = '$time' WHERE id = $id";
  }else{
    $sql = "UPDATE appointment SET `name` = '$name', `phone` = '$phone', `email` = '$email', `address` = '$address', `message` = '$message', `date` = '$date', `time` = '$time', `file` = '$file_name' WHERE id = $id";
  }
  
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:appointment-edit.php?id=$id&&msg=$msg");
  }else{
    echo "somethig is wrong";
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
                                            <span class="text">Appointment</span>
                                        </h6> 
                                    </div>
                            </div>

                            <div class="dc_box_container">

                                <div>
                                    <label for="twitter_p"> Name</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-file-signature"></i></span></div>
                                        <input name="name" type="text" value="<?php echo $data['name']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Phone</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-phone"></i></span></div>
                                        <input name="phone" type="text" value="<?php echo $data['phone']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Email</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-envelope"></i></span></div>
                                        <input name="email" type="text" value="<?php echo $data['email']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Address</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-solid fa-location-dot"></i></span></div>
                                        <input name="address" type="text" value="<?php echo $data['address']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Date</label>
                                    <div class="base_input_icon">
                                        <div class="icon"><span><i class="fa-regular fa-calendar"></i></span></div>
                                        <input name="date" type="date" value="<?php echo $data['date']?>" />
                                    </div>
                                </div>
                                <br />

                                <div>
                                    <label for="twitter_p"> Note</label>
                                    <div class="base_input_icon">
                                        <textarea name="message" class="textarea"><?php echo $data['message']?></textarea>
                                    </div>
                                </div>
                                <br />  

                                <div>
                                    <label for="twitter_p"> Photo</label>
                                    <div class="base_input_icon">
                                        <input type="file" name="file" style="margin:0;padding:0;padding-top:10px;padding-left:10px;">
                                    </div>
                                </div>
                                <br />   

                                <input name="submit" type="submit" class="base_btn" value="Save" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
