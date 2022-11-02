<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}

if($id<1){
  header('location:index.php');
}

$ticket = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ticket WHERE refarence !=''"));
$solved = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ticket WHERE solved='true'"));
$treatment = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM treatment"));
$user = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_info"));
$Verified = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_info WHERE nid_verify='Verified'"));
$pending = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_info WHERE nid_front !='' AND gmail_verify !='' AND nid_verify =''"));
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
                        <i class="fa-solid fa-ticket"></i></span>
                        <span class="value"><?php echo $ticket;?></span>
                      </div>
                      <div class="title">Total Ticket</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-ticket-simple"></i> 
                        </span>
                        <span class="value"><?php echo $solved;?></span>
                      </div>
                      <div class="title">Solved Tickets</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-cubes-stacked"></i>
                        </span>
                        <span class="value"><?php echo $treatment;?></span>
                      </div>
                      <div class="title">Total treatment</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value"><?php echo $user;?></span>
                      </div>
                      <div class="title">Total User</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value"><?php echo $pending;?></span>
                      </div>
                      <div class="title">Pending verify</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value"><?php echo $Verified;?></span>
                      </div>
                      <div class="title">Success Verify</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include('common/footer.php');?>



 