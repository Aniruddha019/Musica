<?php
session_start();
include("database-new.php");

if(!isset($_SESSION["custid"])){
    header('Location: ../signup.php?login_value=nouser');
    exit;
}


if(isset($_GET['add'])){
    $album_name = $_GET['add'];
    //echo $album_name;
    $sql3 = "SELECT * FROM album WHERE albumname = '$album_name'";
    $result3 = mysqli_query($conn,$sql3);
    
    $resultcheck3 = mysqli_num_rows($result3);
    
    if($resultcheck3 < 1){
            header("Location: ../albums.php?res=noalbum");
            exit;
        }else{
            if($row1 = mysqli_fetch_assoc($result3)){
                var_dump($row1);
                 if(!isset($_SESSION['cart-products']))
                {
                   
                    $_SESSION['cart-products'] = array(
                                                       array("name" => $row1['albumname'],
                                                             "price" => $row1['albumprice'],
                                                             "quantity" => 1,
                                                             "imgpath" => $row1['imgpath'],
                                                             "artistid" => $row1['artistid'])
                                                       );
                     header("Location: ../albums.php?res=success");
                     exit;
                
                }else{
                   
                   
                    $oldcart = $_SESSION['cart-products'];
                    
                    foreach($oldcart as $product){
                        if($product['name'] == $album_name){
                             header("Location: ../albums.php?res=alreadyadded");
                             exit;
                        }
                    }
                    
                    $oldcart[] = array("name" => $row1['albumname'],
                                        "price" => $row1['albumprice'],
                                        "quantity" => 1,
                                        "imgpath" => $row1['imgpath'],
                                        "artistid" => $row1['artistid']);
                    $_SESSION['cart-products'] = $oldcart;
                    
                    header("Location: ../albums.php?res=success");
                }
            }
           
        }
    
}else{
    header("Location: ../albums.php?res=fail");
    exit;
}

?>