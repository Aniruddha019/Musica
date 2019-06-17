<?php
$page_title = "Success";
$hero_image = "img/bg-img/breadcumb7.jpg";
$style = "style1.css";
$style2 = "";

include("inc/header.php");

if(isset($_GET["signup"]))
{
    $value = $_GET["signup"];
    if($value == "success"){
        echo '<center class="mt-100"><h1>Thank you for registration.</h1></center>';
   }
}
?>


<?php
include("inc/footer.php");
?>