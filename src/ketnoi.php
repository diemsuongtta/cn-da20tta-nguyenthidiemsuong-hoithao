<?php
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "csdl2"; 

// Kết nối tới cơ sở dữ liệu
$ketnoi = mysqli_connect($server, $username, $password, $database);
mysqli_query($ketnoi, "SET NAMES 'utf8'");
?>