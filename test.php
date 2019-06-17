<?php

$page_title = "Test";
$hero_image = "img/bg-img/breadcumb.jpg";
$style = "style.css";
$style2 = "";

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Html Page Title</title>
</head>

<body>

    <script>
        var randomnum =  30;
     </script>

    <?php $_SESSION['numbertoguess'] = array( 
                                        array("code" => "US",
                                        "capital" => "DC"),
                                        array("code" => "germany",
                                        "capital" => "berlin")
                                             )?>
    <?php var_dump($_SESSION['numbertoguess']); ?>
    
</body>
</html>


<?php

?>