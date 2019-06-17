<?php
session_start();
function get_albums_count() {
    return count(get_albums_all());
}


function get_list_view_html($album) {
    
    $output = "";
    $output = $output . '<div class="col-12 col-sm-6 col-lg-3">';
    $output = $output . '<div class="single-skils-area mb-100">';
    $output = $output . '<div class="single-music-player">';
    $output = $output . '<a href = "album.php?albumid='. $album["albumid"] .'"   ><img src="' . $album["imgpath"] . '" alt="' . $album["albumname"] . '"></a>';
    $output = $output . '<div class="music-info d-flex justify-content-between">';
    $output = $output . ' <div class="music-text">';
    $output = $output . '<h5>Artist’s/Band Name</h5>';
    $output = $output . '<p>'. $album["albumname"] . '</p>';
    $output = $output . '</div></div></div></div></div>';
    return $output;
}

function get_list_view_track($track)
{
    $output = "";
    $output = $output . '<div class="single-music active">';
    $output = $output . '<h6>'. $track["trackname"].'</h6>';
    $output = $output . '<audio preload="auto" controls>';
    $output = $output . '<source src="'. $track["trackpath"] .'" type="audio/mpeg">';
    $output = $output . '</audio></div>';
    return $output;
}

function get_list_view_artist($artist){
    $output = "";
    $output = $output . '<div class="col-12 col-sm-6 col-lg-3">';
    $output = $output . '<div class="single-skils-area mb-100">';
    $output = $output . '<div class="single-discography">';
    $output = $output . '<a href="artist.php?singer='. $artist['fname'] .'"><img src="'. $artist['img_path'] .'" alt=""></a>';
    $output = $output . '</div><br>';
    $output = $output . '<h5>'. $artist['fname'] . " " . $artist['lname'] .'</h5>';
    $output = $output . '</div></div>';
    return $output;

                    
}


function get_table_view_cart($item){
    $output = "";
    
    $output = $output . '<div class="product">';
    $output = $output . '<div class="product-image">';
    $output = $output . '<img src="'. $item['imgpath'] .'">';
    $output = $output . '</div>';
    $output = $output . '<div class="product-details">';
    $output = $output . '<div class="product-title">'. $item['name'] .'</div>';
    
    $output = $output . ' <input type="hidden" name="purchased_albums[]" value="'. $item['name'] .'">';
    
    $purchased_albums[] = $item['name'];
    
    $output = $output . '<p class="product-description"><b> '. $item['name'] .'</b></p>';
    $output = $output . '</div>';
    $output = $output . '<div class="product-price">'. $item['price'] .'</div>';
    $output = $output . '<div class="product-quantity">';
    
    $output = $output . '<input name="quantities[]" type="number" value="'. $item['quantity'] .'" min="1">';
   
    $output = $output . ' </div>';
    $output = $output . '<div class="product-removal">';
   
    $output = $output . '</div><div class="product-line-price">'. $item['price'] * $item['quantity'] .'</div></div>';
   
    return $output;
}

function get_date($event){
    $time = strtotime($event['date']);
    $monthNum  = date("m",$time);
    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
}


function get_list_view_event($event)
{
    $output = "";
    $artist = $event['artistid'];
    $artist = get_artist_by_id($artist);
    
    $time = strtotime($event['date']);
    $time1 = strtotime($event['eventtime']);
    
    $myFormatForView = date("g:i A", $time1);
    $dateFormat = date("m/d/y", $time);
    
  
    
    $monthNum  = date("m",$time);
    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
    
    $output = $output . '<div class="single-upcoming-shows d-flex align-items-center flex-wrap">';
    $output = $output . '<div class="shows-date">';
    $output = $output . '<h2>'. date("d",$time).'<span>'.$monthName.'</span></h2></div>';
    $output = $output . '<div class="shows-desc d-flex align-items-center">';
    $output = $output . '<div class="shows-img">';
    $output = $output . '<img src="'. $event['imgpath'] .'" alt=""></div>';
    $output = $output . '<div class="shows-name">';
    $output = $output . '<h6>'. $event['eventname'] .'</h6>';
    $output = $output . '<p>'. $event['eventplace'] . '</p>';
    $output = $output . '</div>';
    $output = $output . '</div>';
    $output = $output . ' <div class="shows-location">';
    $output = $output . '<p>'. $artist[0]['fname']. ' '. $artist[0]['lname'].'</p></div>';
    $output = $output . '<div class="shows-time">';
    $output = $output . '<p>'. $myFormatForView.'</p></div>';
    $output = $output . '<div class="buy-tickets">';
    $output = $output . '<a href="event.php?event='. $event['eventname'] .'" class="btn musica-btn">Read More</a>';
    $output = $output . '</div>';
    $output = $output . '</div>';
    
    return $output;
}



