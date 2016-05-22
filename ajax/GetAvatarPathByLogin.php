<?php
include "../database/Database.php";
$database = new Database();
$login = $_POST["login"];
$avatar = $database->GetAvatar($login);
if($avatar)
    echo $avatar["path"];
else echo "image/noavatar.png";