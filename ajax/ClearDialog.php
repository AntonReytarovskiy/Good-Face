<?php
include "../database/Database.php";
session_start();
$database = new Database();
$dialog_id = $_POST["id"];
echo $database->ClearDialog($dialog_id,$_SESSION["user"]["login"]);