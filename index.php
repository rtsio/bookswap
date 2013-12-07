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
        <h1><?php echo UNIVERSITY_NAME; ?>'s BookSwap</h1>
        <p>A modern bookexchange to empower students, cut out the middle man, and encourage reuse and community building. Built by students, for students, and limited to campus members.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="register.html">Learn more &raquo;</a></p>        
      </div>
    </div>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <h2>Better than...</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <h3>Facebook</h3>
          <div style="display: table-cell;vertical-align: middle;height: 300px;">
            <img src="images/textbooks1.png" width="100%" />
          </div>
          <p>Disorganized and inactive listing, low amount of signal to noise, and no standardized format to search or track the status of interactions. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h3>MyUMBC</h3>
          <div style="display: table-cell;vertical-align: middle;height: 300px;">
            <img src="images/textbooks2.png" width="100%"/>
          </div>
          <p>Difficult to navigate, some more lorem ipsum. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h3>Bookstore</h3>
          <div style="display: table-cell;vertical-align: middle;height: 300px;">
            <img src="images/textbooks3.png" width="100%"/>
          </div>
          <p>Centralized system with very low payoff to sellers and large cost to buyers. Middle man collects large profit and everyone loses.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
    </div> <!-- /container -->
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
