<?php
header('Content-Type: text/html; charset=utf-8');
include "../database/Database.php";
$database = new Database();
$login = $_POST["login"];
$account = $database->GetAccountByLogin($_POST["login"]);
if ($account)
    echo $account["fname"];