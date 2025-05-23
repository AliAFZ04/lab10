<?php
session_start();
require_once "settings.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$new_email = $_POST['new_email'];

$sql = "UPDATE user SET email='$new_email' WHERE username='$username'";
mysqli_query($conn, $sql);

header("Location: profile.php");
exit();
?>
