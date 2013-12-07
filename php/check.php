<?php

    $username = "hck"; 
    $password = "umbchackathon"; 
    $host = "localhost"; 
    $dbname = "umbc"; 
     
    try { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
    } catch(PDOException $ex) { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = "SELECT id FROM users WHERE username = :username";
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


