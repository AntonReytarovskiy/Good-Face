<?php
header('Content-Type: text/html; charset=utf8mb4');
session_start();
include "../database/Database.php";
$database = new Database();
$login = $_POST["login"];
$database->SendSympathy($_SESSION["user"]["login"],$login);