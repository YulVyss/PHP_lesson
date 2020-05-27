<?php 
// Личный кабинет пользователя
include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
$user_id = getUser($connect)['id'] ;
$user_name = getUser($connect)['name'];
$email = getUser($connect)['email'];
$phone = getUser($connect)['phone'];

?>
<td class="left-collum-index">
  <h1>Привет, <?=$user_name?>!</h1>
  <h2>Персональные данные:</h2>
  <p><b>email:</b> <?=$email?></p>
  <p><b>телефон:</b> <?=$phone?></p>
      
  <h2>Группы:</h2>
  <?php getGroups($connect, $user_id) ?>
</td>
<?php
mysqli_close($connect);
include $_SERVER['DOCUMENT_ROOT'] . '/template/authorization.php';
include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';