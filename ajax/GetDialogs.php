<?php
include "../database/Database.php";
session_start();
$database = new Database();
$dialogs = $database->GetDialogs($_SESSION["user"]["login"]);
echo json_encode($dialogs);