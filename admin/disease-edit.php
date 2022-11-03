<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM disease WHERE id=$id"));


if(isset($_POST['add_disease'])){
    $name =$_POST['name'];
    $title =$_POST['title'];
    $content =$_POST['content'];
    $status =$_POST['status'];
    
    $url = strtolower($name).".php";

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");

    if(!empty($_FILES['file']['name'])){
        $row = mysqli_query($conn,"UPDATE disease SET name='$name',title='$title',file='$file_name',url='$url',status='$status',content='$content' WHERE id=$id");
    }else{
        $row = mysqli_query($conn,"UPDATE disease SET name='$name',title='$title',url='$url',status='$status',content='$content' WHERE id=$id");
    }

    if($row){
    $msg = "Successfully Create a New disease";
    header("location:disease-edit.php?id=$id&&msg=$msg");
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="dc_box">
                                <div class="dc_box_header">
                                    <div class="dc_box_container">
                                        <h6>

                                            <span class="icon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <span class="text"> disease </span>
                                        </h6>
                                        <?php if(isset($msg)){ ?><div class="alert_info">
                                            <?php if(isset($msg)){echo $msg;}?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <div class="dc_box_container">
                                    <div class="input_area">
                                        <label for="current_p">Thumbnail</label>
                                        <input style="padding-top:10px;" name="file" type="file" class="base_input" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">Disease Name</label>
                                        <input required name="name" type="text" class="base_input" value="<?php echo $row['name']?>" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">Disease Title</label>
                                        <input required name="title" type="text" class="base_input" value="<?php echo $row['title']?>" />
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
                                    
                                    <input name="add_disease" type="submit" class="base_btn" value="Save" />
                                </div>
                            </div>
                        </form>

                        <script>
                        $('#summernote').summernote({
                            placeholder: 'Write here details',
                            tabsize: 2,
                            height: 200,
                            toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                            ]
                        });
                        </script>
                        <!-- ---------------------display box----------------- -->


                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>