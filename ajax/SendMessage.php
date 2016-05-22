<?php
header('Content-Type: text/html; charset=utf8mb4');
include "../database/Database.php";
session_start();
$database = new Database();
$dialog_id = $_POST["dialog_id"];
$message = $_POST["message"];
$database->SendMessage($dialog_id,$_SESSION["user"]["login"],$message);
