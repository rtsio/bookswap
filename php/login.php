<?php 

    require_once("common.php");
    if(empty($_POST)) {
        die();
    } 
    $submitted_username = '';  
    $query = "SELECT id, username, password, failed_logins, 
    	      TIMESTAMPDIFF(MINUTE, last_attempt, NOW()) as last FROM user WHERE username = :username"; 
    $query_params = array(':username' => $_POST['user']); 
    try { 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
    } catch(PDOException $ex) { 
        die("Failed to run query: " . $ex->getMessage()); 
    } 
    
    $login_ok = false; 
    $row = $stmt->fetch();
    if($row) {
        // If we have more than 3 failed logins for this user within the last 15 minutes,
	// block them (rudimentary, but who needs complex auth for a game website?
        if ($row['failed_logins'] > 3 && $row['last'] < 15) { 
	    print("You have tried to login too many times. Please wait 15 minutes before trying again.");
            die();
	} else {
            if (password_verify($_POST['pass'], $row['password'])) {
                $login_ok = true;
	        // Find failed attempts and reset
	        if ($row['failed_logins'] > 0) {
	            $query = "UPDATE user SET failed_logins = 0 WHERE id = :id";
	            $query_params = array(':id' => $row['id']);
                    $sth = $db->prepare($query);
                    $sth->execute($query_params);
                }	    
                unset($row['password']); 
                $_SESSION['user'] = $row;
                $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));    
                header("Location: /index.php");
                die();
            } else {
	        $ip = $_SERVER['REMOTE_ADDR'];
                $query = "UPDATE user SET last_ip = :ip, last_attempt = CURRENT_TIMESTAMP, failed_logins = failed_logins + 1 WHERE id = :id"; 
	        $query_params = array(':id' => $row['id'], ':ip' => $ip);
	        $sth = $db->prepare($query);
	        $sth->execute($query_params); 
	        header("Location: /login.php?e=y");
                die();
    	    }
        }
    } else {
      // Username doesn't exist, send to login
      header("Location: /login.php?e=y");
      die();
    }    
?>
