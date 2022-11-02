<?php include('include/functions.php');

if(!session_start()){ session_start();}
if(isset($_SESSION['user_id'])){
   $id = $_SESSION['user_id'];
   $getUser = "SELECT * FROM user_info WHERE id='$id'";
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
if($id<1){
  header('location:index.php');
}



$show = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE id=$id"));
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


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Oswald:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- FONT-AWESOME -->
  <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>

  <!-- BEGIN CSS STYLES -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/custom.css" type="text/css" media="all" />
  <!-- END CSS STYLES -->
</head>

<body>
  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="header_left">
        <a href="index.php" class="logo">
          <img src="upload/<?php echo $website['logo'];?>" alt="" />
          <span style="text-decoration:none; min-width: fit-content;"><?php echo $website['logo_text'];?></span>
        </a>
      </div>

      <ul class="header_right">
        <li class="signup_btn show_fsp"><a style="font-size:20px;font-weight:400;" href="profile.php" class="">Blog</a></li>
        <li class="signup_btn show_fsp"><a style="font-size:20px;font-weight:400;" href="profile.php" class="">Trams&Condition</a></li>
        <li class="signup_btn show_fsp"><a style="font-size:20px;font-weight:400;" href="contact.php" class="">Contract</a></li>
        <li class="signup_btn show_fsp"><a style="font-size:20px;font-weight:400;" href="profile.php" class="">Appointment</a></li>
      </ul>
    </div>
  </header>