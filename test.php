<?php
header('Content-Type: text/html; charset=utf-8');
include "database/Database.php";
$db = new Database();
session_start();
echo "<pre>";
phpinfo();
echo "</pre>";