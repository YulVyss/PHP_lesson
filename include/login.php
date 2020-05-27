<?php
$isAuth = false;
$current_login = htmlspecialchars($_POST['current_login'] ?? '');
$current_password = htmlspecialchars($_POST['current_password'] ?? '');

if (!empty($_POST['current_login'])) {
     // проверка логина и пароля
    $query = mysqli_query($connect,"SELECT email, password FROM users WHERE email ='".mysqli_real_escape_string($connect, $_POST['current_login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    mysqli_close($connect);
    if ($current_login == $data['email'] && password_verify($current_password, $data['password']))  {
        $isAuth = true;
        $_SESSION['authorized'] = 'true';
        $_SESSION['current_login'] = $current_login;
        $_SESSION['current_password'] = $current_password;
        setcookie('authorized', $current_login, time() + 60*60*24*30, '/');
    }
}
if (isset($_COOKIE['authorized'])) {
    setcookie('authorized', $_COOKIE['authorized'], time() + 60*60*24*30, '/');
}

// регистрация нового пользователя
$err = '';
$new_login = '';
$new_password = '';
$new_name ='';
$phone = '';

if (!empty($_POST['new_login'])) {
    $new_login = htmlspecialchars($_POST['new_login']);
    $password = htmlspecialchars($_POST['new_password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $new_name = htmlspecialchars($_POST['new_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $get_mail = $_POST['get_mail'] ?? '0';
    $time = $_POST['time'];
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['new_password']))
    {
        $err = "Пароль может состоять только из букв английского алфавита и цифр";
    } elseif (password_verify($passworo1p2e3r4a5d, $hash))  {
        $options = array('cost' => 11);
            if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
                $hash = password_hash($password, PASSWORD_DEFAULT, $options);
            }
    }

    if(!filter_var($new_login, FILTER_VALIDATE_EMAIL))
    {
        $err = "Проверьте написание email";
    }
    $query = mysqli_query($connect, "SELECT email FROM users WHERE email='".mysqli_real_escape_string($connect, $_POST['new_login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err = "Пользователь с таким логином уже существует в базе данных";
    }

    if($err == '')
    {
        $query = mysqli_query($connect,"INSERT INTO `users` (name, password, email, activity, phone, can_mail, time)
        values ('$new_name', '$hash', '$new_login', '1', '$phone', '$get_mail', '$time')");
        mysqli_close($connect);
        if($query) {
            $err = 'Вы успешно зарегистрировались!';
            $new_login = '';
            $new_password = '';
            $new_name = '';
            $phone = '';
        } else {
            $err = 'Ошибка!';
        }
        
    }
}