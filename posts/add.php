<?php 
// страница добавить сообщение
include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php'; 
// отправка формы с сообщением
if (isset($_POST) && !empty($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $time = date("Y-m-d H:i:s");
    $sender = $_SESSION['current_login'];
    $recipient = $_POST['recipient'];
    $section_title = $_POST['section_title'];
    $section_subtitle = $_POST['section_subtitle'];
    $color = $_POST['section_color'];

    sendMail($connect, $title, $text, $time, $sender, $recipient, $section_title, $section_subtitle, $color);   
}
if(wasModeration($connect, $login)) {
?>
<td class="left-collum-index">
    <h1>Новое сообщение от <?=$_SESSION['current_login']?></h1>
    <div class='content'>
    <?php if (empty($_POST['title'])) { ?>
    
        <form action="/posts/add.php" method="post" class="add_message">
            <label for="title">Заголовок</label>
            <input type="text" size="30" id="title" name="title">
            <label for="text">Текст</label>
            <textarea type="text" cols="30" id="text" name="text"></textarea>
            <label for="recipient">Получатель</label>
            <select id="recipient" name="recipient">
                <?php getRecipientName($connect) ?>
            </select>
            <label for="section">Раздел</label>
            <select id="section_title" name="section_title">
                <?php getSectionTitle($connect)?>
            </select>
            <label for="section_subtitle">подраздел</label>
            <select id="section_subtitle" name="section_subtitle">
                <?php getSectionSubtitle($connect)?>
            </select>
            <label for="section_color">цветовое оформление</label>
            <select id="section_color" name="section_color">
                <?php getSectionColor($connect);
                mysqli_close($connect); ?>
            </select>
            <input type="submit" name='submit' value="Отправить">
        </form>
        
        <?php } else { ?>
            <p>сообщение отправлено!</p>   
        <?php } ?>
        <p><a href='/posts/index.php'><< посмотреть сообщения</a></p>
        <p><a href='/posts/add.php'>написать новое сообщение</a></p>
    </div>
    <p><?=$err?></p>
</td>

<?php 
}
include $_SERVER['DOCUMENT_ROOT'] . '/template/authorization.php';
include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php';