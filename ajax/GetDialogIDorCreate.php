<?php
include "../database/Database.php";
session_start();
$database = new Database();
$login = $_POST["login"];
$listener = $database->GetListenerTwoUsers($_SESSION["user"]["login"],$login);
if (!$listener) {
    $dialog_id = $database->CreateDialog();
    $database->AddListener($dialog_id,$login);
    $database->AddListener($dialog_id,$_SESSION["user"]["login"]);
    echo $dialog_id;
} else echo $listener["dialog_id"];