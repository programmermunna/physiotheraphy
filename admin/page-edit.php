<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM page WHERE id=$id"));


if(isset($_POST['add_page'])){
    $title =$_POST['title'];
    $content =$_POST['content'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");

    if(!empty($_FILES['file']['name'])){
        $row = mysqli_query($conn,"UPDATE page SET title='$title',img='$file_name',content='$content' WHERE id=$id");
    }else{
        $row = mysqli_query($conn,"UPDATE page SET title='$title',content='$content' WHERE id=$id");
    }

    if($row){
    $msg = "Successfully Create a New page";
    header("location:page-edit.php?id=$id&&msg=$msg");
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
                                        <span class="text">Edit Page </span>
                                    </h6>
                                </div>
                            </div>
                            
                            <div class="dc_box_container">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="input_area">
                                        <label for="current_p">Feather Image</label>
                                        <input style="padding-top:10px;" name="file" type="file" class="base_input" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">Page Name</label>
                                        <input disabled name="name" type="text" class="base_input" value="<?php echo $row['name']?>" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">Page Title</label>
                                        <input name="title" type="text" class="base_input" value="<?php echo $row['title']?>" />
                                    </div>
                                    <br />

                                    <div class="input_area">
                                        <label for="new_p">Edit Content</label>
                                        <textarea class="textarea" name="content" id="summernote"><?php echo $row['content']?></textarea>
                                    </div>
                                    <br>
                                    
                                    <input name="add_page" type="submit" class="base_btn" value="Save" />
                                </form>
                                <br>
                                <?php
                                if(isset($_POST['remove_image'])){
                                    $remove = mysqli_query($conn,"UPDATE page SET img='' WHERE id=$id");
                                    if($remove){
                                        $msg = "Features Image Removed Successfully";
                                        header("location:page-edit.php?id=$id&&msg=$msg");
                                    }
                                }
                                ?>
                                <form action="" method="POST">
                                    <div><img style="width:50%" src="../upload/<?php echo $row['img']?>"></div>                                    
                                    <br>
                                    <br>
                                    <label for="current_p">Remove Features Image</label>
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
