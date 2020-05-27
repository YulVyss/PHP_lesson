<?php
// include $_SERVER['DOCUMENT_ROOT'] . '/include/bd_connection.php';

function cutTitle($title)
{
    return $title = mb_strimwidth($title, 0, 15, '...');
}

function isCurrentUrl($url)
{
    return $url == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function getTitle($array, $url, $title = 'Заголовок')
{
    foreach ($array as $item) {
        if (isCurrentUrl($item['path'])) {
            return $item['title'];
        }
    }
}
function getContent($array, $url, $content = 'контент')
{
    foreach ($array as $item) {
        if (isCurrentUrl($item['path'])) {
            return $item['content'];
        }
    }
}

function sortMenu($a, $b)
{
    return $a['sort'] > $b['sort'];
}
function usortMenu($a, $b)
{
    return $a['sort'] < $b['sort'];
}

function showMenu($mainMenu, $sort, $ulClass = 'main-menu')
{
    usort($mainMenu, $sort);
    include $_SERVER['DOCUMENT_ROOT'] . '/template/template.php';
}
function createSection($connect, $title, $subtitle, $color, $user) {
    $time = date("Y-m-d H:i:s");
    $result = mysqli_query($connect,"INSERT into sections (title, subtitle, color, time, user)
    values ('$title', '$subtitle', '$color', '$time', '$user')");
}
// createSection($connect, 'Спам', 'спам', 'red', 'anna');

function getRecipientName($connect) {
    $query = mysqli_query($connect,"SELECT `name` from users");
    while($row = mysqli_fetch_assoc($query)) {  
        ?> <option><?=$row['name']?></option>
    <?php }
}
function getSectionTitle($connect) {
    $bd_sections = mysqli_query($connect,"SELECT distinct title from sections");
    while($row = mysqli_fetch_assoc($bd_sections)) { 
        ?> <option><?=$row['title']?></option> <?php
    }
}
function getSectionSubtitle($connect) {
    $bd_sections = mysqli_query($connect,"SELECT distinct subtitle from sections");
    while($row = mysqli_fetch_assoc($bd_sections)) {  
        ?> <option><?=$row['subtitle']?></option> <?php 
    }
}
function getSectionColor($connect) {
    $colors = mysqli_query($connect,"SELECT distinct color, hex from colors");
    while($row = mysqli_fetch_assoc($colors)) {  
        ?> <option style="color: #<?=$row['hex']?>"><?=$row['color'] ?></option> <?php 
    }
}

function sendMail($connect, $title, $text, $time, $sender, $recipient, $section_title, $section_subtitle, $color) {
    if (mysqli_connect_errno()) {
        return $err = "Ошибка ".mysqli_connect_error();
      } else {
        $sections_ids = mysqli_query($connect, "SELECT id from `sections` where title='".mysqli_real_escape_string($connect, $section_title)."' and subtitle='".mysqli_real_escape_string($connect, $section_subtitle)."' limit 1");
        while($row = mysqli_fetch_assoc($sections_ids)) {
            $sections_id = $row['id'];
        }

        $colors = mysqli_query($connect, "SELECT id as color_id from colors where color='".mysqli_real_escape_string($connect, $color)."' limit 1");
        while($row = mysqli_fetch_assoc($colors)) {
            $color_id = $row['color_id'];
        }
        if(isset($sections_id) && isset($color_id)) {
            if (mysqli_connect_errno()) {
                $err = "Ошибка ".mysqli_connect_error();
              } else {
            mysqli_query($connect,"INSERT INTO messages (title, `text`, `time`, sender, recipient, `read`, `sections_id`, `color_id`)
            values ('".mysqli_real_escape_string($connect, $title)."', '".mysqli_real_escape_string($connect, $text)."', '$time', '".mysqli_real_escape_string($connect, $sender)."', '".mysqli_real_escape_string($connect, $recipient)."', '0', '$sections_id', '$color_id')");
        }
        }
    }
}

function getMessageList($connect, $condition) {
    $bd_messages = mysqli_query($connect,"SELECT m.id as id, m.title as messageTitle, s.title as sectionTitle, s.subtitle as subtitle from messages as m LEFT join sections as s on m.sections_id=s.id where m.read=$condition");
    while($row = mysqli_fetch_assoc($bd_messages)) { ?>
        <li class="text_green"><a href="/posts/post.php?id=<?=$row['id'] ?>">"<?=$row['messageTitle'] ?>" Раздел: <?=$row['sectionTitle'] ?>, подраздел: <?=$row['subtitle'] ?></a></li>
    <?php }
}

function messageRead($connect, $id) {
    mysqli_query($connect, "update `messages` set `read` = '1' where `id` = '$id' LIMIT 1 ");
}

function showMessage($connect, $id) {
    $messages = mysqli_query($connect,"SELECT m.title as title, m.time as time, 
    m.sender as sender, m.recipient as recipient, m.text as text, m.color_id as color_id, 
    s.title as section_title, s.subtitle as section_subtitle from messages as m LEFT JOIN 
    sections as s on m.sections_id=s.id where m.id = '$id' LIMIT 1");
    while($row = mysqli_fetch_assoc($messages)) { 
        $color_id = $row['color_id']; ?>
        <h3 style="color: #<?= messageColor($connect, $color_id)?>">Раздел: <?=$row['section_title']?> | подраздел: <?=$row['section_subtitle']?></h3>
        <h2>Заголовок письма: <?=$row['title']?></h2>
        <p class="time"><b>Дата и время отправления:</b><?=$row['time']?></p>
        <p class="sender"><b>Отправитель: </b><?=$row['sender']?></p>
        <p class="sender"><b>Получатель: </b><?=$row['recipient']?></p>
        <p><b>Текст: </b><?=$row['text']?></p>
    <?php }
    mysqli_close($connect);
}
function messageColor($connect, $color_id) {
    $colors = mysqli_query($connect, "SELECT color, hex from colors where id='$color_id' LIMIT 1");
while($row = mysqli_fetch_assoc($colors)) {
    return $color_hex = $row['hex'];
}
}

function getGroupList($connect) {
    if(mysqli_connect_errno()) { ?>
        <p>Ошибка <?= mysqli_connect_error() ?></p> 
    <?php } else {
        $query = mysqli_query($connect,"SELECT * FROM `groups`");
        while($row = mysqli_fetch_assoc($query)) {  ?>
           <h2><?=$row['name'] ?></h2>
           <p><b>описание: </b><?=$row['description'] ?></p>
        <?php }
        mysqli_close($connect);
    }
}



function getUser($connect) {
    if (mysqli_connect_errno()) {
        return $response_title = "Ошибка ".mysqli_connect_error();
      } else {
        $users = mysqli_query($connect,"SELECT * FROM users WHERE email ='".mysqli_real_escape_string($connect, $_SESSION['current_login'])."' LIMIT 1"); 
        return $row = mysqli_fetch_assoc($users);
      }
}

function getGroups($connect, $user_id) {
    $u_g = mysqli_query($connect, "SELECT id_groups from users_groups where id_users=$user_id");
    if((mysqli_num_rows($u_g)) > 0) {
        while($row = mysqli_fetch_assoc($u_g)) {
        $users_groups_id[] = $row['id_groups']; 
        }
        for($i=0; $i < count($users_groups_id); $i++) {
        $groups = mysqli_query($connect, "SELECT name, description from `groups` where id=$users_groups_id[$i]");
        while($row = mysqli_fetch_assoc($groups)) { ?>
            <p><b>название:</b> <?=$row['name'] ?></p>
            <p><b>описание:</b> <?=$row['description'] ?></p>
            <br/>
        <?php }
        }    
    } else { ?>
        <p>у Вас пока нет ни одной группы</p>
    <?php }
}

function wasModeration($connect, $login) {
    $result = mysqli_query($connect,"SELECT id_groups
    from users_groups as ug INNER JOIN users as u on u.id=ug.id_users 
    WHERE u.email ='".mysqli_real_escape_string($connect, $login)."' and id_groups = 1");
    if(mysqli_fetch_assoc($result)) {
        return true;
    } else {
        ?> <td class="left-collum-index">
            <h1>Вы сможете отправлять сообщения после прохождения модерации!</h1>
        </td>
        <?php 
    }
}