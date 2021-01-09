<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "client";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
   die("Connection failed:". mysql_connect_error());
}