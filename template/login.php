<?php
include "database/Database.php";
$database = new Database();
if (isset($_COOKIE["user"])) {
    $user = explode(",",$_COOKIE["user"]);
    $account = $database->GetAccount($user[0],$user[1]);
    if ($account) {
        $_SESSION["user"] = $account;
        header('Location: account.php');
    }

}
?>
<title>Вход</title>
<link href='https://fonts.googleapis.com/css?family=Neucha&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/login.css">
<script src="../javascript/show-form.js"></script>
<script src="../javascript/validation.js"></script>
<div id="login">
    <p>Войдите</p>
    <form method="post">
        <input type="text" name="login" id="login-field" placeholder="Логин" maxlength="20">
        <input type="password" name="password" id="password-field" placeholder="Пароль" maxlength="20">
        <input type="submit" id="submit" name="login-submit" value="Войти">
        <lable for="seve-user"><span id="lable">Запомнить</span></lable>
        <input type="checkbox" name="save-user" id="save-user" checked="checked">
    </form>
    <a href="../registration.php">Зарегистрировтся</a>
    <?php
    if (isset($_POST["login-submit"])) {
        $account = $database->GetAccount($_POST["login"],sha1($_POST["password"]));
        if ($account) {
            unset($_SESSION["user"]);
            if (!isset($_SESSION["user"])) {
                $_SESSION["user"] = $account;
                if (isset($_POST["save-user"]))
                    setcookie("user",$account["login"].",".$account["user_password"],time() + (1000*60*60*24*7));
                $database->SetLastLogin($_SESSION["user"]["login"]);
                header('Location: account.php');
            }
        } else {
            echo '<p id="error">Неверный логин или пароль</p>';
        }
    }
    ?>
</div>