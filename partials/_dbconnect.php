<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "lsusers";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("error : ".sqli_error($conn));
}

?>