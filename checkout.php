<?php
session_start();

require("inc/checkout-inc.php");

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "musica";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error()){ echo "connection error"; exit;}

if(isset($_POST["submit"])){
    $cart_total = $_POST["cart-total1"];
    $purchased_albums = array();
    $quantities = array();
    $customerid = $_SESSION["custid"];
    
    
    foreach($_POST["purchased_albums"] as $album){
        $purchased_albums[] = $album;
    }
    
    foreach($_POST["quantities"] as $quantity){
        $quantities[] = $quantity;
    }
    
    $count = count($purchased_albums);
    $i=0;
    foreach($purchased_albums as $album){
        $album_details = get_album($album);
        $sql1 = "INSERT INTO sales (albumid,custid,quantity,albumcost) VALUES (?,?,?,?);";
        $stmt = $conn->prepare($sql1);
        $stmt->bind_param("iiid",$album_details["albumid"], $customerid, $quantities[$i], $album_details["albumprice"]);
        $result1 = $stmt->execute();
        $i = $i + 1;
    }
    
    unset($_SESSION['cart-products']);
    
    
    
    
    
    
    
    
	// Authorisation details.
	$username = "aniruddha019@gmail.com";
	$hash = "9a115350224a16a44256458b6d7c67ac7b853777c7c016a0a3534f31d71ce91e";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = "918011242150"; // A single number or a comma-seperated list of numbers
	$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    
    
    
    
    
    
    
    
    
    
    
    
}

$page_title = "Checkout";
$hero_image = "img/bg-img/breadcumb6.jpg";
$style = "style.css";
$style2 = "";

include("inc/header.php");
?>
<br><br><br><br><br><br>

<?php
echo '<center class="mt-100"><h1>Thank You, ' . $_SESSION["fname"] .' for Shopping with Musica.</h1>';
echo '<h1>Please pay $' . $cart_total .' on delivery of the albums</h1></center>';


?>

<?php
include("inc/footer.php");
?>