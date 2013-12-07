<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   // require("config.php");
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
        <p><img src="images/facebook.jpg" width="100%"/></p>
      </div>    
    </div>

    <?php else: ?>
    <div class="container">
      <div class="row">
        <div class="col-md-11">

<form class="form-inline" role="form">
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="ISBNs, titles, authors">
  </div>
  <button type="submit" class="btn btn-default">search</button>
</form>
    <div>
      <h4 class="text-muted">Browse: <br /></h4>
      <table class="table">      
      <div class="btn-group-lg">
        <tr><td><a class="btn btn-success" href="browse.php?cat=biol">Biology</a></td>
        <td><a class="btn btn-success" href="browse.php?cat=chem">Chemistry</a></td>
        <td><a class="btn btn-success" href="browse.php?cat=econ">Economics</a></td>
        <td><a class="btn btn-success" href="browse.php?cat=math">Mathematics</a><br></td></tr>
        <tr><td><a class="btn btn-success" href="browse.php?cat=psyc">Psychology</a></td>
        <td><a class="btn btn-success" href="browse.php?phil">Philosophy</a></td>
        <td><a class="btn btn-success" href="browse.php?cat=clickers">Clickers</a></td>
        <td><a class="btn btn-success" href="browse.php?cat=codes">Access codes</a></td></tr>
      </div>
      </table>
      <h4 class="text-muted">Or pick a major: </h4><br>
      <form class="form-inline" role="form" action="browse.php" method="get">
        <div class="form-group">
        <select name="cat" class="form-control">
        <?php
        $majors = getAllMajorsArray();
        foreach($majors as $code => $major){
            echo "<option value='$code'>$major</option>";
        }
        ?>
        </select>
        </div>
        <button type="submit" class="btn btn-warning">Free me from the tyranny of the textbook industry</button>
      </form>
    </div>
    <div style="margin-top: 10px;">
      <a class="btn btn-primary btn-large" href="sell.php">I want to sell</a>
    </div>
    </div>
    </div>
    </div>
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
