<?php
	require_once("inc/products.php");
	$albums = get_albums_all();

?>


<?php

$page_title = "Albums";
$hero_image = "img/bg-img/breadcumb3.jpg";
$style = "style1.css";
$style2 = "";
include("inc/header.php");

?>
                <div class="col-12">
                    <div class="elements-title mb-50">
                        <h2><br><br></h2>
                    </div>
                </div>

                <div class="col-12">
                    <!-- Loaders Area Start -->
                    <div class="our-skills-area">
                        <div class="row">
                                        
                            <?php foreach($albums as $album) {                            
                               echo get_list_view_html($album);
                            }
                            ?>
							
                            
                        </div>
                    </div>
                </div>
				
				
				
				
				
    
    

<?php
include("inc/footer.php");
?>