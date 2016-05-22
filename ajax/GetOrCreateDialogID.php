<?php
include "../database/Database.php";
session_start();
$database = new Database();
$login = $_POST["login"];
