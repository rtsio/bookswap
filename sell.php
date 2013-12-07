<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   if ($_SERVER['REQUEST_METHOD'] === 'POST'):
       print_r($_POST);
       $query = "INSERT INTO sell (isbn, title, author, edition, category, condition, price, user)
                 VALUES (:isbn, :title, :author, :edition, :category, :condition, :price, :user)";
       $query_params = array(':isbn' => $_POST['isbn'],
       		       	     ':title' => $_POST['title'],
                             ':author' => $_POST['author'],
                             ':edition' => $_POST['edition'],
                             ':category' => $_POST['category'],
          		     ':condition' => $_POST['condition'],
			     ':price' => $_POST['price'],
 			     ':user' => $_SESSION['user']['email']
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
      <select name="category" class="form-control">
        <?php
        $majors = getAllMajorsArray();
        foreach($majors as $code => $major){
            echo "<option value='$code'>$major</option>";
        }
        ?>
      </select>
      <input type="text" name="condition" placeholder="condition">
      <input type="text" name="price" placeholder="price"> 
      <input type="submit">
    </form>
    <a href="logout.php">Logout.</a>
    <?php endif; endif; ?>
  </body>
</html>
