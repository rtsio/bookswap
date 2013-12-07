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
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><?php echo UNIVERSITY_NAME; ?>'s BookSwap</a>
        </div>
        <div class="navbar-collapse collapse">
          <?php if (empty($_SESSION['user'])): ?>
          <form class="navbar-form navbar-right" role="form" action="php/login.php" method="POST">
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
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <?php if (empty($_SESSION['user'])): ?>
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo UNIVERSITY_NAME; ?> Bookswap</h1>
        <p>A modern bookexchange to empower students, cut out the middle man, and encourage reuse and community building. Built by students, for students, and limited to campus members.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="register.html">Learn more &raquo;</a></p>        
      </div>
    </div>
    <?php else: ?>
    Welcome back,  <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.<br />
    Search: <input type="text">
    Browse: <br />
    <div>
      <p>
        <a href="browse.php?cat=biol">Biology</a> | <a href="browse.php?cat=chem">Chemistry</a>
        <a href="browse.php?cat=econ">Economics</a> | <a href="browse.php?cat=math">Mathematics</a><br>
      </p>
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
      </p>
    </div>
    <div>
      <a href="sell.php">I want to sell</a>
    </div>
    <a href="logout.php">Logout.</a>
    <?php endif; ?>
  </body>
</html>
