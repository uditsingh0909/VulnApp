<?php

session_start();


include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
$sql = "SELECT * FROM movies";

$recordset = mysqli_query($link, $sql);

function sqli($data)
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

                    <h1 style="margin-left: 25px;"><b>SQL Injection (POST/Search)</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Search Movie details</h6>
                        </div>
                        <div class="card-body">


                            <form action="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>" method="POST">

                                <p>

                                    <label for="title">Search for a movie:</label>
                                    <input type="text" id="title" name="title" size="25">

                                    <button type="submit" name="action" value="search">Search</button>

                                </p>

                            </form>

                            <table id="table_yellow">

                                <tr height="30" bgcolor="#9936f3" align="center">

                                    <td width="200"><b>Title</b></td>
                                    <td width="80"><b>Release</b></td>
                                    <td width="140"><b>Character</b></td>
                                    <td width="80"><b>Genre</b></td>
                                    <td width="80"><b>IMDb</b></td>

                                </tr>
                                <?php

                                if (isset($_POST["title"])) {

                                    $title = $_POST["title"];

                                    $sql = "SELECT * FROM movies WHERE title LIKE '%" . sqli($title) . "%'";

                                    $recordset = mysqli_query($link, $sql);

                                    if (!$recordset) {

                                        // die("Error: " . mysqli_error());

                                ?>

                                        <tr height="50">

                                            <td colspan="5" width="580"><?php die("Error: " . mysqli_error($link)); ?></td>
                                            <!--
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    -->

                                        </tr>
                                        <?php

                                    }

                                    if (mysqli_num_rows($recordset) != 0) {

                                        while ($row = mysqli_fetch_array($recordset)) {

                                            // print_r($row);

                                        ?>

                                            <tr height="30">

                                                <td><?php echo $row["title"]; ?></td>
                                                <td align="center"><?php echo $row["release_year"]; ?></td>
                                                <td><?php echo $row["main_character"]; ?></td>
                                                <td align="center"><?php echo $row["genre"]; ?></td>
                                                <td align="center"><a href="http://www.imdb.com/title/<?php echo $row["imdb"]; ?>" target="_blank">Link</a></td>

                                            </tr>
                                        <?php

                                        }
                                    } else {

                                        ?>

                                        <tr height="30">

                                            <td colspan="5" width="580">No movies were found!</td>
                                            <!--
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    -->

                                        </tr>
                                    <?php

                                    }

                                    mysqli_close($link);
                                } else {

                                    ?>

                                    <tr height="30">

                                        <td colspan="5" width="580"></td>
                                        <!--
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    -->

                                    </tr>
                                <?php

                                }

                                ?>

                            </table>

                        </div>


                        <br />
                    </div>
                </div>
                <div class="mb-6">
                    <div class="card card-sm card-body rounded mb-3" style="margin-left: 25px; margin-right: 25px;">
                        <div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1"><span class="h6 mb-0">Solution</span><span class="icon" style="margin-left: 10px;"><i class="fas fa-angle-down"></i></span></div>
                        <div class="collapse" id="panel-1">
                            <div class="pt-3">
                                <p class="mb-0">' or 'a' ='a</p>
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

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>