<?php
// страница со списком сообщений, разделенных на прочитанные и непрочитанные

include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
if(wasModeration($connect, $login)) {
?>
<td class="left-collum-index">
    <h1>Сообщения</h1>
    <div class='content'>
        <h2>Прочитанные сообщения</h2>
        <div class="message">
        <?php getMessageList($connect, '1') ?>
        </div>
        <h2>Непрочитанные сообщения</h2>
        <div class="message text_blue">
        <?php getMessageList($connect, '0');
        mysqli_close($connect); ?>
        </div>
    </div>
    <a href='/posts/add.php'><b>написать сообщение >></b></a>
</td> 
<?php }

include $_SERVER['DOCUMENT_ROOT'] . '/template/authorization.php';
include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'; ?>