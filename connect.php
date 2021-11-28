<?php


// Connection settings
include("config.inc.php");

// Connects to the server
$link = mysqli_connect($server, $username, $password, $database);

// Checks the connection
if(!$link)
{

    // @mail($recipient, "Could not connect to server: ", mysqli_error());

    die("Could not connect to the server: " . mysqli_error($link));

}

// Connects to the database
//$database = mysqli_select_db($database, $link);

// Checks the connection
//if(!$database)
//{

    // @mail($recipient, "Could not connect to database: ", mysqli_error());

    //die("Could not connect to the database: " . mysqli_error());

//}

// mysqli_close($link);

?>