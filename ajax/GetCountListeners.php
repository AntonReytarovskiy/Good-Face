<?php
session_start();
include "../database/Database.php";
$database = new Database();
echo $database->ListenersCount($_SESSION["user"]["login"]);