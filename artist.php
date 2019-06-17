<?php
require("inc/products.php");
$page_title = "Artist";
$hero_image = "img/bg-img/breadcumb.jpg";
$style = "style1.css";
$style2 = "";


if(isset($_GET['singer'])){
    $artistname=$_GET['singer'];
    $artist = get_artist($artistname);
    if(!$artist){
        header("Location: artists.php");
        exit;
        
    }
}else{
    header("Location: artists.php");
    exit;
}
include("inc/header.php");
?>
    <!-- ##### About Us Area Start ##### -->
    <div class="about-us-area section-padding-100-0 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-4.jpg);" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Artist Bio</h2>
                        <h6></h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- About Thumbnail -->
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail mb-100">
                        <img src="<?php echo $artist[0]['img_path']; ?>" alt="">
                    </div>
                </div>
                <!-- About Content -->
                <div class="col-12 col-lg-6">
                    <div class="about-content mb-100">
                        <h4>Hello, It’s <?php echo $artist[0]['fname'] . " " . $artist[0]['lname']; ?></h4>
                        <p><?php echo $artist[0]['description']; ?></p>
                        <img src="img/core-img/signature.png" alt="">
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- ##### About Us Area End ##### -->

<?php
include("inc/footer.php");
?>