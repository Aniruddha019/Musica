<?php
require("inc/products.php");


$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "musica";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error()){ echo "connection error"; exit;}

$page_title = "Result";
$hero_image = "img/bg-img/breadcumb8.jpg";
$style = "style.css";
$style2 = "css/w3.css";

include("inc/header.php");
?>
<?php
if(isset($_POST["insert"])){
    $albumname = $_POST['albumname'];
    $artistname = $_POST['artistname'];
    $price = $_POST['price'];
    
    
    $tracks = $_FILES['tracks'];
    
    $file = $_FILES['imggg'];

    
    $file_name = $_FILES['imggg']['name'];
    $file_tmpname = $_FILES['imggg']['tmp_name'];
    $file_size = $_FILES['imggg']['size'];
    $file_error = $_FILES['imggg']['error'];
    $file_type = $_FILES['imggg']['type'];
    
    
    $fileExt = explode('.',$file_name);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg');
    if(in_array($fileActualExt,$allowed)){
       
        if($file_error === 0){
            if($file_size < 100000000){
                $filenamenew = $file_name;
                $filedestination = 'img/album-img/' . $filenamenew;
                move_uploaded_file($file_tmpname,$filedestination);
                
                $artist = get_artist($artistname);
               
                
                $sql = "INSERT INTO album (artistid,albumname,imgpath,albumprice) VALUES (?,?,?,?);";
                $stmt = $conn->prepare($sql);
                
                $stmt->bind_param("issd",$artist[0]["artistid"], $albumname, $filedestination, $price);
                $result1 = $stmt->execute();
                
                echo "<center><h1>Your album is updated</h1></center>";
                
                $c = count($tracks['name']);
                for($j=0; $j<$c; $j++){
                    //track details
                       
                        $track_name = $tracks['name'][$j];
                        $track_tmpname = $tracks['tmp_name'][$j];
                        $track_size = $tracks['size'][$j];
                        $track_error = $tracks['error'][$j];
                        $tracks['type'][$j] = "audio/mpeg";
                        $track_type = $tracks['type'][$j];
                        
                     //check for proper extension   
                        $trackExt = explode('.',$track_name);
                        $trackActualExt = strtolower(end($trackExt));
                        $allowed1 = array('mp3');
                        if(in_array($trackActualExt,$allowed1)){
                            if($track_error === 0){
                                if($track_size < 10000000000){
                                    $tracknamenew = $track_name;
                                    $trackdestination = 'audio/' . $tracknamenew;
                                    move_uploaded_file($track_tmpname,$trackdestination);
                                    
                                    
                                    $artist = get_artist($artistname);
                                    $album = get_album($albumname);
                
                                    $sql2 = "INSERT INTO track (albumid,artistid,trackname,trackgenre,trackpath) VALUES (?,?,?,?,?);";
                                    $stmt = $conn->prepare($sql2);
                                    $trackgenre = "pop";
                                    $stmt->bind_param("iisss", $album[0]["albumid"],$artist[0]["artistid"], $tracknamenew,$trackgenre,$trackdestination);
                                    $result2 = $stmt->execute();
                                    echo "<center><h1>Your track is updated</h1></center>";
                                    
                                }else{
                                    echo "<h1>Sorry, Track size too large</h1>";
                                }
                            }
                        }else{
                            echo "<h1>You cannot upload tracks of this type. Only mp3 allowed.</h1>";
                        }
                            
                }
            }else{
                echo "<h1>Your File is too big</h1>";
            }
        }else{
            echo "<h1>There was an error in upoloading file</h1>";
        }
        
    }else{
        echo "<h1>You cannot upolad files of this type</h1>";
    }
    
     
}
?>



<?php
include("inc/footer.php");
?>