<?php


function login($username,$password)
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $results->bindParam(1,$username);
        $results->bindParam(2,$password);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $admin = $results->fetch(PDO::FETCH_ASSOC);

    return $admin;
}

function get_all_artists()
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

function get_all_albums()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM album ORDER BY albumid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $artists = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $artists;
}



function get_all_customers()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM customer ORDER BY custid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $customers = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $customers;
}

function get_all_sales()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM sales ORDER BY salesid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $sales = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $sales;
}

function get_all_tracks()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM track ORDER BY trackid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $tracks = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $tracks;
}

function get_all_events()
{
    try{
        $db = new PDO("mysql:host=localhost;dbname=musica;port=3306","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $results = $db->query("SELECT * FROM event ORDER BY eventid ASC");
        }
     catch (Exception $e)
     {
        echo "Data could not be retrieved from the database";
        exit;
    }

    $events = $results->fetchAll(PDO::FETCH_ASSOC);    
    return $events;
}


?>