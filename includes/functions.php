<?php
    function emptyInputSignup($name, $pass){
        $result;
        if(empty($name) || empty($pass)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($name){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function uidExists($conn, $name){
        $sql = "SELECT * FROM usertable WHERE name=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../brnja2.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close();
    }

    function createUser($conn, $name, $pass){
        $sql = "INSERT INTO usertable (name, password) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../brnja2.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $name, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../brnja2.php?error=none");
        exit();
    }

    function emptyInputLogin($name, $pass){
        $result;
        if(empty($name) || empty($pass)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $name, $pass){
        $uidExists = uidExists($conn, $name);

        if($uidExists === false){
            header("location: ../brnja2.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists["password"];
        $checkPwd = password_verify($pass, $pwdHashed);

        if($checkPwd === false){
            header("location: ../brnja2.php?error=wronglogin");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["name"] = $uidExists["name"];
            header("location: ../all.php");
            exit();
        }
    }

    function upit($conn, $upit){
        $result = mysqli_query($conn, $upit);
        return $result;
    }
?>