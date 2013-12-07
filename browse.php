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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSwap - by students, for students</title>
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <link href="css/jumbotron-narrow.css" rel="stylesheet"> 
  </head>
  <body>
    <div class="container">
      <div class="header">
        <form class="navbar-form form-inline pull-right">
         <div class="btn-group">
	   <a href="index.php" class="btn btn-primary">Home</a>
	   <a href="sell.php" class="btn btn-primary">Sell</a>
	   <a href="contact.php" class="btn btn-primary">Contact</a>
         </div>
        </form>
          <h3 class="text-muted">Welcome back,  <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.</h3>
       </div>
    <div class="container">
      <div class="row">
        <div class="col-md-11">

    <table class="table">
    <tr><th>ISBN</th><th>Title</th><th>Author</th><th>Edition</th><th>Price</th><th>Condition</th><th>Time listed</th></tr>
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
    </div></div></div></div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
