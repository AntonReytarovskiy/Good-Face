<?php
/**
 * Created by PhpStorm.
 * User: Антоша
 * Date: 22.04.2016
 * Time: 3:04
 */
session_start();
include "../database/Database.php";
$database = new Database();
$photo_id = $_POST["id"];
if ($database->SetAvatar($_SESSION["user"]["login"],$photo_id))
    echo "1";
else echo "0";