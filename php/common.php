<?php
    require_once('config.php');
    
    try { 
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USERNAME, DB_PASSWORD, array (
            PDO::ATTR_PERSISTENT => true));
    } catch(PDOException $ex) { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    header('Content-Type: text/html; charset=utf-8'); 
    session_start();

    function getAllMajorsArray($filename = PATH_TO_MAJOR_LIST){
        $majors = array();
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $temp;
        foreach($lines as $line){
            $temp = explode(',', $line);
            $majors[$temp[0]] = $temp[1]; 
        }
        return $majors;
    }

    function getBooksArray($category=null){
        if($category == "") { 
            $category = null;
        }

        $query = "SELECT * FROM sell "; 
        if($category) {
             $query .= "WHERE category = :category ";
             $query_params = array(':category' => $category); 
        }
        $query .= "ORDER BY price ASC, timestamp DESC";

        try { 
            global $db;
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
            return $stmt->fetchAll();
        } catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
        return false;
    }

    function getUserBooksArray($user=null){
        if($user == "") { 
            $user = null;
        }

        $query = "SELECT * FROM sell "; 
        if($user) {
             $query .= "WHERE user = :user ";
             $query_params = array(':user' => $user); 
        }
        $query .= "ORDER BY price ASC, timestamp DESC";

        try { 
            global $db;
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
            return $stmt->fetchAll();
        } catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
        return false;
    }

    function getBookDetailFromISBN($isbn){
        if(!$isbn || strlen($isbn)<9){
            return false;
        }
        $result = file_get_contents("http://openlibrary.org/api/books?jscmd=details&format=json&bibkeys=ISBN:$isbn");
        $book = json_decode($result);
        return $book;
    }
