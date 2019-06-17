<?php

function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

// Example
if ( is_session_started() === FALSE ) session_start();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $page_title; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo $style; ?>">
    <link rel="stylesheet" href="<?php echo $style2; ?>">
    <style>
         .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            margin-bottom: 30px;
        }
        
        /* The actual popup */
        .popup .popuptext {
            visibility: show;
            width: 400px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }
        
        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
        
        /* Toggle this class - hide and show the popup */
        .popup .show {
            visibility: hidden;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }
        
        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;} 
            to {opacity: 1;}
        }
        
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
    </style>
    

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <img src="img/core-img/compact-disc.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="musica-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="musicaNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about-us.php">About us</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about-us.php">About Us</a></li>
                                            <li><a href="concert-tours.php">Concert &amp; Tours</a></li>
                                            <li><a href="albums.php">Albums</a></li>
                                            <li><a href="artists.php">Artists</a></li>
                                            <li><a href="adminlogin.php">Admin</a></li>
                                            
                 
                                        </ul>
                                    </li>
                                    
                                    <li><a href="search.php">Search Albums</a></li>
                                    <?php if(isset($_SESSION["fname"])){
                                        echo '<li><a href="inc/logout.php?logout=yes">Log Out</a></li>';
                                        echo '<li><a href="customer.php"><i class="fa fa-user" aria-hidden="true"></i>  ' . $_SESSION["fname"] .'</a></li>';
                                        echo '<li><a href="cart.php">Cart</a></li>';
                                            }else{
                                                echo '<li><a href="signup.php">Signup / Login</a></li>';
                                                
                                            }?>
                                    
                                </ul>

                                <!-- Social Button -->
                                <div class="top-social-info">
                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(<?php echo $hero_image; ?>);">
        <div class="bradcumbContent">
            <h2><?php echo $page_title; ?></h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->