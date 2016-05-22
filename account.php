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
    <title>Профиль</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/viewer.css">
    <script src="javascript/account.js"></script>
    <script src="javascript/viewer.js"></script>
<div id="user">
    <div id="info">
        <p id="name"><?php echo $_SESSION["user"]["fname"]." ".$_SESSION["user"]["lname"]?></p>
        <p id="sex"><?php echo "Ваш пол: "; if ($_SESSION["user"]["sex"] == "woman") echo "<span>Женщина</span>"; 
                            else echo "<span>Мужчина</span>"?></p>
        <p id="age"><?php $dirth = strtotime($_SESSION["user"]["birth_day"]);
                          $date = date("m.d.y",$dirth);
                          $result = explode(".",$date);
                          $result[2] = "19".$result[2];
                          echo "Ваш возраст: ".getAge($result[2],$result[1],$result[0]);?></p>
        <p id="city"><?php $city = $database->GetCityByID($_SESSION["user"]["city_id"]); echo "Город: ".$city["city_name_ru"];?></p>
        <p id="reg-date"><?php echo "Дата регистрации <br><span>".$_SESSION["user"]["reg_date"]."</span>";?></p>
    </div>

    <div id="photo">
        <p>Ваши фотографии<span id="upload-button">Загрузить</span></p>
        <div id="img-container">
            <?php
            $photo = $database->GetPhoto($_SESSION["user"]["login"]);
            if (count($photo)) {
                for ($i = 0; $i < count($photo); $i++) {
                    $path = $photo[$i]["path"];
                    echo "<img src='$path'>";
                }
            }
            ?>
        </div>
    </div>
    <div id="viewer">
        <div id="close">X</div>
        <img src="" alt="" id="view-img">
        <form method="post">
            <input type="button" name="set-avatar" id="set-avatar" value="Установить как аватар">
            <input type="button" name="delete" id="delete" value="Удалить">
        </form>
    </div>
    <div id="upload-photo">
        <div id="close">X</div>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="photo">
            <input type="submit" value="загрузить" id="upload" name="upload">
        </form>
        <?php
        if (isset($_POST["upload"])) {
            $uploaddir = 'user-photo/';
            $format = explode("/",$_FILES['photo']['type']);
            if ($format[0] == "image") {
                if ($database->PhotoCount($_SESSION["user"]["login"]) < 7) {
                    $uploadfile = $uploaddir . com_create_guid().".$format[1]";
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                        $database->AddPhoto($_SESSION["user"]["login"],$uploadfile);
                        echo "<p id='success'>Фото успешно загруженно</p>";
                        header('Location: account.php');
                    } else {
                        echo "<p id='error'>Ой что-то пошло не так</p>";
                    }
                } else {
                    echo "<p id='error'>Превышен лимит на фото</p>";
                }
            } else {
                echo "<p id='error'>Можно загрузить только фото</p>";
            }
        }
        ?>
    </div>
</div>


<?php
include "template/footer.html";
function getAge($y, $m, $d) {
    if($m > date('m') || $m == date('m') && $d > date('d'))
        return (date('Y') - ($y - 1));
    else
        return (date('Y') - $y);
}