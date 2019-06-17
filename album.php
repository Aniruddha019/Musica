<?php
require_once("inc/products.php");

if (isset($_GET["albumid"])) {
	$album_id = intval($_GET["albumid"]);
	$album = get_album_single($album_id);
}

if (empty($album)) {
	header("Location:albums.php");
	exit();
}

$tracks = get_album_tracks($album_id);
$page_title =  $album["albumname"];
$hero_image = "img/bg-img/breadcumb3.jpg";
$style = "style1.css";
$style2 = "";




include("inc/header.php");

?>


<!-- ##### Featured Album Area Start ##### -->
    <div class="featured-album-area section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-album-content d-flex flex-wrap">

                        <!-- Album Thumbnail -->
                        <div class="album-thumbnail h-100 bg-img" style="background-image: url(<?php echo $album['imgpath']; ?>);"></div>

                        <!-- Album Songs -->
                        <div class="album-songs h-100">

                            <!-- Album Info -->
                            <div class="album-info mb-50 d-flex flex-wrap align-items-center justify-content-between">
                                <div class="album-title">
                                    <h6>Featured album</h6>
                                    <h4><?php echo $album['albumname']; ?></h4>
                                </div>
                                <div class="album-buy-now">
									
                                    <a href="inc/cart-inc.php?add=<?php echo $album['albumname'];?>" class="btn musica-btn">Add to Cart</a>
                                </div>
                            </div>

                            <div class="album-all-songs">

                                <!-- Music Playlist -->
                                <div class="music-playlist">
                                    
                                    <?php
                                        foreach($tracks as $track)
                                        {
                                            echo get_list_view_track($track);
                                        }
                                    ?>
                                    
                                </div>
                            </div>

                            <!-- Now Playing -->
                            <div class="now-playing d-flex flex-wrap align-items-center justify-content-between">
                                <div class="songs-name">
                                    <p>Playing</p>
                                    <h6><?php echo $tracks[0]['trackname']; ?></h6>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="<?php echo $tracks[0]['trackpath']; ?>" type="audio/mpeg">
                                </audio>
								
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Album Area End ##### -->





<?php
include("inc/footer.php");
?>