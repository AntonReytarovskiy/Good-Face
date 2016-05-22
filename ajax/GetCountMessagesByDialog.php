<?php
include "../database/Database.php";
session_start();
$database = new Database();
$dialog_id = $_POST["dialog_id"];
echo $database->GetMessagesCount($dialog_id,$_SESSION["user"]["login"]);