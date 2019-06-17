<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "musica";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error()){ echo "connection error"; exit;}

if(isset($_POST['submit'])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $contactno = $_POST["contactno"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    
    if(empty($fname) || empty($lname) || empty($contactno) || empty($email) || empty($password) || empty($address)){
        header("Location: ../signup.php?signup=empty");
        exit();
        
    }else{
        if(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$lname)){
            header("Location: ../signup.php?signup=invalidname");
            exit();
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ 
              header("Location: ../signup.php?signup=invalidemail");
              exit();  
            }else{
                $sql = "SELECT * FROM customer WHERE emailid = '$email'";
                $result = mysqli_query($conn,$sql);
                $resultcheck = mysqli_num_rows($result);
                
               
                
                if($resultcheck > 0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit(); 
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $sql1 = "INSERT INTO customer (fname,lname,contactno,emailid,password,address) VALUES (?,?,?,?,?,?);";
                    $stmt = $conn->prepare($sql1);
                    $stmt->bind_param("ssssss",$fname, $lname, $contactno, $email, $password, $address);
                    $result1 = $stmt->execute();                    
                    header("Location: ../signup-success.php?signup=success");
                    exit(); 
                }
            }
        }
    }
    
    
}else{
    header("Location: ../signup.php?signup=notset");
    exit();
}