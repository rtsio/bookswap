<?php
	$isbn = $_POST['isbn'];
	if(!$isbn || strlen($isbn)<9){
            return false;
     }
	echo file_get_contents("http://openlibrary.org/api/books?jscmd=details&format=json&bibkeys=ISBN:$isbn");
	flush();
	die();
?>