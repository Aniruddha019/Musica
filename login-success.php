<?php
$page_title = "Success";
$hero_image = "img/bg-img/breadcumb8.jpg";
$style = "style1.css";
$style2 = "";

include("inc/header.php");

if(isset($_GET["login_value"]))
{
    $value = $_GET["login_value"];
    if($value == "success"){
        echo '<center class="mt-100"><h1>You are successfully logged in, ' . $_SESSION["fname"] .'</h1></center>';
   }
}
?>


<?php
include("inc/footer.php");
?>