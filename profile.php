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
$login = $_GET["login"];
$account = $database->GetAccountByLogin($login);
$mounth_names = array("Января","Февраля","Марта","Апреля","Мая","Июня",
                      "Июля","Августа","Сентября","Октября","Ноября","Декабря");
?>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/viewer.css">
    <script src="javascript/viewer.js"></script>
    <script src="javascript/profile.js"></script>
<?php
if (!$account) {
    echo "<p id='account-notfound'><img src='image/cat.png' alt='cat'>Пользователь не найден</p>";
    echo "<title>Пользователь не найден</title>";
    exit;
}
?>
<title><?php echo $account["fname"]." ".$account["lname"]?></title>
<div id="profile">
    <div id="profile-avatar">
        <img src="<?php $avatar = $database->GetAvatar($account['login']);
                  if ($avatar)
                      echo $avatar["path"];
                  else echo 'image/noavatar.png'?>" alt="avatar">
    </div>
    <div id="options">
        <p id="send-message"><img src="image/message.png" alt="message">Написать сообщение</p>
        <p id="sympathy"><img src="<?php $sympathy = $database->GetSympathy($_SESSION["user"]["login"],$login);
                                    if ($sympathy)
                                        echo "/image/like.png";
                                    else echo "/image/noLike.png"; ?>" alt="like">Нравиться</p>
    </div>
    <div id="message">
        <textarea name="message-text" id="message-text" placeholder="Сообщение" maxlength="2048"></textarea>
        <input type="button" name="send-message" value="Отправить" id="send">
    </div>
    <div id="info">
        <p><?php echo $account["fname"]." ".$account["lname"];?></p>
        <p><?php $date = explode("-",$account["birth_day"]);
                                echo "День рождения: ";
                                echo $date[2]." ".$mounth_names[intval($date[1]) - 1]." ".$date[0];?></p>
        <p><?php echo "Страна: ".$database->GetCountryNameByCityID($account["city_id"]);?></p>
        <p><?php echo "Город: ".$database->GetCityNameByCityID($account["city_id"]);?></p>
    </div>
    <div id="photos">
        <p id="label">Все фотографии</p>
        <?php
        $photos = $database->GetPhoto($account["login"]);
        if ($photos) {
            foreach ($photos as $value) {
                $path = $value["path"];
                echo "<img src='$path'>";
            }
        }
        ?>
    </div>
    <div id="viewer">
        <div id="close">X</div>
        <img src="" alt="" id="view-img">
    </div>
</div>
<?php
include "template/footer.html";
