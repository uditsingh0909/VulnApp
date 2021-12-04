<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
  header("location: dashboard.php");
  exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    $err = "Please enter username + password";
  } else {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }


  if (empty($err)) {
    $password = hash("sha1", $password, false);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    if ($row>0) {
      printf("Welcome " . $username);
      // this means the password is corrct. Allow user to login
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["id"] = $id;
      $_SESSION["loggedin"] = true;
      //Redirect user to dashboard page
      header("location: dashboard.php");
    }
    else{
      header("Location: login.php?error=Incorect User name or password");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login | UpgradeMore</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/main.min.css" rel="stylesheet">
<style>
.circles{position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;}.circles li{position:absolute;display:block;list-style:none;width:20px;height:20px;background:#9936f3;animation:animate 25s linear infinite;bottom:-150px}.circles li:nth-child(1){left:25%;width:80px;height:80px;animation-delay:0s;}.circles li:nth-child(2){left:10%;width:20px;height:20px;animation-delay:2s;animation-duration:2s;}.circles li:nth-child(3){left:70%;width:20px;height:20px;animation-delay:4s;}.circles li:nth-child(4){left:40%;width:60px;height:60px;animation-delay:0s;animation-duration:18s;}.circles li:nth-child(5){left:65%;width:20px;height:20px;animation-delay:0s;}.circles li:nth-child(6){left:75%;width:110px;height:110px;animation-delay:3s;}.circles li:nth-child(7){left:35%;width:150px;height:150px;animation-delay:7s;}.circles li:nth-child(8){left:50%;width:25px;height:25px;animation-delay:15s;animation-duration:45s;}.circles li:nth-child(9){left:20%;width:15px;height:15px;animation-delay:2s;animation-duration:35s;}.circles li:nth-child(10){left:85%;width:150px;height:150px;animation-delay:0s;animation-duration:11s;}@keyframes animate{0%{transform:translateY(0) rotate(0deg);opacity:1;border-radius:0}100%{transform:translateY(-1000px) rotate(720deg);opacity:1;border-radius:50%}}
</style>
</head>
<body class="bg-gradient-primary" style="background-color: #000;">
<div>
    <ul class="circles">

      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
</div>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: #131417;">
          <div class="card-body p-0" style="padding-right: -19px;margin-right: -90px;">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-10">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>Sign In</b></h1>
                  </div>
                  <?php if (isset($_GET['error'])) { ?>
                      <a class="text-center" style="padding-left: inherit;"><?php echo $_GET['error']; ?></a> <?php } ?>
                  <form action="" method="post" class="user">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Sign In</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/main.min.js"></script>
</body>

</html>