<?php

session_start();


include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
error_reporting(0);

function sqli($data)
{
    return $data;
}

if (isset($_REQUEST["title"])) {

    $title = $_REQUEST["title"];

    $sql = "SELECT * FROM movies WHERE title = '" . sqli($title) . "'";

    $recordset = mysqli_query($link, $sql);

    if ($recordset and mysqli_num_rows($recordset) != 0) {

        $row = mysqli_fetch_array($recordset);

        $movie = $row["title"];

        $username = $_SESSION["username"];

        $sql = "SELECT email FROM users WHERE username = '" . $username . "'";

        $recordset = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($recordset);

        $email = $row["email"];

        if ($smtp_server != "") {

            ini_set("SMTP", $smtp_server);
        }

        // Sends a mail to the user
        $subject = "Vulnapp - Movie Search";
        $sender = $smtp_sender;

        $content = "Hello " . ucwords($username) . ",\n\n";
        $content .= "The movie \"" . $movie . "\" exists in our database." . "\n\n";
        $content .= "Greets from Vulnapp!";

        $status = @mail($email, $subject, $content, "From: $sender");
    }

    mysqli_close($link);
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

                    <h1 style="margin-left: 25px;"><b>SQL Injection - Blind - Time-Based</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Search Movie details</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>" method="GET">

                                <p>

                                    <label for="title">Search for a movie:</label>
                                    <input type="text" id="title" name="title" size="25">

                                    <button type="submit" name="action" value="search">Search</button>

                                </p>

                            </form>

                            <p>The result will be sent by e-mail...</p>

                        </div>


                    </div>



            <div class="mb-6">
                <div class="card card-sm card-body rounded mb-3" style="margin-left: 25px; margin-right: 25px;">
                    <div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1"><span class="h6 mb-0">Solution</span><span class="icon" style="margin-left: 10px;"><i class="fas fa-angle-down"></i></span></div>
                    <div class="collapse" id="panel-1">
                        <div class="pt-3">
                            <p class="mb-0">iron man' AND SLEEP(10)#</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
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