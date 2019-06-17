<?php
session_start();
include("inc/admin-inc.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin = login($username,$password);
    if(empty($admin)){
        
        header("Location: adminlogin.php?res=error");
    //echo "Wrong username or password";
        exit;
    }else{
        $_SESSION['admin'] = $username;
    }
}


if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit;
}
if(isset($_GET["view"])){
    $view = $_GET["view"];
    $res = "";
    if($view == "albums"){
       $res = get_all_albums();
       if(!empty($res))
       $columns = array_keys($res[0]);
    }
    else if($view == "artists"){
       $res = get_all_artists();
       if(!empty($res))
       $columns = array_keys($res[0]);
    }
    else if($view == "events"){
       $res = get_all_events();
       if(!empty($res))
        $columns = array_keys($res[0]);
    }
    else if($view == "customers"){
       $res = get_all_customers();
       if(!empty($res))
       $columns = array_keys($res[0]);
    }
    else if($view == "sales"){
       $res = get_all_sales();
       if(!empty($res))
       $columns = array_keys($res[0]);

    }
    else if($view == "tracks"){
       $res = get_all_tracks();
       if(!empty($res))
       $columns = array_keys($res[0]);
    }
}


$page_title = "Admin";
$hero_image = "img/bg-img/breadcumb8.jpg";
$style = "style.css";
$style2 = "css/w3.css";

include("inc/header.php");
?>




 <!-- ##### Elements Area Start ##### -->
    <section class="elements-area mt-30 section-padding-100-0">
        <div class="container">
            <div class="row">

                <!-- ========== Buttons ========== -->
                <div class="col-12">
                    <div class="elements-title mb-50">
                        <h2>Tables</h2>
                    </div>
                    <!-- Buttons -->
                    <div class="musica-buttons-area mb-100">
                        <a href="admin.php?view=albums" class="btn musica-btn m-2">Albums</a>
                        <a href="admin.php?view=artists" class="btn musica-btn btn-2 m-2">Artists</a>
                        <a href="admin.php?view=tracks" class="btn musica-btn btn-3 m-2">Tracks</a>
                        <a href="admin.php?view=customers" class="btn musica-btn m-2">Customers</a>
                        <a href="admin.php?view=sales" class="btn musica-btn btn-2 m-2">Sales</a>
                        <a href="admin.php?view=events" class="btn musica-btn btn-3 m-2">Events</a><br><br>
                        <div class="elements-title mb-50">
                        <h2>Add Albums and Artists</h2>
                    </div>
                        
                        <!-- FOR ALBUMS -->
                        <button onclick="document.getElementById('id01').style.display='block'" class="musica-btn mt-30" style="display:inline;" type="submit">Add Album</button>
                            <div class="w3-container">
                                <div id="id01" class="w3-modal">
                                   <div class="w3-modal-content w3-card-4 w3-animate-zoom " style="max-width:600px">
                                       <div class="w3-center"><br>
                                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                                                            
                                       </div>
                                         <form class="container" action="add-album.php" method="post" enctype="multipart/form-data">
                                        <div class="w3-section ml-15 mr-15">
                                        <label><b>Album name</b></label>
                                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Albumname" name="albumname" required>
                                       <label><b>Artist</b></label>
                                            <select class="w3-input w3-border w3-margin-bottom" name="artistname" required>
                                                <?php
                                                $artists = get_all_artists();
                                                    foreach($artists as $artist){
                                                        echo '<option value="'. $artist['fname'] . '">'. $artist['fname'] . ' ' . $artist['lname'] .'</option>';        
                                                    }
                                                ?>
                                                
                                                
                                            </select>
                                            <label><b>Price</b></label>
                                       <input class="w3-input w3-border  w3-margin-bottom" type="number" step=0.01 placeholder="Enter Price" name="price" required>
                                       
                                       
                                       <script>
                                            function display(n){
                                                var num = document.getElementById("num");
                                                while (num.firstChild) {
                                                    num.removeChild(num.firstChild);
                                                }
                                                for(var i = 0;i < n; i++){
                                                    
                                                var inp = document.createElement("INPUT");
                                                inp.classList.add("w3-input", "w3-border", "w3-margin-bottom");
                                                inp.type = 'file';
                                                inp.name = 'tracks[]';
                                                
                                                num.appendChild(inp);
                                                }
                                            }
                                        
                                       </script>
                                       
                                       <label><b>Number of Tracks</b></label>
                                       
                                       <input class="w3-input w3-border  w3-margin-bottom" type="number" placeholder="Enter Tracks" name="numtracks" id="numtracks" required  onchange="display(this.value)" min=1>
                                       <div id="num">
                                        
                                       </div>
                                       <label><b>Image</b></label>
                                       <input class="w3-input w3-border w3-margin-bottom" type="file" name="imggg" id="imggg" required>
                                        <button class="w3-block btn musica-btn mt-15" type="submit" name = "insert">Insert</button>
                                                            
                                        </div>
                                        </form>

                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                       
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        <!-- FOR ARTISTS -->
                         <button onclick="document.getElementById('id02').style.display='block'" class="musica-btn mt-30" type="submit" style="display:inline;">Add Artist</button>
                            <div class="w3-container">
                                <div id="id02" class="w3-modal">
                                   <div class="w3-modal-content w3-card-4 w3-animate-zoom " style="max-width:600px">
                                       <div class="w3-center"><br>
                                            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                                                            
                                       </div>
                                         <form class="container" action="add-artist.php" method="post" enctype="multipart/form-data">
                                        <div class="w3-section ml-15 mr-15">
                                        <label><b>Artist First-Name</b></label>
                                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Firstname" name="fname" required>
                                       <label><b>Artist Last-Name</b></label>
                                       <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter LastName" name="lname" required>
                                       
                                       <label><b>Artist Email</b></label>
                                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="emailid" required>
                                       
                                       <label><b>Artist Description</b></label>
                                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Description" name="desc" required>
                                       <label><b>Artist Image</b></label>
                                       <input class="w3-input w3-border" type="file" name="imgg" id="imgg" required>
                                       
                                        <button class="w3-block btn musica-btn mt-15" type="submit" name = "Enter">Enter</button>
                                                            
                                        </div>
                                        </form>

                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                        
                                        </div>

                                    </div>
                                </div>
                            </div>    
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <div class="container">
        <h2><?php if(isset($_GET["view"])){ echo strtoupper($_GET["view"]);} ?></h2>
        <p>The Table values are as follows:</p>

        <table class="w3-table w3-card w3-large w3-hoverable">
        <tr class = "w3-black">
            <?php
            if(!empty($res)){
            foreach($columns as $column){
                echo "<th>". $column ."</th>";
            }
            }
            
            ?>
            
        </tr>
       
            <?php
            if(!empty($res)){
            foreach($res as $a){
                echo "<tr>";
                foreach($a as $b){
                    echo "<td>". $b ."</td>";
                }
                echo "</tr>";
            }
            }
            ?>
            
       
        
        </table>
    </div>








<?php
include("inc/footer.php");
?>