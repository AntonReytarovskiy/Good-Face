<?php
ob_start();
header('Content-Type: text/html; charset=utf-8');
session_start();
include "template/main.php";
if (!isset($_SESSION["user"]))
    header('Location: index.php');
else header('Location: account.php');
?>
<title>Welcome</title>
<link rel="stylesheet" href="css/welcome.css">
<div id="welcome">
    <p id="">Аккаунт успешно создан</p>
    <p>Приветствуем в мире <span id="good-face">Good face</span></p>
    <form method="post">
        <input type="submit" value="Войти в свой аккаунт" name="open-account">
    </form>
</div>
<?php
if (isset($_POST["open-account"]))
    header('Location: account.php');
?>