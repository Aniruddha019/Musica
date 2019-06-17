
<?php
$search_term = "";
if (isset($_GET["s"])) {
	$search_term = trim($_GET["s"]);
	if ($search_term != "") {
		require_once("inc/products.php");
		$result_albums = get_albums_search($search_term);
	}
}
?>

<?php

$page_title = "Search";
$hero_image = "img/bg-img/breadcumb4.jpg";
$style = "style1.css";
$style2 = "";

include("inc/header.php");
?>


<!-- ##### Search Shows Area Start ##### -->
    <div class="search-your-shows-area section-padding-30 bg-img" style="background-image: url(img/bg-img/bg-6.jpg);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="search-your-shows-content">
                        <h2>Search Your Albums and Tracks</h2>
                        <div class="search-form">
                            <form action="search.php" method="get" class="form-inline justify-content-center">
                                <div class="form-group m-2">
                                    <input type="text" style="width: 440px;" class="form-control" name="s" value="" placeholder="Your Search String">
                                </div>
                                
                                <button type="submit" class="btn musica-btn m-2">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Search Shows Area End ##### -->



<?php // if a search has been performed ... ?>
			<?php if ($search_term != "") : ?>

				<?php // if there are products found that match the search term, display them; ?>
				<?php // otherwise, display a message that none were found ?>
				<?php if (!empty($result_albums)) : ?>
					<div class="col-12">
                    <!-- Loaders Area Start -->
                    <div class="our-skills-area">
                        <div class="row">
                                        
                            <?php foreach($result_albums as $album) {                            
                               echo  get_list_view_html($album);
                            }
                            ?>
                        
                            
                        </div>
                    </div>
                </div>
				<?php else: ?>
					<p>No Albums were found matching that search term.</p>
				<?php endif; ?>

			<?php endif; ?>



<?php
include("inc/footer.php");
?>