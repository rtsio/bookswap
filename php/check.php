<?php

    require_once('config.php');
    
    try { 
        $db = new PDO("mysql:host={DB_HOST};dbname={DB_NAME};charset=utf8", DB_USERNAME, DB_PASSWORD, array (
            PDO::ATTR_PERSISTENT => true));
    } catch(PDOException $ex) { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    }

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = "SELECT id FROM user WHERE username = :username";
    $query_params = array(':username' => $_POST['username']);  
    try { 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } catch(PDOException $ex) { 
        die("Failed to run query: " . $ex->getMessage()); 
    }    
    
    if ($stmt->fetch()) {
	   echo 1;
    } else {
	   echo 0;
    }
?>


