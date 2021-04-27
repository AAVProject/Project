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

<?php
$host='localhost';
$user='root';
$pass='';
$bdname = 'img_upld';
$charset = 'utf8';

$connection = new mysqli($host, $user, $pass, $bdname);

if($connection->connect_error) {
  die("Error".$connection->connect_error);
}

if(!$connection->set_charset($charset)) {
  echo "Error of UTF-8";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="upload.js"></script>
</head>
<body>
	<img src="/img/logo.jpg">
	<button id="upload_btn">Upload</button>
	
<form method="POST" action="index.php" enctype="multipart/form-data"  hidden="hidden">
<input type="file" name="img_upload" id="upload_window" multiple accept="image/jpeg" onchange="this.form.submit()" hidden="hidden">
<?php

if(!empty($_FILES['img_upload']['tmp_name'])) {
	$img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
	$connection->query("INSERT INTO images (img) VALUES ('$img')");
}
?>
</form>
	<p class="welcome">Добро пожаловать! <strong><?php echo $_SESSION['username']; ?></strong></p>
	<a href="lk.php"><button class="go_lk">Личный кабинет</button></a>

<p class="photo_table">
<?php
  $query = $connection->query("SELECT * FROM `images` ORDER BY `id` DESC");
  while($row = $query->fetch_assoc()) {
    $show_img = base64_encode($row['img']);?>
    <img src="data:image/jpeg;base64, <?php echo $show_img ?>" width="300" height="300" alt="фото">
<?php } ?>
</p>

</body>
</html>