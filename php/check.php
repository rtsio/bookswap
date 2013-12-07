<?php

    require_once('common.php');

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
    die();
?>