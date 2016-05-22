<?php
include "../database/Database.php";
$database = new Database();
$photo = $database->GetPhotoByPath($_POST["path"]);
echo json_encode($photo);
