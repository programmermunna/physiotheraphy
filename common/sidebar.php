<div class="dashboard_sidebar">



              <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="setting">
                  <span style="font-size:20px;font-weight:bolder;" class="text"> Physiotherapy Tretment</span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="setting">
                  <?php 
                  $treatment = mysqli_query($conn,"SELECT * FROM treatment");
                  while($row = mysqli_fetch_assoc($treatment)){ ?>
                  <li><a href="index.php?page=<?php echo $row['url']?>"><i class="fa fa-user"></i> <span><?php echo $row['treatment']?></span></a></li>
                  <?php }?>

                </ul>
              </div>


              <!-- <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="my-profile">
                  <span style="font-size:25px;" class="text">Contract</span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="my-profile">

                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Phone: 0178455554</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Email: example@gmail.com</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>What's aspp: 0178455554</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Messagnger: harun</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Facebook Page: harun</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Instragaram: harun</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Viber: harun</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Youtube: harun</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>Address: harun</span>
                    </a>
                  </li>

                </ul>
              </div>               -->

            </div>



          