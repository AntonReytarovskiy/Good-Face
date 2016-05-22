<?php
header('Content-Type: text/html; charset=utf8mb4');
session_start();
include "../database/Database.php";
$database = new Database();
$id = $_POST["id"];
$messages = $database->GetMessagesByDialogID($id,$_SESSION["user"]["login"]);
if ($messages)
    echo json_encode($messages);