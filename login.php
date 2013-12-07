<?php
   require("php/common.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BookSwap - by students, for students</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php if (isset($_GET['e'])): ?>
    <span id="error">Your username or password was not recognized. Please try again.</span>
    <?php endif; ?>
    <div id="login">
      <form action="php/login.php" method="POST">
	<input type="text" name="user" placeholder="username" required>
	<input type="password" name="pass" placeholder="password" required>
	<input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>
