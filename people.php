<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
include "database/Database.php";
$database = new Database();
include "template/user.php";
include "template/main.php";
?>
    <link rel="stylesheet" href="css/people.css">
    <script src="javascript/people.js"></script>
<title>Люди</title>
<div id="people">
    <div id="people-avatar">
        <img src="" alt="avatar">
        <div id="name"></div>
    </div>
    <div id="menu">
        <ul>
            <li id="open-profile">
                <img src="image/profile.png" alt="profile">
                <p>Профиль</p>
            </li>
            <div id="message-box">
                <textarea id="message-text" maxlength="4096"></textarea>
                <input type="button" id="send-message" value="Отправить">
            </div>
            <li id="message">
                <img src="image/message.png" alt="message">
                <p>Отправить сообщение</p>
            </li>
            <li id="sympathy">
                <img src="image/noLike.png" alt="like">
                <p>Нравится</p>
            </li>
            <li id="skip">
                <img src="image/next.png" alt="next">
                <p>Пропустить</p>
            </li>
        </ul>
    </div>
    <div id="options">
        Параметры
    </div>
</div>
<div id="no-people">
    <p>Люди закончились</p>
    <img src="image/frog.png" alt="frog">
</div>

<?php
include "template/footer.html";
