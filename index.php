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
</head>
<body>
	<img src="/img/logo.jpg">
	
	
<form method="POST" action="index.php" enctype="multipart/form-data">
<input type="file" name="img_upload" multiple accept="image/jpeg">
<input type="submit" name="upload" value="Отправить"></a>
<?php

  if(isset($_POST['upload'])) {
    $img_type = substr($_FILES['img_upload']['type'], 0, 5);
    $img_size = 5*1024*1024;
    if(!empty($_FILES['img_upload']['tmp_name']) and $img_type === 'image' and $_FILES['img_upload']['size'] <= $img_size) {
    $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
    $connection->query("INSERT INTO images (img) VALUES ('$img')");
    }
}
?>
</form>


	<p class="welcome">Добро пожаловать! <strong><?php echo $_SESSION['username']; ?></strong></p>
	<a href="lk.php"><button class="go_lk">Личный кабинет</button></a>

<p class="photo_table">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/2.jpg" width="300" height="300" alt="фото">
	<img src="/img/3.jpg" width="300" height="300" alt="фото">
	<img src="/img/4.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
</p>

<p class="photo_table">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/2.jpg" width="300" height="300" alt="фото">
	<img src="/img/3.jpg" width="300" height="300" alt="фото">
	<img src="/img/4.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
</p>

<p class="photo_table">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/2.jpg" width="300" height="300" alt="фото">
	<img src="/img/3.jpg" width="300" height="300" alt="фото">
	<img src="/img/4.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
</p>

<p class="photo_table">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/2.jpg" width="300" height="300" alt="фото">
	<img src="/img/3.jpg" width="300" height="300" alt="фото">
	<img src="/img/4.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
	<img src="/img/1.jpg" width="300" height="300" alt="фото">
</p>

</body>
</html>