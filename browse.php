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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"> </script>
    <script>
      function setmodalmessage(postdate, postisbn, postprice){
        $('#emailmessage').text("There is a student interested in purchasing the textbook you listed on "+postdate+" with the ISBN "+postisbn+
          ". You originally listed this book for "+postprice+". You may contact this user by replying to this email.");
      }
    </script>
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
          <h3 class="text-muted">Welcome back, <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.</h3>
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
                echo "<td><button class='btn btn-success btn-md' data-toggle='modal' data-target='#myModal' onclick='setmodalmessage(\"{$book['timestamp']}\", \"{$book['isbn']}\", \"{$book['price']}\")'>Buy Now</button></td>";
                echo "</tr>\n";
              }
          }
    ?>
    </table>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Email to Seller</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Your Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Message</label>
            <textarea class="form-control" id="emailmessage" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </div></div></div></div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
