<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   require("config.php");
   if ($_SERVER['REQUEST_METHOD'] === 'POST'):
       print_r($_POST);
       $query = "INSERT INTO sell (isbn, title, author, edition, category, price)
                 VALUES (:isbn, :title, :author, :edition, :category, :price)";
       $query_params = array(':isbn' => $_POST['isbn'],
       		       	     ':title' => $_POST['title'],
                             ':author' => $_POST['author'],
                             ':edition' => $_POST['edition'],
                             ':category' => $_POST['category'],
			     ':price' => $_POST['price'] 
                            );
       try { 
           $stmt = $db->prepare($query); 
           $result = $stmt->execute($query_params); 
       } catch(PDOException $ex) { 
           die("Failed to run query: " . $ex->getMessage()); 
       }
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
