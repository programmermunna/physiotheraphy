<?php include('common/header.php');?>
<?php 
$id = $show['id'];
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
                                <?php if(isset($_GET['msg'])){ ?><div class="alert_info">
                                    <?php echo $_GET['msg'];?></div><?php }?>
                                <div class="dc_box_container">
                                    <h6>
                                        <span class="icon">
                                            <i class="fa fa-support"></i>
                                        </span>
                                        <span class="text"> All User </span>
                                    </h6>
                                    <form action="" method="POST">
                                      <div class="">
                                        <input class="src" type="search" name="src_text" placeholder="Search Method" />
                                        <input style="cursor:pointer;outline:none;" type="submit" name="search" class="btn" placeholder="Search" />
                                     </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="table_wrapper">
                                    <div class="table" style="width: 100%">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="col">Sl.</th>
                                                    <th class="col">ID</th>
                                                    <th class="col">img</th>
                                                    <th class="col">name</th>
                                                    <th class="col">email</th>
                                                    <th class="col">phone</th>
                                                    <th class="col">Status</th>
                                                    <th class="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                         if(isset($_POST['search'])){
                                        $src_text = trim($_POST['src_text']);
                                        $sql = "SELECT * FROM user_info WHERE (id = '$src_text' OR fname = '$src_text' OR email = '$src_text' OR phone = '$src_text') AND role!='Admin'";
                                        $search_query = mysqli_query($conn,$sql);
                                         }

                                                  if(isset($search_query)){
                                                   $i = 0; while($row = mysqli_fetch_assoc($search_query)){$i++; ?>
                                                     <tr>
                                                    <td class="status"><p><?php echo $i;?></p></td>
                                                    <td class="status"><p><?php echo $row['id'];?></p></td>
                                                    <td class="status"><img style="width:30px;height:30px;border-radius:5px;" src="../upload/<?php echo $row['img'];?>" alt=""></td>
                                                    <td class="status"><p><?php echo $row['fname'];?></p></td>
                                                    <td class="status"><p><?php echo $row['email'];?></p></td>
                                                    <td class="status"><p><?php echo $row['phone'];?></p></td>
                                                    
                                                       <?php if(!empty($row['gmail_verify'])){ ?>
                                                        <td style="color:green" class="status">Gmail-Verified</p></td>
                                                      <?php }else{?>
                                                        <td style="color:red" class="status">Not-Verified</p></td>
                                                        <?php }?>
                                                    <td class="t_action">

                                                    <?php if($show['role']=='Moderator'){ ?>
                                                        <p><a onclick="alert('Moderator can not edit!')" href="#!">Edit</a></p>
                                                        <p><a onclick="alert('Moderator can not delete!')" style="background:red;" href="#!">Delete</a></p>
                                                        <p><a onclick="alert('Moderator can not do it!')" href="#!">Moderator</a></p>
                                                      <?php  }else{ ?>
                                                        <p><a href="user-edit.php?id=<?php echo $row['id'];?>">Edit</a></p>
                                                        <p><a style="background:red;" href="user-delete.php?id=<?php echo $row['id'];?>">Delete</a></p>
                                                        <p><a href="moderator-add.php?id=<?php echo $row['id'];?>">Moderator</a></p>
                                                    <?php }?>
                                                    </td>
                                                    </tr>                                       
                                             <?php }}else{ 
                                                    $showRecordPerPage = 10;
                                                    if(isset($_GET['page']) && !empty($_GET['page'])){
                                                        $currentPage = $_GET['page'];
                                                    }else{
                                                        $currentPage = 1;
                                                    }
                                                    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                                    $totalEmpSQL = "SELECT * FROM user_info WHERE role!='Admin' ORDER BY id DESC";
                                                    $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                                    $totalEmployee = mysqli_num_rows($allEmpResult);
                                                    $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                                    $firstPage = 1;
                                                    $nextPage = $currentPage + 1;
                                                    $previousPage = $currentPage - 1;
                                                    $empSQL = "SELECT * FROM user_info WHERE role!='Admin' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                                    $query = mysqli_query($conn, $empSQL);
                                                    $i = 0;
                                                    while($row = mysqli_fetch_assoc($query)){ $i++;
                                                        if($row['id']>0){
                                                     ?>
                                                    <tr>
                                                    <td class="status"><p><?php echo $i;?></p></td>
                                                    <td class="status"><p><?php echo $row['id'];?></p></td>
                                                    <td class="status"><img style="width:30px;height:30px;border-radius:5px;" src="../upload/<?php echo $row['img'];?>" alt=""></td>
                                                    <td class="status"><p><?php echo $row['fname'];?></p></td>
                                                    <td class="status"><p><?php echo $row['email'];?></p></td>
                                                    <td class="status"><p><?php echo $row['phone'];?></p></td>
                                                    
                                                       <?php if(!empty($row['gmail_verify'])){ ?>
                                                        <td style="color:green" class="status">Gmail-Verified</p></td>
                                                      <?php }else{?>
                                                        <td style="color:red" class="status">Not-Verified</p></td>
                                                        <?php }?>
                                                    <td class="t_action">

                                                    <?php if($show['role']=='Moderator'){ ?>
                                                        <p><a onclick="alert('Moderator can not edit!')" href="#!">Edit</a></p>
                                                        <p><a onclick="alert('Moderator can not delete!')" style="background:red;" href="#!">Delete</a></p>
                                                        <p><a onclick="alert('Moderator can not do it!')" href="#!">Moderator</a></p>
                                                      <?php  }else{ ?>
                                                        <p><a href="user-edit.php?id=<?php echo $row['id'];?>">Edit</a></p>
                                                        <p><a style="background:red;" href="user-delete.php?id=<?php echo $row['id'];?>">Delete</a></p>
                                                        <p><a href="moderator-add.php?id=<?php echo $row['id'];?>">Moderator</a></p>
                                                    <?php }?>
                                                    </td>
                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="pagi" style="display: flex; justify-content: space-between;">

                                    <nav>
                                        <ul class="">

                                            <?php if($currentPage >= 2) { ?>
                                            <li class="pagination"><a class="page-link"
                                                    href="?page=<?php echo $previousPage ?>">Previws</a>
                                            </li>
                                            <?php } ?>
                                            <?php if($currentPage != $firstPage) { ?>
                                            <li class="pagination">
                                                <a class="page-link" href="?page=<?php echo $firstPage ?>">
                                                    <span class="page-link" aria-hidden="true">1</span>
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <li class="pagination active"><a class="page-link active"
                                                    href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a>
                                            </li>

                                            <?php if($currentPage < $lastPage) { ?>
                                            <li class="pagination "><a class="page-link"
                                                    href="?page=<?php echo $currentPage+1 ?>"><?php echo $currentPage+1 ?></a>
                                            </li>
                                            <?php } ?>

                                            <?php if($currentPage < $lastPage) { ?>
                                            <li class="pagination "><a class="page-link"
                                                    href="?page=<?php echo $currentPage+1+1 ?>"><?php echo $currentPage+1+1 ?></a>
                                            </li>
                                            <?php } ?>

                                            <?php if($currentPage < $lastPage) { ?>
                                            <li class="pagination "><a class="page-link"
                                                    href="?page=<?php echo $currentPage+1+1+1 ?>"><?php echo $currentPage+1+1+1 ?></a>
                                            </li>
                                            <?php } ?>

                                            <?php if($currentPage < $lastPage) { ?>
                                            <li class="pagination"><a class="page-link"
                                                    href="?page=<?php echo $nextPage ?>"><?php //echo $nextPage  ?>Next
                                                    >></a></li>
                                            <?php } ?>

                                            <li class="pagination">
                                                <a class="page-link" href="?page=<?php echo $lastPage ?>"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">Last</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="pagi_page">Page <?php echo $currentPage ?> of <?php echo $lastPage ?>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(!isset($search_query)){ include('common/footer.php'); }?>
