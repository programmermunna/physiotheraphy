  <?php include('include/functions.php');

  if(!session_start()){ session_start();}
  if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $getUser = "SELECT * FROM admin_info WHERE id='$id'";
    $userQuery = mysqli_query($conn,$getUser);
    $user = mysqli_fetch_assoc($userQuery);
  }elseif(isset($_COOKIE['user_id'])){
    $id = $_COOKIE['user_id'];
  }else{
    $id = 0;
  }

  if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
  }

  $website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website WHERE id=1"));
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title><?php echo $website['title']?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="HandheldFriendly" content="true" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="upload/<?php echo $website['favicon']?>" type="image/x-icon" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->


    <!-- Maateen Font -->
    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">

    <!-- FONT-AWESOME -->
    <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>


    <!-- BEGIN CSS STYLES -->
    <link rel="stylesheet" href="lib/slicknav/slicknav.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/custom.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/footer.css" type="text/css" media="all" />
    <!-- END CSS STYLES -->
  </head>

  <body>
    <!-- Header -->
    <header class="header">
      <div class="container">
        <div class="header_left">
          <a style="color:#fff;" href="index.php" class="logo">
            <?php 
            if(empty($website['logo_text'])){ ?>
            <img style="width:200px;height:120px" src="upload/<?php echo $website['logo'];?>" />
          <?php }else{?>
            <span style="text-decoration:none; min-width: fit-content;width:600px;"><?php echo $website['logo_text'];?></span>
            <?php }?>
          </a>
        </div>

        <ul id="menu" class="header_right">
          <li class="signup_btn show_fsp"><a style="font-size:15px;font-weight:400;" href="about.php" class="rubik">About Us</a></li>
          <li class="signup_btn show_fsp"><a style="font-size:15px;font-weight:400;" href="terms&condition.php" class="rubik">Trams&Condition</a></li>
          <li class="signup_btn show_fsp"><a style="font-size:15px;font-weight:400;" href="contact.php" class="rubik">Contract Us</a></li>
          <li class="signup_btn show_fsp"><a style="font-size:15px;font-weight:400;background:#FFF800;" href="appointment.php" class="rubik appoint_head_btn">Appointment</a></li>
        </ul>
      </div>
    </header>
    <script>
      $(document).ready(function(){
          $('#menu').slicknav();
      })
  </script>