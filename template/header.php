<?php
session_name('session_id');
session_set_cookie_params(40*60);
session_start();
error_reporting(E_ALL);
ini_set('display errors', true);
include $_SERVER['DOCUMENT_ROOT'] . '/include/session.start.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/constant.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/bd_connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/login.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>
<body>
    <header class="header">
        <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
        <div class="clear">
            <?php showMenu($mainMenu, 'sortMenu'); ?>
        </div>
    </header>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            