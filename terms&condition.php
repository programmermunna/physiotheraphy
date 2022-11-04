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
                          $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM page WHERE id=3")); ?>
                          <div class="dc_box">
                            <div class="dc_box_header">
                                <?php 
                                if(empty($row['img'])){}else{?>
                                <div class="dc_box_container" style="padding:0;">
                                    <img style="width:100%;height:300px;" src="upload/<?php echo $row['img'];?>">
                                </div>
                                <div style="text-align:center;padding:40px 0;background:#93d5fbba;">
                                    <h6 style="display:inline-block;">If You Want To Appointmen</h6>
                                    <a class="btn btn-success appoint_btn" href="appointment.php">Appoint Now</a>
                                    <a class="btn call_btn" href="tel:<?php echo $website['phone']?>">Call Now +<?php echo $website['phone']?></a>
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

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
