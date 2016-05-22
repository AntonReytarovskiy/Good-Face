<?php
include "../database/Database.php";
session_start();
$database = new Database();
$message_id = $_POST["id"];
echo $database->DeleteMessageByID($message_id,$_SESSION["user"]["login"]);