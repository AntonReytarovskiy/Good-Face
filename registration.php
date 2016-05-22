<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
include "template/main.php";
include "database/Database.php";
$database = new Database();
?>

<link rel="stylesheet" href="css/regestration.css" />
    <script src="javascript/show-form.js"></script>
<script src="javascript/validation.js"></script>
    <script src="javascript/regestration.js"></script>
<title>Регистрация</title>
<div id="regestration">
    <p>Регистрация</p>
    <form method="post">
        <input type="text" name="login-field" id="login-field" placeholder="Логин" maxlength="20">
        <input type="text" name="fname-field" placeholder="Имя" maxlength="15">
        <input type="text" name="lname-field" placeholder="Фамилия" maxlength="15">
        <select name="sex" id="sex">
            <option selected="selected" disabled="disabled">Выберите пол</option>
            <option value="man">Мужчина</option>
            <option value="woman">Женщина</option>
        </select>
        <select name="country" id="country">
            <option selected="selected" disabled="disabled">Выберите страну</option>
            <?php
            $country = $database->GetCountry();
            for ($i = 0; $i < count($country); $i++) {
                $id = $country[$i]["id"];
                $name = $country[$i]["country_name_ru"];
                echo "<option value='$id'>$name</option>";
            }
            ?>
        </select>
        <select name="city" id="city" disabled="disabled">
            <option selected="selected" disabled="disabled">Выберите город</option>
        </select>
        <input type="password" name="password-field" id="password-field" placeholder="Пароль" maxlength="20">
        <input type="password" name="confirm-field" id="confirm-field" placeholder="Повторите пароль" maxlength="20">
        <input placeholder="Дата рождения" type="text" onfocus="this.type='date';
                      this.setAttribute('onfocus','');this.blur();this.focus();" name="birth-day">
        <input type="submit" id="submit" name="regestaration-submit" value="Зарегистрироваться">
    </form>
<?php
if (isset($_POST["regestaration-submit"])) {
    $result = $database->CreateAccount($_POST["login-field"],sha1($_POST["password-field"]),$_POST["fname-field"],$_POST["lname-field"],
        $_POST["sex"],$_POST["city"],$_POST["birth-day"]);
    if ($result) {
        $account = $database->GetAccount($_POST["login-field"],sha1($_POST["password-field"]));
        if ($account) {
            setcookie("user",$account["login"].",".$account["user_password"],time() + (1000*60*60*24*7));
            unset($_SESSION["user"]);
            $_SESSION["user"] = $account;
            header('Location: welcome.php');
        }
    } else {
        echo "<p id='error'>Логин занят</p>";
    }
}
include "template/footer.html";
?>
</div>