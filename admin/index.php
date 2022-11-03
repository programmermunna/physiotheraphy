<?php include('../include/functions.php'); ?>
<?php 

if(!session_start()){session_start();}  
if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
  if($id>0){
    header('location:home.php');
  }
} 
if(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];
  if($id>0){
    header('location:home.php');
  }
}

if(isset($_POST['login'])){
  $email =$_POST['email'];
  $pass = md5($_POST['pass']); 
  $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE email='$email' AND pass='$pass'"));
  if($row>0){
      $id = $row['id'];
      $_SESSION['admin_id'] = $id;
      setcookie('admin_id', $id , time()+86000);
      header('location:home.php');
  }else{
    $msg = "Your Email Or Passwor is Wrong!";
    header("location:index.php?msg=$msg");
  }
}

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
  <!-- END CSS STYLES -->
</head>

<body style="background:#3690FF">
  <!-- All Popups -->
  <div class="full_screen_popup" data-ref="login">
    <div class="fsp_overlay"></div>
    <form class="fsp_content" action="" method="POST">
      <h6>Login</h6>

      <div>
        <label for="number"><small>Email</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-phone"></i>
            </span>
          </div>
          <input name="email" type="email" placeholder="Email" required />
        </div>
      </div>

      <div>
        <label for="password"><small>Password</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span><i class="fa-solid fa-lock"></i> </span>
          </div>
          <input name="pass" type="password" placeholder="Password" id="password" required />
        </div>
      </div>
      <input type="submit" name="login" class="base_btn" value="Login" />
    </form>
  </div>  
 
  <!-- All Popups -->

  <script src="js/main.js"></script>
</body>
</html>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
