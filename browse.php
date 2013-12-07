<?php
   // TODO: include university title in html title tags
   require_once("php/common.php");
   require_once("config.php");
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
              $category = $_GET["cat"];
          }
	  echo $category;
    ?>
    <a href="logout.php">Logout.</a>
    <?php endif;?>
  </body>
</html>
