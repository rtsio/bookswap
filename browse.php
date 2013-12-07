<?php
   // TODO: include university title in html title tags
   require_once("php/common.php");

   $books = getBooksArray($_GET["cat"]);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BookSwap - by students, for students</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php 
      if (empty($_SESSION['user'])): 
          header("Location: /index.php");
      else: 
          if (!empty($_GET)) { 
              $category = ;
          }
	        if ($books && count($books) > 1){
              foreach($books as $book){
                echo "<tr></tr>";
              }
          }
    ?>
    <a href="logout.php">Logout.</a>
    <?php endif;?>
  </body>
</html>
