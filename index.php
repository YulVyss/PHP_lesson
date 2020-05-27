<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/header.php'; ?>
<td class="left-collum-index">
    <h1><?= getTitle($mainMenu, $url); ?></h1>
    <div class='content'><?= getContent($mainMenu, $url); ?></div>
</td>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/template/authorization.php';
include $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'; ?>
