<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "userregistration";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connest_error());
}