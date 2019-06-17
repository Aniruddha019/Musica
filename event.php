<?php
require("inc/products.php");
$page_title = "Event";
$hero_image = "img/bg-img/breadcumb.jpg";
$style = "style1.css";
$style2 = "";

if(isset($_GET["event"])){
    $event = $_GET["event"];
    $event = get_event($event);
    
    if(!$event){
        header("Location: concert-tours.php");
        exit;
        
    }
    
}else{
    header("Location: concert-tours.php");
    exit;
}
$artist = $event[0]['artistid'];
$artist = get_artist_by_id($artist);

$time = strtotime($event[0]['date']);
$time1 = strtotime($event[0]['eventtime']);
    
$myFormatForView = date("g:i A", $time1);
$dateFormat = date("d", $time);
$dateFormat1 = date("y", $time);
    
  
    
$monthNum  = date("m",$time);
$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));


include("inc/header.php");
?>


<!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-30 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fitness-blog-posts">

                        <!-- Single Post Start -->
                        <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Post Thumb -->
                            <div class="blog-post-thumb mb-30">
                                <img src="<?php echo $event[0]['imgpath'];?>" alt="">
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title"><?php echo $event[0]['eventname'];?>  <?php echo $event[0]['eventplace'];?></a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex justify-content-between">
                                <div class="post-date">
                                    <p><?php echo $monthName;?>, <?php echo $dateFormat;?>, 20<?php echo $dateFormat1;?></p>
                                </div>
                                <!-- Comments -->
                                <p class="comments"><a href="artist.php?singer=<?php echo $artist[0]['fname']; ?>"><?php echo $artist[0]['fname'];?></a></p>
                            </div>
                            <!-- bg gradients -->
                            <div class="bg-gradients mb-30 w-25"></div>
                            <!-- Post Excerpt -->
                            <p><?php echo $event[0]['description'];?></p>
                            <!-- Read More -->
                            
                        </div>
                        
                         </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->





<?php
include("inc/footer.php");
?>