<?php
session_start();
include("database-new.php");
if(isset($_POST["login"])){
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];
    
    if(empty($uname) || empty($pwd)){
        header("Location: ../signup.php?login_value=empty");
        exit;
    }else{
        $sql2 = "SELECT * FROM customer WHERE emailid = '$uname'";
        $result2 = mysqli_query($conn,$sql2);
        $resultcheck2 = mysqli_num_rows($result2);
        
        if($resultcheck2 < 1){
            header("Location: ../signup.php?login_value=nouname");
            exit;
        }else{
            if($row = mysqli_fetch_assoc($result2)){
                //Dehashing password
                //$hashedPwd2 = password_hash($pwd, PASSWORD_DEFAULT);
                $passwordcheck = $row["password"] == $pwd;
                //echo $hashedPwd2;
                //exit;
                //$passwordcheck = password_verify($pwd, $row["password"]);
                if($passwordcheck == false){
                    header("Location: ../signup.php?login_value=error");
                    exit;
                }else if($passwordcheck == true){
                    //Login
                    // start session
                    $_SESSION['custid'] = $row['custid'];
                    $_SESSION['emailid'] = $row['emailid'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['contactno'] = $row['contactno'];
                    header("Location: ../login-success.php?login_value=success");
                    exit;
                    
                    }
            }
        }
    }
}else{
    header("Location: ../signup.php?login_value=notset");
    exit;
}