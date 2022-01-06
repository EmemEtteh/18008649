<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronic_company";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
?>