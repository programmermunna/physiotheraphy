<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}

if($id<1){
  header('location:index.php');
}

$treatment = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM treatment"));
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
                        <span class="value">aaaa</span>
                      </div>
                      <div class="title">Total Ticket</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-ticket-simple"></i> 
                        </span>
                        <span class="value">bbb</span>
                      </div>
                      <div class="title">Solved Tickets</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-cubes-stacked"></i>
                        </span>
                        <span class="value">ccc</span>
                      </div>
                      <div class="title">Total treatment</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value">ddd</span>
                      </div>
                      <div class="title">Total User</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value">eee</span>
                      </div>
                      <div class="title">Pending verify</div>
                    </div>

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                        <i class="fa-solid fa-people-group"></i>
                        </span>
                        <span class="value">fff</span>
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



 