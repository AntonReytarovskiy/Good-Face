<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
include "template/main.php";
include "template/login.php";
include "template/footer.html";