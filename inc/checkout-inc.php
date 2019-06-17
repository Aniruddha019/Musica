<?php

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

    $album = $results->fetch(PDO::FETCH_ASSOC);

    return $album;
}



?>