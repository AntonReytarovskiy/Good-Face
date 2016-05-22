<?php
header('Content-Type: text/html; charset=utf8mb4');
header('Content-Type: application/json');
session_start();
include "../database/Database.php";
$database = new Database();
$id = $_POST["last_id"];
$accounts = $database->GetPeoples($id,$_SESSION["user"]["login"]);
if (empty($accounts))
    $accounts = $database->GetPeoples(0,$_SESSION["user"]["login"]);
echo json_encode($accounts);