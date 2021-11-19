
<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
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

    <title>HackerCTF - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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

    <h1>HTML Injection - Reflected (GET)</h1>

    <p>Enter your first and last name:</p>

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="GET">

        <p><label for="firstname">First name:</label><br />
        <input type="text" id="firstname" name="firstname"></p>

        <p><label for="lastname">Last name:</label><br />
        <input type="text" id="lastname" name="lastname"></p>

        <button type="submit" name="form" value="submit">Go</button>

    </form>

    <br />
    <?php

    if(isset($_GET["firstname"]) && isset($_GET["lastname"]))
    {

        $firstname = $_GET["firstname"];
        $lastname = $_GET["lastname"];

        if($firstname == "" or $lastname == "")
        {

            echo "<font color=\"red\">Please enter both fields...</font>";

        }

        else
        {

            echo "Welcome " . htmli($firstname) . " " . htmli($lastname);

        }

    }

    ?>

</div>
</body>

</html>