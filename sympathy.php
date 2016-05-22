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
<title>Симпатии</title>
    <link rel="stylesheet" href="css/sympathy.css">
    <script src="javascript/sympathy.js"></script>
<div id="sympathy">
    <div id="nav">
        <p>Вам понравились</p>
        <p>Взаимные</p>
        <p class="selected-nav">Вы понравились</p>
    </div>
    <div id="body">
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
        <div class="people">
            <img src="image/avatar.jpg" alt="avatar">
            <div id="name">Антон Рейтаровский</div>
            <div id="date">1990-06-13 17:39:20</div>
            <div id="state">
                <img src="image/nosympathy.png" alt="no">
                <p>Не взаимно</p>
            </div>
        </div>
    </div>
</div>
<?php
include "template/footer.html";
