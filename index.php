<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}
?>