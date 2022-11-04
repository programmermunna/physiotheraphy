<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
if($id<1){
  header('location:index.php');
}
$appointment = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appointment"));
$visitors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM visitors"));
$service = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM service"));
$service_publish = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM service WHERE status='Publish'"));
$service_draft = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM service WHERE status='Draft'"));
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
                    <h6>Dashboard Statistics</h6>
                  </div>
                </div>

                <div class="dc_box_container">
                  <div class="boxes">
                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-cubes-stacked"></i>
                        <span class="value"><?php echo $service;?></span>
                      </div>
                      <div class="title">Total Service</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-cubes-stacked"></i> 
                        </span>
                        <span class="value"><?php echo $service_publish;?></span>
                      </div>
                      <div class="title">Published Service</div>
                    </div>                    

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-cubes-stacked"></i>
                        </span>
                        <span class="value"><?php echo $service_draft;?></span>
                      </div>
                      <div class="title">Draft Service</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value"><?php echo $appointment;?></span>
                      </div>
                      <div class="title">Total Appointment</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value"><?php echo $visitors;?></span>
                      </div>
                      <div class="title">Total Visitors</div>
                    </div>                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include('common/footer.php');?>
      <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>




 