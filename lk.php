<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<img src="/img/logo.jpg">
<div class="header">
	<h2>Личный кабинет</h2>
</div>
<div class="content">
    <?php  if (isset($_SESSION['username'])) : ?>                                   
    	<p>Добро пожаловать! <strong><?php echo $_SESSION['username']; ?></strong> <a href="index.php?logout='1'"><button class="lk_exit">Выйти</button></a>
		<p> <a href="index.php"><button class="go_back">Вернуться на сайт</button></a> </p>
    <?php endif ?>
</div>
		
</body>
</html>