<?php
require("inc/products.php");
$page_title = "Artists";
$hero_image = "img/bg-img/breadcumb.jpg";
$style = "style1.css";
$style2 = "";

$artists = get_artists();
include("inc/header.php");
?>
     <section class="elements-area mt-30 section-padding-100-0">
        <div class="container">
            <div class="row">
                
                <!-- ========== Loaders ========== -->
                <div class="col-12">
                    <div class="elements-title mb-50">
                        <h2>Featured Artists</h2>
                    </div>
                </div>

                <div class="col-12">
                    <!-- Loaders Area Start -->
                    <div class="our-skills-area">
                        <div class="row">
                            
                            <?php
                                foreach($artists as $artist)
                                {
                                    echo get_list_view_artist($artist);
                                }
                            ?>
                            
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     </section>

<?php
include("inc/footer.php");
?>