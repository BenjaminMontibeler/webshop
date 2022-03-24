<?php
$conn = mysqli_connect("localhost", "root", "", "userregistration");
if($conn->connect_error){
    die("Connection Failed!" .$conn->connection_error);
}
?>