<?php include('common/header.php');?>
  <main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
      <div class="container">
        <div class="page_content">
          <div class="dashboard_layout">
          <?php include('common/sidebar.php');?>

            <div class="dashboard_content">
            <?php
            if(isset($_GET['page'])){
              $page = $_GET['page'];
            }else{
              $page = 'index.php';
            }
            $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM disease WHERE url ='$page'")); ?> 
              <div class="dc_box">
                <div class="dc_box_header">                  
                  <div class="dc_box_container" style="padding:0;">
                    <img style="width:100%;height:400px;" src="upload/<?php echo $row['file'];?>">
                  </div>
                  <div style="text-align:center;padding:20px 0">
                  <p class="rubik appo_btn">If you want to appoint</p>
                  <a style="margin-left:40px;font-size:20px" class="btn btn-success" href="appointment.php">Appoint Now</a>
                </div>

                </div>
                  <div style="padding:20px;"><h4><?php echo strtoupper($row['title']);?></h4></div>
                  <div style="padding:20px;"><?php echo $row['content'];?></div>                  
              </div>

            </div>
          </div>
        </div>
      </div>

      <?php include('common/footer.php');?>



 