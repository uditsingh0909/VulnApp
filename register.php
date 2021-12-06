<?php
require_once "config.php";

$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);

        // Set these parameters
        $param_username = $username;
        $param_password = hash('sha1',$password);
        $param_email = $_POST['email'];

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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

    <title>Register | VulnApp</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row" style="background-color: #131417;">
                    <div class="col-md-10" style="margin-left: 35px;">
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><b>Create an Account!</b></h1>
                            </div>
                            <form action="" method="post" class="user">
                                <div class="form-group row">
                                </div>
                                <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                <input type="text" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Enter Password">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="password" name="confirm_password" class="form-control form-control-user" id=confirm_password" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Sign Up</button>
                            </form>

                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login</a>
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