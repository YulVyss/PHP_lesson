<td class="right-collum-index">
    <div class="project-folders-menu">
        <ul class="project-folders-v">
            <li class="<?php if(isset($_GET['login'])) {?>project-folders-v-active<?php } ?>">
                <?php if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == 'true') { ?>
                    <a href="/?logout=yes">Выйти</a>
                <?php } else { ?>
                    <a href="/?login=yes">Авторизоваться</a>
                <?php } ?>
            </li>
            <li class="<?php if(isset($_GET['authorize'])) {?>project-folders-v-active<?php } ?>">
                <a href="/?authorize=yes">Регистрация</a></li>
            <li><a href="/lk">Забыли пароль?</a></li>
            
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="index-auth">
        <?php if (isset($_GET['login']) && $_GET['login'] == 'yes') { ?>
            <form action="/?login=yes" method="post">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="iat">
                            <label for="login_id">Ваш e-mail:</label>
                            <?php if (isset($_COOKIE['authorized'])) { ?>
                                <input id="login_id" hidden size="30" name="current_login" value="<?= $current_login = htmlspecialchars($_COOKIE['authorized']) ?>">
                            <?php } else { ?>
                                <input id="login_id" size="30" name="current_login" value="<?= $current_login  ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="iat">
                            <label for="password_id">Ваш пароль:</label>
                            <input id="password_id" size="30" name="current_password" type="password" value="<?= $current_password ?>">
                        </td>
                    </tr>
                    <tr>
                        <?php if ($isAuth == 0) { ?>
                            <td><input type="submit" value="Войти"></td>
                        <?php } ?>
                    </tr>
                </table>
            </form>
        <?php }
 
        if (isset($_GET['authorize']) && $_GET['authorize'] == 'yes') {
            if($login !== '') { ?>
                <h3><?=$_SESSION['current_login']?> Вы уже зарегистрировались</h3>
            <?php } else { ?>
            
                <form action="/?authorize=yes" method="post">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="current_name">Ваше имя:</label>
                                    <input id="current_name" size="30" name="new_name" value="<?=$new_name?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="current_login">логин (e-mail):</label>
                                <input id="current_login" size="30" name="new_login" value="<?=$new_login?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="current_password">пароль:</label>
                                <input id="current_password" size="30" name="new_password" type="password" value="<?=$new_password?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="phone">номер телефона:</label>
                                <input id="phone" size="30" name="phone" value="<?= $phone?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">                            
                                <input type="checkbox" id="agree" name="get_mail" checked value="1">
                                <label for="agree" class="agree">согласие на получение уведомлений на email</label> 
                                <input type="time" hidden value="<?=date("H:i:s") ?>" name="time">                           
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Зарегистрироваться"></td>
                        </tr>
                    </table>
                </form>
            <?php }
        } ?>
        <h3>
        <?php if (!empty($_POST['current_login'])) {
                print ($isAuth > 0 ? 'Вы авторизованы' : 'Неверный логин или пароль');
            }
            if (!empty($_POST['new_login'])) {
                print($err);
            } ?> 
        </h3> 


        </div>
</td>
</tr>
</table>