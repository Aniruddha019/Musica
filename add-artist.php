<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "musica";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error()){ echo "connection error"; exit;}

$page_title = "Result";
$hero_image = "img/bg-img/breadcumb6.jpg";
$style = "style.css";
$style2 = "";

include("inc/header.php");
?>
<?php

if(isset($_POST["Enter"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $emailid = $_POST['emailid'];
    $desc = $_POST['desc'];
    $file = $_FILES['imgg'];
    
    $file_name = $_FILES['imgg']['name'];
    $file_tmpname = $_FILES['imgg']['tmp_name'];
    $file_size = $_FILES['imgg']['size'];
    $file_error = $_FILES['imgg']['error'];
    $file_type = $_FILES['imgg']['type'];
    
    $fileExt = explode('.',$file_name);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg');
    if(in_array($fileActualExt,$allowed)){
       
        if($file_error === 0){
            if($file_size < 100000000){
                $filenamenew = $file_name;
                $filedestination = 'img/bg-img/' . $filenamenew;
                move_uploaded_file($file_tmpname,$filedestination);
                
                $sql = "INSERT INTO artist (fname,lname,emailid,description,img_path) VALUES (?,?,?,?,?);";
                $stmt = $conn->prepare($sql);
                
                $stmt->bind_param("sssss",$fname, $lname, $emailid, $desc, $filedestination);
                $result1 = $stmt->execute();
                
                echo "<br><br><br><center><h1>Your artist is updated</h1></center>";
                            
            }else{
                echo "<br><br><br><h1>Your File is too big</h1>";
            }
        }else{
            echo "<br><br><br><h1>There was an error in upoloading file</h1>";
        }
        
    }else{
        echo "<br><br><br><h1>You cannot upolad files of this type</h1>";
    }
    
     
}
?>


<?php
include("inc/footer.php");

?>