<?php 
/*

php prepared statements 
By Eng. Alphonce Odhimabo
Diamond Software Solutions Inc.
www.alphonce.iluos.co.ke

Initialize Database connection*/

// function dbcon(){
// perform db connection

$host_server = "localhost"; //you can use your server IP address or 127.0.0.1
$host_username = "root";
$db_name = "pdo"; //use your live database name
$db_pass = ""; //your DB password
$db_port = "3306"; //33060 tsl/ssl
$db_socket = "";

$conn = mysqli_connect($host_server, $host_username,$db_pass,$db_name);


?>