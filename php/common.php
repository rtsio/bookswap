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
    header('Content-Type: text/html; charset=utf-8'); 
    session_start();
