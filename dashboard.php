<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
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

    <title>HackerCTF - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/main.min.css" rel="stylesheet">

</head>

<body id="page-top">

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

                <!-- Begin Page Content -->

            </div>
            <div class="container">
  <div class="row">
    <div class="col-sm">
    <h1 style="margin-top: 50px"><b>VulnApp</b></h1>
    <p>Web application vulnerablities based CTF Lab. to Learn and enhance your pentesting skills.</p>
    </div>
    <div class="col-sm">
        <a style="margin-top: 70px; margin-left: 200px;" type="button" href="#" class="btn btn-primary btn-lg"><b>Start Now Today!</b></a>
    </div>
  </div>
</div>
<div class="container">
    <div class="row" style="margin-top: 30px;">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Things which you can do when you are unsure of how to continue:</h6>
                </div>
                <div class="card-body">
                    If you know a command but you don’t know how to use that particular command then try using manual (man page) by typing “man“ (without the quotes <>). Example: If you know about the “ls” command, then type: man ls. Press “q” to quit the man command.
                        If you don’t find the man page then the command might be a shell built-in. In this case, use the “help“. Example: “help cd“
                        Lastly, if you are still stuck somewhere make sure you join our discord server.
                </div>
            </div>
        </div>
        <div class="col">
            <p style="margin-bottom: 5px;">Web Application</p>
            <div class="progress md-progress" style="height: 30px">
                <div class="progress-bar" role="progressbar" style="width: 100%; height: 30px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>
            <p style="margin-top: 20px; margin-bottom: 5px;">Programming</p>
            <div class="progress md-progress" style="height: 30px">
                <div class="progress-bar" role="progressbar" style="width: 44%; height: 30px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="44">44%</div>
            </div>
            <p style="margin-top: 20px; margin-bottom: 5px;">Real World</p>
            <div class="progress md-progress" style="height: 30px">
                <div class="progress-bar" role="progressbar" style="width: 20%; height: 30px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="20">20%</div>
            </div>
            <p style="margin-top: 20px; margin-bottom: 5px;">CTF</p>
            <div class="progress md-progress" style="height: 30px">
                <div class="progress-bar" role="progressbar" style="width: 93%; height: 30px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="93">93%</div>
            </div>
            <p style="margin-top: 20px;">Now you are ready to start! Make sure you start with Level 0, linked at the right of this page. Good luck!</p>
        </div>
    </div>

</div>
            <!-- End of Main Content -->

            <?php
                include('footer.php');
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #131417;">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: #fff">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #131417;">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer" style="background-color: #131417;">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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