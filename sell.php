<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   require("config.php");
   if ($_SERVER['REQUEST_METHOD'] === 'POST'):
       print_r($_POST);
   else:
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
    ?>
    <form name="sell" method="POST">
      <input type="text" name="isbn" placeholder="isbn">
      <input type="text" name="title" placeholder="title">
      <input type="text" name="author" placeholder="author(s)">
      <input type="text" name="edition" placeholder="edition">
      <input type="text" name="category" placeholder="category">
      <input type="text" name="price" placeholder="price"> 
      <input type="submit">
    </form>
    <a href="logout.php">Logout.</a>
    <?php endif; endif; ?>
  </body>
</html>
