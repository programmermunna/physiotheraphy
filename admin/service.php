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

    $url = str_replace(' ', '-', strtolower($name)).".php"; 
    
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");

    $check = mysqli_query($conn,"SELECT * FROM service WHERE url='$url'");
    if($check<1){
    $msg = "Alrady Have service. Please Insert Another";
    header("location:service.php?msg=$msg");
    }else{
    $row = mysqli_query($conn,"INSERT INTO service(name,title,url,file,status,content) VALUE('$name','$title','$url','$file_name','$status','$content')");
    if($row){
    $msg = "Successfully Create a New service";
    header("location:service.php?msg=$msg");
    }else{
    echo "Something error!";
    }
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
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                            <span class="text"> service </span>
                                        </h6>
                                    </div>
                                </div>

                                <div class="dc_box_container">
                                    <div class="input_area">
                                        <label for="current_p">Thumbnail</label>
                                        <input style="padding-top:10px;" name="file" type="file" class="base_input" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">service Name</label>
                                        <input required name="name" type="text" class="base_input" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="current_p">service Title</label>
                                        <input required name="title" type="text" class="base_input" />
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="new_p">Content</label>
                                        <textarea class="textarea" name="content" id="summernote"></textarea>
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="new_p">Status</label>
                                        <select class="base_input" name="status" id="">
                                            <option value="Draft">Draft</option>
                                            <option value="Publish">Publish</option>
                                        </select>
                                    </div>
                                    <br />
                                    <input name="add_service" type="submit" class="base_btn" value="Post" />

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

                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
