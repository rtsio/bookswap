<?php

    $username = "hck"; 
    $password = "umbchackathon"; 
    $host = "localhost"; 
    $dbname = "umbc"; 
     
    try { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, array (
            PDO::ATTR_PERSISTENT => true));
    } catch(PDOException $ex) { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    header('Content-Type: text/html; charset=utf-8'); 
    session_start();

    function getAllMajorsArray($filename="/home/hck/majors.txt"){
        $majors = array();
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $temp;
        foreach($lines as $line){
            $temp = explode(',', $line);
            $majors[$temp[0]] = $temp[1]; 
        }
        return $majors;
    }