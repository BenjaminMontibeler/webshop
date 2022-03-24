<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $pass = $_POST["password"];

    require_once 'registration.php';
    require_once 'functions.php';

    if(emptyInputSignup($name, $pass) !== false){
        header("location: ../brnja2.php?error=emptyinput");
        exit();
    }

    if(invalidUid($name,) !== false){
        header("location: ../brnja2.php?error=invaliduid");
        exit();
    }

    if(uidExists($conn, $name,) !== false){
        header("location: ../brnja2.php?error=nametaken");
        exit();
    }

    createUser($conn, $name, $pass);
    
}else{
    header("location: ../brnja2.php");
    exit();
}