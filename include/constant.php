<?php 

$url = '';
$users_groups_id = [];
$users_groups = [];
$id = $_GET['id'] ?? '';
$color_id = '';
$host = 'localhost';
$user = 'mysql'; //имя пользователя
$password = 'mysql'; //пароль
$bdname = 'mydb'; // название БД
$login = $_SESSION['current_login'] ?? '';
$connect = mysqli_connect($host, $user, $password, $bdname);