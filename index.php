<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   require("config.php");
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
	   <a class="btn btn-primary">Home</a>
	   <a class="btn btn-primary">Sell</a>
	   <a class="btn btn-primary">Contact</a>
         </div>
        </form>
       <?php if (empty($_SESSION['user'])): ?>
          <form class="navbar-form" style="margin-left: 0px" role="form" action="php/login.php" method="POST">
            <div class="form-group">
              <input type="text" name="user" placeholder="user" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <?php else: ?>
            Welcome back,  <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.
            <a href="logout.php">Logout.</a>
            <?php endif; ?>
          </form>
       </div>

    <?php if (empty($_SESSION['user'])): ?>
      <div class="jumbotron">
        <h1>Jumbotron heading</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>    
    </div>

    <?php else: ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
   
    Welcome back,  <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.<br />
    Search: <input type="text">
    Browse: <br />
    <div>
      <div class="btn-group-lg">
        <a class="btn btn-success" href="browse.php?cat=biol">Biology</a>
        <a class="btn btn-success" href="browse.php?cat=chem">Chemistry</a>
        <a class="btn btn-success" href="browse.php?cat=econ">Economics</a>
        <a class="btn btn-success" href="browse.php?cat=math">Mathematics</a><br>
        <a class="btn btn-success" href="browse.php?cat=psyc">Psychology</a>
        <a class="btn btn-success" href="browse.php?cat=clickers">Clickers</a>
        <a class="btn btn-success" href="browse.php?cat=codes">Access codes</a>
        <a class="btn btn-success" href="browse.php">More...</a>
      </div>
      <form action="browse.php" method="get">
        <select name="cat">
        <?php
        $majors = getAllMajorsArray();
        foreach($majors as $code => $major){
            echo "<option value='$code'>$major</option>";
        }
        ?>
        </select>
        <input type="submit">
      </form>
    </div>
    <div>
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
