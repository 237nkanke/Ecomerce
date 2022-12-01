<?php

$dbhost = "localhost";
$dbuser= "root";
$dbPass = "";
$dbname = "e-commerce";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("connection failed" . mysqli_connect_error());
}