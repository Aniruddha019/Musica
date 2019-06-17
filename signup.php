<?php
session_start();
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
    <title>Signup</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="css/w3.css">
    
    <style>
        /* Popup container - can be anything you want */
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
                        <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

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
                                            <li><a href="albums.php">ALbums</a></li>
                                            <li><a href="artists.php">Artists</a></li>
                                            
                                        </ul>
                                    </li>

                                    <li><a href="search.php">Search Albums</a></li>
                                    <?php if(isset($_SESSION["fname"])){
                                        echo '<li><a href="inc/logout.php?logout=yes">Log Out</a></li>';
                                        echo '<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>  ' . $_SESSION["fname"] .'</a></li>';
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
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(img/bg-img/breadcumb4.jpg);">
        <div class="bradcumbContent">
            <h2>SignUp</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->




    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area mt-30 section-padding-100-0">
        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <a href="#"><img src="img/core-img/logo3.png" alt=""></a>
                       

                        <!-- Contact Social Info -->
                        <div class="contact-social-info mt-50">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                        
                        <p class="mb-30"> Music gives a soul to the universe, wings to mind, flight to imagination and life to everything.</p>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon">
                                <img src="img/core-img/placeholder.png" alt="">
                            </div>
                            <h6>27th Cross Road, BNM Institute of Technology, Bangalore</h6>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon">
                                <img src="img/core-img/message.png" alt="">
                            </div>
                            <h6>+53 345 7953 32453</h6>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon">
                                <img src="img/core-img/smartphone.png" alt="">
                            </div>
                            <h6>musica@gmail.com</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <!-- Contact Form Area -->
                        
                         <?php
                                if(isset($_GET["login_value"])){
                                $log = $_GET["login_value"];
                                if($log == 'nouname'){
                                echo '<div class="popup" onclick="myFunction()">';
                                echo '<span class="popuptext" id="myPopup">No such Username Exists</span>';
                                echo '</div>';
                                }
                                if($log == 'error'){
                                echo '<div class="popup" onclick="myFunction()">';
                                echo '<span class="popuptext" id="myPopup">Invalid or Wrong Password</span>';
                                echo '</div>';
                                }
                                if($log == 'nouser'){
                                echo '<div class="popup" onclick="myFunction()">';
                                echo '<span class="popuptext" id="myPopup">Please Login to continue</span>';
                                echo '</div>';
                                }
                                
                                }
                                ?>                             
                                                            
                                <script>
                                    // When the user clicks on div, open the popup
                                    function myFunction() {
                                     var popup = document.getElementById("myPopup");
                                     popup.classList.toggle("show");
                                    }
                                </script>
                        
                        <div class="contact-form-area">
                            <form action="inc/cust-signup.php" method="POST">
                                
                               
                                
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fname" placeholder="Your First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="lname" placeholder="Your Last Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="contactno" placeholder="Contact no" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                                <button class="btn musica-btn" type="submit" name="submit">Signup</button>
                            </form>
                                <button onclick="document.getElementById('id01').style.display='inline-block'" class="btn-2 musica-btn mt-30 " type="submit">Login</button>
                                            <div class="w3-container">
                                                <div id="id01" class="w3-modal">
                                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom " style="max-width:600px">
  
                                                        <div class="w3-center"><br>
                                                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                                                            
                                                         </div>

                                                        <form class="container" action="inc/cust-login.php" method="post">
                                                        <div class="w3-section ml-15 mr-15">
                                                            
                                                            

                                                            
                                                            <label><b>Username</b></label>
                                                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="uname" required>
                                                            <label><b>Password</b></label>
                                                            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pwd" required>
                                                            <button class="w3-block btn musica-btn mt-15" type="submit" name = "login">Login</button>
                                                            
                                                        </div>
                                                        </form>

                                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>    
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Google Maps ##### -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### CTA Area Start ##### -->
    <div class="musica-cta-area section-padding-100 bg-img bg-overlay2" style="background-image: url(img/blog-img/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex justify-content-between align-items-center">
                        <div class="cta-text">
                            <h4>Contact us now</h4>
                            <h2>Do you have a question?</h2>
                            <h6>Morbi quis venenatis augue, a tincidunt libero. Sed id porttitor elit, eu ultricies mauris.</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
        <div class="container-fluid">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        <p class="copywrite-text"><a href="#">Colorlib 2018</a> @ All rights reserved</p>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>About</h4>
                        </div>
                        <nav>
                            <ul class="footer-nav">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">The team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>Links</h4>
                        </div>
                        <nav>
                            <ul class="footer-nav">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">The team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>Social</h4>
                        </div>
                        <nav>
                            <ul class="footer-nav">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Snapchat</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>Subscribe</h4>
                        </div>
                        <form action="#" method="post" class="subscribe-form">
                            <input type="email" name="subscribe-email" id="subscribeemail">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>