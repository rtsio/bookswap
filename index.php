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
    Welcome to <?php echo UNIVERSITY_NAME ?>'s BookSwap! This is a book exchange
    run by students, for students - cutting out the middlemen and making your education cheaper.
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
    Search: <input type="text">
    Browse: <br />
    <div>
      <p>
        <a href="browse.php?cat=biol">Biology</a> | <a href="browse.php?cat=chem">Chemistry</a>
        <a href="browse.php?cat=econ">Economics</a> | <a href="browse.php?cat=math">Mathematics</a><br>
      </p>
      <p>
        <a href="browse.php?cat=psyc">Psychology</a> | <a href="browse.php?cat=clickers">Clickers</a>
        <a href="browse.php?cat=codes">Access codes</a> | <a href="browse.php">More...</a>
	<form action="browse.php" method="get">
          <select name="cat">
            <option value="afst">African studies</option>
            <option value="agst">Aging studies </option>
            <option value="amst">American studies </option>
            <option value="ancs">Ancient studies</option>
            <option value="anth">Anthropology </option>
            <option value="arch">Archeology</option>
            <option value="asia">Asian studies</option>
            <option value="biol">Biology</option>
            <option value="chem">Chemistry</option>
            <option value="chin">Chinese</option>
            <option value="cmpe">Computer engineering</option>
            <option value="cmsc">Computer science</option>
            <option value="econ">Economics</option>
            <option value="engl">English</option>
            <option value="enme">Engineering</option>
            <option value="ges">Geography and Environmental studies</option>
            <option value="grek">Greek</option>
            <option value="happ">Health administration</option>
            <option value="hist">History</option>
            <option value="is">Information systems</option>
            <option value="jpns">Japanese</option>
            <option value="kore">Korean</option>
            <option value="latn">Latin</option>
            <option value="math">Mathematics</option>
            <option value="mgmt">Management</option>
            <option value="mll">Modern Languages and Linguistics</option>
            <option value="musc">Music</option>
            <option value="phil">Philosophy</option>
            <option value="phys">Physics</option>
            <option value="poli">Political sciences</option>
            <option value="psyc">Psychology</option>
            <option value="stat">Statistics</option>
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
