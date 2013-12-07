<?php

    if(empty($_POST)) {
        die();
    }
    require_once("common.php"); 
    $query = "SELECT 1 FROM user WHERE username = :user"; 
    $query_params = array(':user' => $_POST['user']); 
    try { 
     	  $stmt = $db->prepare($query); 
	  $result = $stmt->execute($query_params); 
    } catch(PDOException $ex) { 
          die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    $row = $stmt->fetch(); 
    if($row) { 
         die("This username is already in use."); 
    } 

    $query = "SELECT 1 FROM user WHERE email = :email"; 
    $query_params = array(':email' => $_POST['email']); 
    try { 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } catch(PDOException $ex) { 
        die("Failed to run query: " . $ex->getMessage()); 
    } 
     
    $row = $stmt->fetch(); 
    if($row) {
        die("This email address is already registered."); 
    } 
     
    $query = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
    $query_params = array( 
         	     ':username' => $_POST['user'], 
    	  	     ':password' => $password, 
      		     ':email' => $_POST['email'] 
        	    ); 
         
    try { 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } catch(PDOException $ex) { 
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Should redirect to a page saying "confirm your email"    
    header("Location: /registered.html"); 
    die();
?>
