<?php
//mysql database connection
$host = "localhost";
$user = "dns";
$pass = "123456";
$db = "dns_data";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
?>