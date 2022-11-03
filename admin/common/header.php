<?php include('../include/functions.php');

if(!session_start()){ session_start();}
if(isset($_SESSION['admin_id'])){
   $id = $_SESSION['admin_id'];
   $getUser = "SELECT * FROM admin_info WHERE id='$id'";
   $userQuery = mysqli_query($conn,$getUser);
   $user = mysqli_fetch_assoc($userQuery);   
}
elseif(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];
}
else{
  $id = 0;
}
if($id<1){
  header('location:index.php');
}
$show = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));
$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website WHERE id=1"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>JoblessBD - Earn money with easy tasks</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="HandheldFriendly" content="true" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Oswald:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

  <!-- FONT-AWESOME -->
  <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>

  <!-- SUMMERNOTE TEXTAREA -->
  <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js" crossorigin="anonymous"></script>    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />

  <!-- BEGIN CSS STYLES -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="../css/custom.css" type="text/css" media="all" />
  <!-- END CSS STYLES -->
</head>

<body>
  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="header_left">
        <a href="index.php" class="logo">
          <span><?php echo $show['logo_text']?></span>
        </a>
      </div>

      <ul class="header_right">
        <li class="deposit_btn">
          <a href="deposit.php" class="base_gradient_btn blue">
            <span class="icon"> <i class="fa-solid fa-wallet"></i> </span>
            <span>Deposit</span>
          </a>
        </li>

        <li class="signup_btn show_fsp" data-ref="signup">
          <a target="_blank" href="../index.php" class="">
            <span>Visit Site</span>
          </a>
        </li>
        

        <li class="signup_btn show_fsp" data-ref="signup">
          <a href="profile.php" class="">
            <span><?php echo $show['name'];?></span>
          </a>
        </li>

        <li class="my_profile_btn">
          <a href="#" id="profile-options-toggler">
            <img class="profile_image" src="../upload/<?php echo $show['img'];?>" alt="" />
          </a>

          <div class="profile-options">
            <div>
              <div>
                <p><b><?php echo $show['name'];?></b></p>
                <p><a href="index.php">Dashboard</a></p>
              </div>
            </div>

            <ul>
              <li>
                <a  href="profile.php">
                  <span class="icon"><i class="fa-solid fa-user"></i> </span>
                  <span class="text">Admin</span>
                </a>
              </li>
            <ul>

              <li>
                <a href="logout.php">
                  <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                  </span>
                  <span class="text">Logout</span>
                </a>
              </li>
            </ul>

          </div>
        </li>
      </ul>
    </div>
  </header>