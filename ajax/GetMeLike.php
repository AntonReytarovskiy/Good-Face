<?php
header('Content-Type: text/html; charset=utf8mb4');
header('Content-Type: application/json');
session_start();
include "../database/Database.php";
$database = new Database();
echo json_encode($database->GetMeLike($_SESSION["user"]["login"]));