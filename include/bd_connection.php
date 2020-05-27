<?php 
// данные для подключения к базе данных

$connect = mysqli_connect($host, $user, $password, $bdname);
$registered = false;

$groups = mysqli_query($connect,"SELECT id_users, id_groups, u.email 
    from users_groups as ug LEFT JOIN users as u on u.id=ug.id_users 
    WHERE u.email ='".mysqli_real_escape_string($connect, $login)."' LIMIT 1");
while($row = mysqli_fetch_assoc($groups)) { 
    return $registered = $row['id_groups'];
}

