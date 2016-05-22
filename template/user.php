<link rel="stylesheet" href="../css/user.css">
<script src="../javascript/Jquery/jquery.js"></script>
<script src="../javascript/user.js"></script>
<div id="account">
    <div id="hide"> || </div>
    <div id="avatar">
        <img src="<?php $avatar = $database->GetAvatar($_SESSION["user"]["login"]);
                if ($avatar)
                    echo $avatar["path"];
                else echo "/image/noavatar.png";
        ?>" alt="avatar" id="user-avatar">
    </div>
    <p id="account-name"><?php echo $_SESSION["user"]["login"];?></p>
    <form method="post">
        <ul id="nav">
            <li><input type="submit" name="profile" value="Профиль"></li>
            <li><input type="submit" name="people" value="Люди"></li>
            <li><input type="submit" name="messages" value="Сообщения"></li>
            <li><input type="submit" name="sympathy" value="Симпатии"></li>
            <li><input type="submit" name="exit" value="Выйти"></li>
        </ul>
    </form>
</div>

<?php
if (isset($_POST["exit"])) {
    unset($_SESSION["user"]);
    setcookie("user","",time() - 3600);
    header('Location: index.php');
}

else if (isset($_POST["profile"]))
    header('Location: ../index.php');

else if (isset($_POST["messages"]))
    header('Location: messages.php');

else if (isset($_POST["people"]))
    header('Location: people.php');

else if (isset($_POST["sympathy"]))
    header('Location: sympathy.php');