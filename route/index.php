<?php 
// include $_SERVER['DOCUMENT_ROOT'] . '/include/bd_connection.php';

if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date("H:i:s");
}
include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php'; ?>
<td class="left-collum-index">
    <h1><?= getTitle($mainMenu, $url); ?></h1>
    <?php
    if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/route/groups') {
        getGroupList($connect);
    } else { ?>
        <div class='content'><?= getContent($mainMenu, $url); ?></div>
    <?php } ?>
    
</td>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/authorization.php';
include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'; ?>
