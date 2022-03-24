<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $pass = $_POST["password"];

    require_once 'registration.php';
    require_once 'functions.php';

    if(emptyInputLogin($name, $pass) !== false){
        header("location: ../brnja2.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $name, $pass);
}
else{
    header("location: ../brnja2.php");
    exit();
}