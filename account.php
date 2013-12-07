<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   // require("config.php");
   if(isset($_SESSION['user']['email'])){
     $books = getUserBooksArray($_SESSION['user']['email']);
    }

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
	   <a href="account.php" class="btn btn-primary">Account</a>
         </div>
        </form>
       <?php if (empty($_SESSION['user'])): ?>
          <form class="navbar-form" role="form" action="php/login.php" method="POST">
            <div class="form-group">
              <input type="text" name="user" placeholder="username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <?php else: ?>
            <h3 class="text-muted">Welcome back,  <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.</h3>
            <?php endif; ?>
          </form>
       </div>

    <?php if (empty($_SESSION['user'])): ?>
      <div class="jumbotron">
        <h1><?php echo UNIVERSITY_NAME ?> BookSwap</h1>
        <p class="lead">Tired of buying overpriced textbooks from Amazon and Chegg? Tired of searching through Ebay for that
        exact edition your school requires? Tired of bookstore "buybacks" that pay you pennies for your books? Use <?php echo
        UNIVERSITY_NAME ?> BookSwap to find students on campus with the books you need. Sell your books directly to other
        students through an organized, effective interface. Cut out the middle men. Built by students, for students.</p>
        <p><a class="btn btn-lg btn-success" href="register.html" role="button">Sign up</a></p>
      </div>    
    </div>

    <?php else: ?>
    <div class="container">
      <div class="row">
        <div class="col-md-11">
<table class="table">
    <tr><th>ISBN</th><th>Title</th><th>Author</th><th>Edition</th><th>Price</th><th>Condition</th><th>Time listed</th><th>&nbsp;</th></tr>
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
                echo "<td><button class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='if(window.confirm(\"Are you sure you want to delete your listing of {$book['title']}\"))this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);'>Delete</button></td>";
                echo "</tr>\n";
              }
          }
    ?>
    </table>
    </div>
    </div>
    </div>
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
