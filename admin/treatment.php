<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
$id = $_GET['id'];
}

$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM treatment WHERE id=$id"));

if(isset($_POST['add_treatment'])){
    $treatment =$_POST['treatment'];
    $url = strtolower($treatment).".php";
    $content =$_POST['content'];
    $status =$_POST['status'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");

    $check = mysqli_query($conn,"SELECT * FROM treatment WHERE content='$content'");
    if($check<1){
    $msg = "Alrady Have Treatment. Please Insert Another";
    header("location:treatment.php?msg=$msg");
    }else{
    $row = mysqli_query($conn,"INSERT INTO treatment(treatment,url,file,status,content) VALUE('$treatment','$url','$file_name','$status','$content')");
    if($row){
    $msg = "Successfully Create a New treatment";
    header("location:treatment.php?msg=$msg");
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
                                            <span class="text"> treatment </span>
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
                                        <label for="current_p">New treatment</label>
                                        <input required name="treatment" type="text" class="base_input" />
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
                                    <input name="add_treatment" type="submit" class="base_btn" value="Post" />

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