function get_featuredlist_view_event($event,$item)
{
    
    $output = "";
    $output = $output . '<div class="single-featured-shows">';
    $output = $output . '<img src="img/bg-img/fs'.$item.'.jpg" alt="">';
    $output = $output . '<div class="featured-shows-content">';
    $output = $output . '<div class="shows-text">';
    $output = $output . ' <h4>'.$event['eventname'].'</h4>';
    $output = $output . '<p>'.$event['date'].'</p></div>';
    $output = $output . '<div class="bg-gradients"></div>';
    $output = $output . '</div>';
    $output = $output . '</div>';
    
                        
    return $output;
}




function get_events()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM event ORDER BY date ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $events = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $events;
}

function get_event($eventname){
     try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM event WHERE eventname = ?");
        $results->bindParam(1,$eventname);
        $results->execute();
    } catch (Exception $e) {
        echo "Event could not be retrieved from the database.";
        exit;
    }
     $event = $results->fetchAll(PDO::FETCH_ASSOC);
    

    return $event;
}

function get_artists()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM artist ORDER BY artistid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $artists = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $artists;
}

function get_events_recent() {
    $recent = array();
    $all = get_events();

    $total_albums = count($all);
    $position = 0;
    
    foreach($all as $album) {
        $position = $position + 1;
        if ($total_albums - $position < 4) {
            $recent[] = $album;
        }
    }
    return $recent;
}



function get_albums_all()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT albumid, albumname, imgpath FROM album ORDER BY albumid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $albums = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $albums;
}



function get_album_single($albumid) {


    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM album WHERE albumid = ?");
        $results->bindParam(1,$albumid);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $album = $results->fetch(PDO::FETCH_ASSOC);

    return $album;
}

function get_album_tracks($albumid){
    
    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM track WHERE albumid = ?");
        $results->bindParam(1,$albumid);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }
     $tracks = $results->fetchAll(PDO::FETCH_ASSOC);

    return $tracks;
    
}


function get_albums_search($s)
{
    $results = array();
    $all = get_albums_all();

    foreach($all as $album) {
        if (stripos($album["albumname"],$s) !== false) {
            $results[] = $album;
        }
    }
    return $results;
    
}

function get_cart_products()
{
    $cart_products = "";
    
    if(isset($_SESSION["custid"])){
    if(isset($_SESSION['cart-products'])){
    $cart_products = $_SESSION['cart-products'];
    }
    }else{
        header('Location: ../signup.php?login_value=nouser');
        exit;
    }
    return $cart_products;

}

function get_customer_sales($custid){
    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM sales WHERE custid = ?");
        $results->bindParam(1,$custid);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }
     $customer_sales = $results->fetchAll(PDO::FETCH_ASSOC);

    return $customer_sales;
}

function get_artist($artistname){
    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM artist WHERE fname = ?");
        $results->bindParam(1,$artistname);
        $results->execute();
    } catch (Exception $e) {
        echo "Artist could not be retrieved from the database.";
        exit;
    }
     $artist = $results->fetchAll(PDO::FETCH_ASSOC);
    

    return $artist;
    
    
}
function get_artist_by_id($artistid){
    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM artist WHERE artistid = ?");
        $results->bindParam(1,$artistid);
        $results->execute();
    } catch (Exception $e) {
        echo "Artist could not be retrieved from the database.";
        exit;
    }
     $artist = $results->fetchAll(PDO::FETCH_ASSOC);
    

    return $artist;
    
    
}

function get_album($albumname){
    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM album WHERE albumname = ?");
        $results->bindParam(1,$albumname);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }
     $album = $results->fetchAll(PDO::FETCH_ASSOC);

    return $album;
    
    
}



?>