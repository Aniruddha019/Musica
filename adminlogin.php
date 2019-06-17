<?php


$page_title = "Admin-Login";
$hero_image = "img/bg-img/breadcumb5.jpg";
$style = "style1.css";
$style2 = "css/w3.css";

include("inc/header.php");
?>


<script>
                                    // When the user clicks on div, open the popup
                                    function myFunction() {
                                     var popup = document.getElementById("myPopup");
                                     popup.classList.toggle("show");
                                    }
</script>
<?php
                                if(isset($_GET["res"])){
                                $log = $_GET["res"];
                                if($log == 'error'){
                                echo '<div class="container section-padding-100-0"><div class="popup" onclick="myFunction()">';
                                echo '<span class="popuptext" id="myPopup">Invalid Login Credentials</span>';
                                echo '</div></div>';
                                }
                                
                                }
                                ?>                             
                                                            
                                





<div class="w3-container">
    <br>
    <br><br>
                                                <div id="id01" class="container">
                                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom " style="max-width:600px">
  
                                                        

                                                        <form class="container" action="admin.php" method="post">
                                                        <div class="w3-section ml-15 mr-15">
                                                            <label><b>Username</b></label>
                                                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
                                                            <label><b>Password</b></label>
                                                            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                                                            <button class="w3-block btn musica-btn mt-15" type="submit" name = "login">Login</button>
                                                            
                                                        </div>
                                                        </form>

                                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



<?php
include("inc/footer.php");
?>