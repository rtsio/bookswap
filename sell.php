<?php
   // TODO: include university title in html title tags
   require("php/common.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSwap - by students, for students</title>
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
<script>
$(document).ready(function(){
    $("#isbn").change(function(){ 
        if ($("#isbn").val().length < 9) {
            // don't query
        } else {
            var jqxhr = $.getJSON( "isbnlookup.php?isbn="+$("#isbn").val(), function() {
                                    console.log( "success" );
                                  
      })
                                      .done(function( json ) {
    console.log(json);

    if(JSON.stringify(json).length <3){
                                              $('#title').val("");
        $('#author').val("");
        $('#edition').val(""); 

      $("#found").html("ISBN not found, please enter data manually.");
                                      $("#found").css({'color':'red'}); 
                                    }
      else{

    $("#found").html("ISBN found! Please check the data below for correctness.");
    $("#found").css({'color':'green'});
    console.log(json["ISBN"+$("#isbn").val().length]);
      for(var n in json){
        json = json[n];
        console.log(json.details.authors[0].name);
        $('#title').val(json.details.title);
        $('#author').val(json.details.authors[0].name);
        $('#edition').val(json.details.revision);
        break;
      }
  }
  })
                                    .fail(function() {
                                      $("#found").html("ISBN not found, please enter data manually.");
                                      $("#found").css({'color':'red'});
                                              $('#title').val("");
        $('#author').val("");
        $('#edition').val(""); 
                                    })

        }
    }); 
});
    </script>
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
          <h3 class="text-muted">Welcome back, <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.</h3>
       </div>
    <div class="container">
      <div class="row">
        <div class="col-md-11">
<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST'):
       $query = "INSERT INTO sell (`isbn`, `title`, `author`, `edition`, `category`, `condition`, `price`, `user`)
                 VALUES (:isbn, :title, :author, :edition, :category, :condition, :price, :user)";
       $query_params = array(':isbn' => trim($_POST['isbn']),
                              ':title' => trim($_POST['title']),
                              ':author' => trim($_POST['author']),
                              ':edition' => trim($_POST['edition']),
                              ':category' => trim($_POST['category']),
                              ':condition' => trim($_POST['condition']),
                              ':price' => trim($_POST['price']),
                              ':user' => trim($_SESSION['user']['email'])
                            );
       try { 
           $stmt = $db->prepare($query); 
           $result = $stmt->execute($query_params);
       } catch(PDOException $ex) { 
           die("Failed to run query: " . $ex->getMessage()); 
       }
?>
<h4>Thank you for listing on UMBC BookSwap! Here are the details of your listing:</h4>
<?php
   
   foreach ($_POST as $key=>$line) {
   	   echo $key . " - " . $line . "<br>";
   };
?>
   <h4>You can remove listings under your account page.</h4>
   <a href="index.php" class="btn btn-success">Back to home.</a>
<?php
   else:
?>
    <?php 
      if (empty($_SESSION['user'])): 
          header("Location: /index.php");
      else: 
    ?>
    <form name="sell" role="form" method="POST">
      <div class="form-group"> 
        <label for="isbn">Enter your ISBN:</label>
        <input type="text" name="isbn" id="isbn" class="form-control" placeholder="isbn">
      </div>
     <span id="found"></span>
     <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="title">
      </div><div class="form-group">
<label for="author">Author</label>
        <input type="text" id="author" class="form-control" name="author" placeholder="author(s)">
      </div><div class="form-group">      
<label for="edition">Edition (optional)</label>
        <input type="text" id="edition" class="form-control" name="edition" placeholder="edition">
      </div><div class="form-group">
      <label for="category">Category</label>
      <select name="category" id="category" class="form-control">
        <?php
        $majors = getAllMajorsArray();
        foreach($majors as $code => $major){
            echo "<option value='$code'>$major</option>";
        }
        ?>
      </select></div>
      <div class="form-group">
      <label for="condition">Condition</label>
      <input type="text" class="form-control" id="condition" name="condition" placeholder="condition">
      </div>
<div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="price"> 
      </div>
      <input type="submit" class="form-control">
    </form>
    <a href="logout.php">Logout.</a>
    <?php endif; endif; ?>
    </div></div></div></div>
  </body>
</html>
