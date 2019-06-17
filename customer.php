<?php
require("inc/products.php");

if(isset($_SESSION["custid"])){
    
    $customerid = $_SESSION['custid'];
    $customeremail = $_SESSION['emailid'];
    $customerfname = $_SESSION['fname'];
    $customerlname = $_SESSION['lname'];
    $customercontactno = $_SESSION['contactno'];
    $customeraddress = $_SESSION['address'];
    
    $customer_sales = get_customer_sales($customerid);
}



$page_title = "Customer";
$hero_image = "img/bg-img/breadcumb7.jpg";
$style = "style.css";
$style2 = "css/w3.css";

include("inc/header.php");
?>

<div class="container">
        <!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="img/core-img/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $customerfname . " " . $customerlname ?></p>
         <p><i class="fa fa-fax fa-fw w3-margin-right w3-text-theme"></i><?php echo $customeremail ?></p>
         <p><i class="fa fa-phone fa-fw w3-margin-right w3-text-theme"></i><?php echo $customercontactno ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $customeraddress ?></p>
        </div>
      </div>
    </div>
      
      <?php
      
        if(!empty($customer_sales)){
            
            foreach($customer_sales as $sale)
            {
                $album = get_album_single($sale["albumid"]);
                echo '<div class="w3-col m7">';
                echo '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>';
                echo '<div class="w3-half">';
                echo '<img src="'. $album["imgpath"] .'" style="width:50%" alt="Northern Lights" class="w3-margin-bottom">';
                echo '</div>';
                echo '<span class="w3-right w3-opacity"> Price : $'. $sale["albumcost"] .'</span>';
                echo '<h4>'. $album["albumname"] .'</h4>';
                echo '<hr class="w3-clear">';
                echo '<p>Order - Date :'. $sale["ord_date"] .'</p>';
               
                echo '</div></div>';    
            }
            
        }
      
      ?>
              
    
  </div>
</div>
      <br>





</div>
<?php
include("inc/footer.php");
?>