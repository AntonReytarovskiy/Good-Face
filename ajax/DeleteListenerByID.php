<?php
include "../database/Database.php";
session_start();
$database = new Database();
$id = $_POST["id"];
echo $database->DeleteListener($id,$_SESSION["user"]["login"]);