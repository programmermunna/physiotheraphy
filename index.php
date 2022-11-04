<?php include('common/header.php');?>


<?php

$ip = $_SERVER['REMOTE_ADDR'];
$check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM visitors WHERE visitor='$ip'"));
if($check<1){
    $visitors = mysqli_query($conn,"INSERT INTO visitors(visitor) VALUE('$ip')");
}
// $visitors = mysqli_query($conn,"UPDATE visitors SET visitor=visitor+1 WHERE id=1;");

?>
<main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
        <div class="container">
            <div class="page_content">
                <div class="dashboard_layout">
                    <?php include('common/sidebar.php');?>

                    <div class="dashboard_content">
                        <?php
                          $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM page WHERE id=1")); ?>
                          <div class="dc_box">
                            <div class="dc_box_header">
                                <?php 
                                if(empty($row['img'])){}else{?>
                                <div class="dc_box_container" style="padding:0;">
                                    <img style="width:100%;height:300px;" src="upload/<?php echo $row['img'];?>">
                                </div>
                                <div style="text-align:center;padding:20px 0;background:#93d5fbba;">
                                    <h6 style="display:inline-block;">If You Want To Appointmen</h6>
                                    <a class="btn btn-success appoint_btn" href="appointment.php">Appoint Now</a>
                                    <a class="btn call_btn" href="tel:<?php echo $website['phone']?>">Call Now <?php echo $website['phone']?></a>
                                </div>
                                <?php }?>
                            </div>
                            <?php if(empty($row['title'])){}else{?>
                            <div style="padding:20px;padding-bottom:0"><h4><?php echo strtoupper($row['title']);?></h4></div>
                            <?php }?>
                            <div style="padding:20px;"><?php echo $row['content'];?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>   

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
