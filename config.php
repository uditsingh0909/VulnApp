<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'vulnapp');


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Checks the connection
if(!$link)
{

    // @mail($recipient, "Could not connect to server: ", mysqli_error());

    die("Could not connect to the server: " . mysqli_error($link));

}

if($conn == false){
    dir('Error: Cannot connect');
}

?>
