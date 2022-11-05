<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM service WHERE id=$id"));


if(isset($_POST['add_service'])){
    $name =$_POST['name'];
    $title =$_POST['title'];
    $content =$_POST['content'];
    $status =$_POST['status'];    
    $url = strtolower($name).".php";

    $row = mysqli_query($conn,"UPDATE service SET name='$name',title='$title',url='$url',status='$status',content='$content' WHERE id=$id");
    if($row){
    $msg = "Successfully Create a New service";
    header("location:service-edit.php?id=$id&&msg=$msg");
    }else{
    echo "Something error!";
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
                                <div class="dc_box_container">
                                    <h6>
                                        <span class="text">Edit Service </span>
                                    </h6>   
                                </div>
                            </div>
                            
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="dc_box_container">
                                    <div class="input_area">
                                        <label for="current_p">service Name</label>
                                        <input required name="name" type="text" class="base_input" value="<?php echo $row['name']?>" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">service Title</label>
                                        <input name="title" type="text" class="base_input" value="<?php echo $row['title']?>" />
                                    </div>
                                    <br />

                                    <div class="input_area">
                                        <label for="new_p">Edit Content</label>
                                        <textarea class="textarea" name="content" id="summernote"><?php echo $row['content']?></textarea>
                                    </div>
                                    <br>
                                    <div class="input_area">
                                        <label for="new_p">Edit Content</label>
                                        <select class="base_input" name="status">
                                        <?php if($row['status']=='Draft'){?>
                                            <option selected value="Draft">Draft</option>
                                            <option value="Publish">Publish</option>
                                        <?php }else{?>
                                            <option value="Draft">Draft</option>
                                            <option selected value="Publish">Publish</option>
                                        <?php }?>
                                        </select>
                                    </div>
                                    <br />                                    
                                    <input name="add_service" type="submit" class="base_btn" value="Save" />
                                </form>
                                <br>
                                <br>
                                <?php
                                if(isset($_POST['add_image'])){
                                    $file_name = $_FILES['file']['name'];
                                    $file_tmp = $_FILES['file']['tmp_name'];
                                    move_uploaded_file($file_tmp,"../upload/$file_name");
                                    $file_insert = mysqli_query($conn,"UPDATE service SET file='$file_name' WHERE id=$id");
                                    if($file_insert){
                                        $msg = "Features Image Uploaded Successfully";
                                        header("location:service-edit.php?id=$id&&msg=$msg");
                                    }


                                }elseif(isset($_POST['remove_image'])){
                                    $remove = mysqli_query($conn,"UPDATE service SET file='' WHERE id=$id");
                                    if($remove){
                                        $msg = "Features Image Removed Successfully";
                                        header("location:service-edit.php?id=$id&&msg=$msg");
                                    }
                                }
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div><img style="width:50%" src="../upload/<?php echo $row['file']?>"></div>                                    
                                    <br>
                                    <div class="input_area">
                                        <label for="current_p">Features Image</label>
                                        <input style="padding-top:10px;" name="file" type="file" class="base_input" />
                                    </div>
                                    <br>
                                    <input name="add_image" type="submit" class="base_btn" value="Add Image" />
                                    <input name="remove_image" type="submit" class="base_btn" value="Remove" />
                                </form>
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
