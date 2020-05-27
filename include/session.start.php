<?php

if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date("H:i:s");
}
if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
    // удаляем все куки
    session_unset();
}
