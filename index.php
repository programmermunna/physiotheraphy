<?php include('common/header.php');?>
<?php $visitors = mysqli_query($conn,"UPDATE visitors SET visitor=visitor+1 WHERE id=1;"); ?>
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
                          $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM service WHERE url ='$page'")); ?>
                          <div class="dc_box">
                            <div class="dc_box_header">
                                <?php 
                                if(empty($row['file'])){}else{?>
                                <div class="dc_box_container" style="padding:0;">
                                    <img style="width:100%;height:300px;" src="upload/<?php echo $row['file'];?>">
                                </div>
                                <div style="text-align:center;padding:20px 0">
                                    <a style="margin:0 10px;font-size:20px" class="btn btn-success" href="appointment.php">Appoint Now</a>
                                    <a style="margin:0 10px;font-size:20px" class="btn btn-success" href="tel:<?php echo $website['phone']?>">Call Now</a>
                                </div>
                                <?php }?>                                
                            </div>
                            <?php if(empty($row['title'])){}else{?>
                            <div style="padding:20px;"><h4><?php echo strtoupper($row['title']);?></h4></div>
                            <?php }?>
                            <div style="padding:20px;"><?php echo $row['content'];?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
