<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
include "database/Database.php";
$database = new Database();
include "template/user.php";
include "template/main.php";
if (!isset($_SESSION["user"]))
    header('Location: index.php');
?>
    <link rel="stylesheet" href="css/messages.css">
    <script src="javascript/messages.js"></script>
<title>Сообщения</title>
<div id="messages">
    <div id="dialogs">
        <div id="head">
            <div id="lable">Диалоги</div>
            <div id="new-dialog">
                <p>Создать новый диалог <img src="image/plus.png" alt=""></p>
            </div>
            <div id="add-box">
                <lable id="login-lable">Логин<input type="text" maxlength="20" id="added-login"></lable>
                <input type="button" value="Добавить" id="added">
            </div>
        </div>
        <div id="body">
        </div>
        <div id="options">
            <p id="delete-dialog">Удалить диалог</p>
            <p id="clear-dialog">Очистить диалог</p>
        </div>
    </div>
    <div id="dialog-messages">
        <div id="head">
            <div id="label">Сообщения</div>
        </div>
        <div id="body">
        </div>
        <div id="editable">
            <textarea id="message-editable" maxlength="4096"></textarea>
            <input type="button" id="send" value="Отправить">
            <p id="send-help">Для отправки нажмите alt + enter</p>
        </div>
    </div>
</div>

<?php
include "template/footer.html";