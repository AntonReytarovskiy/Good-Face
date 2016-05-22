<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include "../database/Database.php";
$database = new Database();
$login = $_POST["login"];
$dialogs = $database->GetAllDialogs($_SESSION["user"]["login"]);
if (!$database->GetAccountByLogin($login)){
    echo "Пользователь не найден";
    exit;
}

foreach ($dialogs as $value) {
    if ($value["login"] == $login){
        $listener = $database->GetListener($value["dialog_id"],$_SESSION["user"]["login"]);
        if ($listener["del"] == 1){
            echo "True";
            $database->RestoreListener($listener["ID"]);
            exit;
        } else {
            echo "Диалог уже существует";
            exit;
        }
    }
}

$dialog_id = $database->CreateDialog();
$database->AddListener($dialog_id,$_SESSION["user"]["login"]);
$database->AddListener($dialog_id,$login);
echo "True";
