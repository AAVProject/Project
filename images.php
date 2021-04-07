<?php
session_start();

//Инициализация переменных
$id = "";
$image = "";

//Подключение к базам данных
$db = mysqli_connect('localhost', 'root', '', 'img_upld');

?>