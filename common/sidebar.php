<div class="dashboard_sidebar">
    <div class="dashboard_sidebar_item">
        <ul class="ds_ul" style="padding:20px 0;">
            <?php
            $service = mysqli_query($conn, "SELECT * FROM service WHERE status='Publish'");
            while ($row = mysqli_fetch_assoc($service)) { ?>
            <li><a href="page.php?page=<?php echo $row['url'] ?>"><i style="font-size:20px;" class="fa-solid fa-stethoscope"></i><span><?php echo str_replace('-', ' ', strtolower($row['name']));?></span></a></li>
            <?php } ?>
        </ul>
    </div>
</div>