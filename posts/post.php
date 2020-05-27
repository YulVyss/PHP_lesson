<?php 

// страница с сообщением

include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';

if ($id) {
    messageRead($connect, $id);
}   
if(wasModeration($connect, $login)) {
?>
<td class="left-collum-index">
    <h1>Сообщение <?=$id?></h1>
    <div class='content'>
        <div class="message">
            <?php showMessage($connect, $id); ?>
        </div>
    </div>
    <a href='/posts/index.php'><< посмотреть список сообщений</a>
</td>

<?php 
}
include $_SERVER['DOCUMENT_ROOT'] . '/template/authorization.php';
include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'; ?>