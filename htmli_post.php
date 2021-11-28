<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
function htmli($data)
{


    return $data;
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

    <title>VulnApp - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/main.min.css" rel="stylesheet">

</head>


<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('siderbar.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-color: #000;">

                <?php
                include('header.php');
                ?>


                <div id="main">

                <h1 style="margin-left: 25px;"><b>HTML Injection - Reflected (POST)</b></h1>

                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Enter your first and last name:</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>" method="GET">

                                <p><label for="firstname">First name:</label><br />
                                    <input type="text" id="firstname" name="firstname">
                                </p>

                                <p><label for="lastname">Last name:</label><br />
                                    <input type="text" id="lastname" name="lastname">
                                </p>

                                <button type="submit" class="btn btn-primary btn-lg" name="form" value="submit">Go</button>

                            </form>

                    <?php

                    if (isset($_GET["firstname"]) && isset($_GET["lastname"])) {

                        $firstname = $_GET["firstname"];
                        $lastname = $_GET["lastname"];

                        if ($firstname == "" or $lastname == "") {

                            echo "<font color=\"red\">Please enter both fields...</font>";
                        } else {

                            echo "Welcome " . htmli($firstname) . " " . htmli($lastname);
                        }
                    }

                    ?>

<br />
                        </div>
                    </div>

                </div>

				<div class="mb-6">
					<div class="card card-sm card-body rounded mb-3" style="margin-left: 25px; margin-right: 25px;"> 
						<div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1"><span class="h6 mb-0">Solution</span><span class="icon" style="margin-left: 10px;"><i class="fas fa-angle-down"></i></span></div>
						<div class="collapse" id="panel-1">
							<div class="pt-3">
                            <p class="mb-0"><?php echo htmlspecialchars("<script>alert(1)</script>");?></p>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>