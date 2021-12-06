<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
function htmli($data)
{


    return $data;
}

$entry = "";
$owner = "";
$message = "";

include("connect_i.php");

if (isset($_POST["entry_add"])) {

    $entry = htmli($_POST["entry"]);
    $owner = $_SESSION["login"];

    if ($entry == "") {

        $message =  "<font color=\"red\">Please enter some text...</font>";
    } else {

        $sql = "INSERT INTO blog (date, entry, owner) VALUES (now(),'" . $entry . "','" . $owner . "')";

        $recordset = $link->query($sql);

        if (!$recordset) {

            die("Error: " . $link->error . "<br /><br />");
        }

        // Debugging
        // echo $sql;

        $message = "<font color=\"green\">Your entry was added to our blog!</font>";
    }
} else {

    if (isset($_POST["entry_delete"])) {

        $sql = "DELETE from blog WHERE owner = '" . $_SESSION["username"] . "'";

        $recordset = $link->query($sql);

        if (!$recordset) {

            die("Error: " . $link->error . "<br /><br />");
        }

        // Debugging
        // echo $sql;

        $message = "<font color=\"green\">All your entries were deleted!</font>";
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

                <h1 style="margin-left: 25px;"><b>HTML Injection - Stored (Blog)</b></h1>

<div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Enter message</h6>
    </div>
    <div class="card-body">
        <div id="main">
            <div id="main">

                <form action="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>" method="POST">

                    <table>

                        <tr>

                            <td colspan="6">
                                <p><textarea name="entry" id="entry" cols="80" rows="2"></textarea></p>
                            </td>

                        </tr>

                        <tr>

                            <td width="79" align="left">

                                <button type="submit" name="blog" value="submit">Submit</button>

                            </td>

                            <td width="85" align="center">

                                <label for="entry_add">Add:</label>
                                <input type="checkbox" id="entry_add" name="entry_add" value="" checked="on">

                            </td>

                            <td width="100" align="center">

                                <label for="entry_all">Show all:</label>
                                <input type="checkbox" id="entry_all" name="entry_all" value="">

                            </td>

                            <td width="106" align="center">

                                <label for="entry_delete">Delete:</label>
                                <input type="checkbox" id="entry_delete" name="entry_delete" value="">

                            </td>

                            <td width="7"></td>

                            <td align="left"><?php echo $message; ?></td>

                        </tr>

                    </table>

                </form>

                <br />

                <table id="table_yellow">

                    <tr height="30" bgcolor="#9936f3" align="center">

                        <td width="20">#</td>
                        <td width="100"><b>Owner</b></td>
                        <td width="100"><b>Date</b></td>
                        <td width="445"><b>Entry</b></td>

                    </tr>

                    <?php

                    // Selects all the records

                    $entry_all = isset($_POST["entry_all"]) ? 1 : 0;

                    if ($entry_all == false) {

                        $sql = "SELECT * FROM blog WHERE owner = '" . $_SESSION["username"] . "'";
                    } else {

                        $sql = "SELECT * FROM blog";
                    }

                    $recordset = $link->query($sql);

                    if (!$recordset) {

                        // die("Error: " . $link->connect_error . "<br /><br />");

                    ?>
                        <tr height="50">

                            <td colspan="4" width="665"><?php die("Error: " . $link->error); ?></td>
                            <!--
<td></td>
<td></td>
<td></td>
-->

                        </tr>

                        <?php

                    }

                    while ($row = $recordset->fetch_object()) {

                        if ($_COOKIE["security_level"] == "1" or $_COOKIE["security_level"] == "2") {

                        ?>
                            <tr height="40">

                                <td align="center"><?php echo $row->id; ?></td>
                                <td><?php echo $row->owner; ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td><?php echo xss_check_3($row->entry); ?></td>

                            </tr>

                        <?php

                        } else {

                        ?>
                            <tr height="40">

                                <td align="center"><?php echo $row->id; ?></td>
                                <td><?php echo $row->owner; ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td><?php echo $row->entry; ?></td>

                            </tr>

                    <?php

                        }
                    }

                    $recordset->close();

                    $link->close();

                    ?>
                </table>

            </div>
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