<?php
   // TODO: include university title in html title tags
   require_once("php/common.php");
   if (empty($_SESSION['user'])){ 
          header("Location: /index.php");
    }

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
    <table>
    <?php 
	        if ($books && count($books) > 1){
              foreach($books as $book){
                echo "<tr>";
                echo "<td>{$book['isbn']}</td>";
                echo "<td>{$book['title']}</td>";
                echo "<td>{$book['author']}</td>";
                echo "<td>{$book['edition']}</td>";
                echo "<td>{$book['price']}</td>";
                echo "<td>{$book['condition']}</td>";
                echo "<td>{$book['timestamp']}</td>";
                echo "<td><a href='#'>Buy Now!!!</a></td>";
                echo "</tr>\n";
              }
          }
    ?>
    </table>
    <a href="logout.php">Logout.</a>
  </body>
</html>
