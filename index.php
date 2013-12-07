<?php
   // TODO: include university title in html title tags
   require("php/common.php");
   require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BookSwap - by students, for students</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php if (empty($_SESSION['user'])): ?>
    Welcome to <?php echo $UNIVERSITY_NAME ?>'s BookSwap!
    <div id="login">
      <form action="php/login.php" method="POST">
	<input type="text" name="user" placeholder="username" required>
	<input type="password" name="pass" placeholder="password" required>
	<input type="submit" value="Submit">
      </form>
    <br /><a href="register.html">Sign me up</a>
    <br /><a href="reset.html">Forgot password</a>
    </div>
    <?php else: ?>
    Welcome back,  <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>.<br />
    Close your browser to be unplugged.<br />
    <a href="logout.php">Logout.</a>
    <?php endif; ?>
  </body>
</html>
